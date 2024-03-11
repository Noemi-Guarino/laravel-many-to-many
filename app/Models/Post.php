<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'type_id',
    ];

    public function type(){
        return $this->belongsTo(Type::class);
        //I Belong to you
        //You Belong to me la la laaaa
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
        //relazione many to many con technology
    }


}
