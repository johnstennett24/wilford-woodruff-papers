<?php

namespace App\Models;

use App\Jobs\SendNewCommentNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;

class Comment extends Model
{
    use HasFactory;
    use Markable;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')
                        ->where(function (Builder $query) {
                            $query->where('status', 1)
                                ->orWhere('user_id', Auth::id());
                        })
                        ->orderBy('created_at', 'DESC');
    }

    protected static $marks = [
        Like::class,
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($comment) {
            SendNewCommentNotification::dispatch($comment);
        });
    }
}
