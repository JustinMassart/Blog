<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use
    Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $slug
 * @property \Illuminate\Support\Carbon $published_at
 * @property string $title
 * @property string $excerpt
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $category_id
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @property int $user_id
 * @property-read \App\Models\User $author
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post filter()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 */
class Post extends Model
{
    use HasFactory;

    protected $dates = [
        "published_at"
    ];

// scopes
    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('excerpt', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')));

        $query->when($filters['category'] ?? false, fn($query, $category) => $query
            ->whereHas('category', fn($query) => $query
                ->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn($query, $author) => $query
            ->whereHas('author', fn($query) => $query
                ->where('username', $author)));
    }

// relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        //Attention, si on avait décidé d'appeler sa fonction author, laravel bug, alors on aurait du mettre
        //return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'user_id');

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
