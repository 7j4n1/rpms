<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperVersion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'paper_id',
        'content',
        'version_number',
        'uploadedName',
    ];

    public function versions() {
        return $this->belongsTo(Document::class);
    }
}
