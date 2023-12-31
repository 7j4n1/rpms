<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'document_id',
        'author_id',
        'abstract',
        'paper_title',
        'co_authors',
        'paper_type',
        'keywords',
        'year',
        'availability',
        'isapproved',
        'reviewer_id',
        'isfullyUploaded',
        'current_version_id'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function paperVersions() {
        return $this->hasMany(PaperVersion::class);
    }

    public function currentVersion() {
        return $this->hasOne(PaperVersion::class)->join('current_versions', 'current_versions.paper_version_id', '=', 'paper_versions.id')->where('document_id', $this->id);
    }
}
