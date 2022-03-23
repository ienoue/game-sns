<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps()->latest('updated_at');
    }

    public static function ranking($count)
    {
        return Tag::join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
            ->select('tags.name', DB::raw('count(*)'))
            // ->whereDate('post_tag.created_at', '>=', $diffYear)
            ->groupBy('tags.name')
            ->orderBy(DB::raw('count(*)'), 'desc')
            ->take(50)
            ->get();
    }
}
