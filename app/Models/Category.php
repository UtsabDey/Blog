<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'description', 'meta_title', 'meta_description', 'navbar_status', 'status', 'created_by'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
