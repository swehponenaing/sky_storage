<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Folder extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'created_by_id'];

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
