<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Todo extends Model
{
    protected $table = 'todos';

    protected $fillable = [
        'title', 'description', 'user_id', 'completed',
    ];

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function listTodos(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
