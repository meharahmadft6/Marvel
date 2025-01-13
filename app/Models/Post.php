<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'excerpt', 'body', 'min_to_read', 'is_published ', 'image_url'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }
    public function getCreatedAtAttribute($value)
    {
        return date('F j, Y', strtotime($value));
    }
    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }
}
