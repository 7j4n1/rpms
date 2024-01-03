<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PaperController extends Controller
{

    public function viewPaper(){
        $papers = Auth::user()->papers; 

        return view('pages.papers', ['papers' => $papers]);
    }

    public function storePaper(Request $request){
        $attributes = Validator::make($request->all(), [
            'title' => 'required|string',
            'authors' => 'required|string',
            'abstract' => 'required|string',
            'paperType' => 'required|string',
            'keywords' => 'required|string',
            'file' => 'required|mimes:pdf|max:10240', // Maximum file size: 10MB
        ]);

        if ($attributes->fails()) {
            return redirect()->back()->withErrors($attributes)->withInput();
        }
        $currentUser = Auth::user(); 

        $storePath = "";

        if ($request->has('file')){
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $storePath = 'research_papers/'. $currentUser->name. '/' .$fileName;
            $file->storeAs('research_papers'. $currentUser->name, $fileName, 'public');
        }
            

        $paper = new Document();
        $paper->paper_title = $request->title;
        $paper->author_id = auth()->id();
        $paper->co_authors = $request->authors;
        $paper->abstract = $request->abstract;
        $paper->paper_type = $request->paperType;
        $paper->keywords = $request->keywords;
        if ($request->has('year'))
            $paper->year = $request->year;
        $paper->availability = $request->scope;
        if (!empty($request->file('file'))) {
            $paper->isfullyUploaded = 1;
        }
        $paper->file_path = $storePath;

        $result = $paper->saveOrFail();

        if(!$result)
            return redirect()->back()->withErrors(['error' => "Error occur while saving paper"])->withInput();

        
        return view('pages.papers');


    }
}
