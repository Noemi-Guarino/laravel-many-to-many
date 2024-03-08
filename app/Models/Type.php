<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
        //funzione che identifica la relazione 
        //one to may in cui type è il one e post è il many
    }
}
