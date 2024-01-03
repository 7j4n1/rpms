<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function showReviewForm(Document $paper)
    {
        // Check if user is authorized to review
        // if (!Auth::user()->canReview($paper)) {
        //     abort(403);
        // }
    }
}
