<?php

namespace App\Models;

use App\Traits\PostTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, PostTrait;

    protected $fillable = ['title', 'slug', 'status', 'description', 'notification_status', 'website_id'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    protected static function boot() {
        parent::boot();

        static::creating(self::onCreated());
    }
}
