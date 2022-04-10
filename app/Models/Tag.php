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

    /**
     * 関連するPostモデルを更新日時が新しい順に返す
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps()->latest('updated_at');
    }

    /**
     * タグ名を投稿に使用されている数が多い順に返す
     */
    public static function ranking($limit)
    {
        return Tag::join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
            ->select('tags.name', DB::raw('count(*)'))
            // ->whereDate('post_tag.created_at', '>=', $diffYear)
            ->groupBy('tags.name')
            ->orderBy(DB::raw('count(*)'), 'desc')
            ->take($limit)
            ->get();
    }

    /**
     * 投稿タグのClass属性の値を返す
     */
    public static function tagBtnStatus()
    {
        $btnVisual = 'btn btn-outline-secondary rounded-pill btn-sm py-0 me-1 mb-2 text-truncate mw-150px';
        return compact('btnVisual');
    }
}
