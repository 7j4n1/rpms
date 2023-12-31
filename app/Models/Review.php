<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'paper_id',
        'comments',
        'rating',
    ];

    public function paper() {
        return $this->belongsTo(Document::class);
    }

    public function reviewer() {
        return $this->belongsTo(User::class);
    }
}
