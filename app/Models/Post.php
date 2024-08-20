<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table='posts';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'image',
        'visible',
    ];

    public function likes(){
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }
    

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
