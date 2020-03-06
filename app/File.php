<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Folder;
use App\File;


class File extends Model
{

    protected $fillable = ['path', 'old_name', 'file_name', 'mime_type', 'folder_id', 'created_by_id'];

    
    public function folder($value='')
    {
        return $this->belongsTo('App\Folder');
    }
    
    public function user($value='')
    {
        return $this->belongsTo('App\User', 'created_by_id');
    }
}
