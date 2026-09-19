<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    protected static function booted(): void
    {
        static::creating(function (Post $post) {
            if (trim($post->slug ?? '') === '') {
                $post->slug = Str::slug($post->title).'-'.Str::lower(Str::random(6));
            }
            if (trim($post->excerpt ?? '') === '') {
                $post->excerpt = Str::limit(strip_tags($post->body), 150);
            }
            if (empty($post->published_at) && $post->is_published) {
                $post->published_at = now();
            }
            // Ensure slug uniqueness - retry if collision (unique index)
            $original = $post->slug;
            $i = 0;
            while (static::where('slug', $post->slug)->exists()) {
                $post->slug = $original.'-'.(++$i);
                if ($i > 10) {
                    $post->slug = Str::slug($post->title).'-'.Str::lower(Str::random(8));
                    break;
                }
            }
        });

        // Slug intentionally NOT regenerated on title update to keep URLs stable
        static::updating(function (Post $post) {
            // regenerate excerpt if body changed and excerpt empty
            if ($post->isDirty('body') && trim($post->excerpt ?? '') === '') {
                $post->excerpt = Str::limit(strip_tags($post->body), 150);
            }
            if (! $post->is_published) {
                $post->published_at = null;
            } elseif (empty($post->published_at)) {
                $post->published_at = now();
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
