<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'website_address', 'user_id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'subscribers', 'user_id', 'website_id');
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscribers', 'website_id', 'user_id');
    }
}
