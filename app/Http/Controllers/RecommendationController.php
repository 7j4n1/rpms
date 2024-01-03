<?php

namespace App\Http\Controllers;

use Phpml\FeatureExtraction;
use App\Models\Document;
use Illuminate\Http\Request;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\Tokenizer;
use Phpml\Tokenization\WhitespaceTokenizer;

class RecommendationController extends Controller
{
    //
    // public function getCollaborativeFilteringRecommendations(Request $request)
    // {
    //     $user = $request->user();  // Get the current user

    //     // Use PHP-ML for Collaborative Filtering (example using User-Based CF)
    //     $recommender = new CollaborativeFiltering\UserBased();
    //     $recommender->train($this->getUserRatingsData());  // Train the model

    //     $recommendedPaperIds = $recommender->predict($user->id, 5);  // Get top 5 recommendations

    //     $recommendedPapers = Document::whereIn('id', $recommendedPaperIds)->get();

    //     return view('recommendations.collaborative', compact('recommendedPapers'));
    // }

    // protected function extractpaperFeatures()
    // {
    //     $papers = Document::all();
    //     $features = [];

    //     foreach($papers as $paper)
    //     {
    //         $features[$paper->id] = $this->extractFeaturesFromText($paper->abstract);

    //     }
    // }

    // protected function extractFeaturesFromText($paperAbstract)
    // {
    //     $vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());
    //     $transformer = new TfIdfTransformer();

    //     $termDocmatrix = $vectorizer->transform($paperAbstract);
    //     $tfidfFeatures = $transformer->transform($termDocmatrix);
    // }
}
