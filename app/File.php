<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;



class File extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $fillable = ['uuid','name', 'created_by_id'];

    public function setFolderIdAttribute($input)
    {
        $this->attributes['folder_id'] = $input ? $input : null;
    }



    public function folder($value='')
    {
        return $this->belongsTo('App\Folder');
    }


    
    public function user($value='')
    {
        return $this->belongsTo('App\User', 'created_by_id');
    }
}
