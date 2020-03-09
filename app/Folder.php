<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Folder;
use App\File;
class Folder extends Model
{
    protected $fillable = ['name', 'created_by_id', 'status'];

    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }


    public function user($value='')
    {
        return $this->belongsTo('App\User', 'created_by_id');
    }
}
