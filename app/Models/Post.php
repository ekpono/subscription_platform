<?php

namespace App\Models;

use App\Traits\PostTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, PostTrait;

    protected $fillable = ['title', 'slug', 'status', 'description', 'notification_status', 'user_id'];

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscribers', 'post_id', 'user_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot() {
        parent::boot();

        static::creating(self::onCreated());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
