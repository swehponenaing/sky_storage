<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class File extends Model implements HasMedia
{
    use SoftDeletes;
    protected $fillable = ['uuid','name', 'created_by_id'];

    public function setFolderIdAttribute($input)
    {
        $this->attributes['folder_id'] = $input ? $input : null;
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id')->withTrashed();
    }

    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
