<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kyslik\ColumnSortable\Sortable;


class Feedback extends Model
{
    use HasFactory, Sortable;


    public array $sortable = ['created_at'];
    protected $table = 'feedbacks';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return int
     */
    public function feedbackAll(): int
    {
        return $this->all()->count();
    }

    /**
     * @return int
     */
    public function feedbackModerate(): int
    {
        return $this->where(['moderate' => 0])->count();
    }
}
