<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PaperController extends Controller
{

    public function viewPapers(){
        $papers = Auth::user()->papers->all(); 

        return view('pages.papers', ['mypapers' => $papers]);
    }

    public function storePaper(Request $request){
        $attributes = Validator::make($request->all(), [
            'title' => 'required|string',
            'authors' => 'required|string',
            'abstract' => 'required',
            'paperType' => 'required|string',
            'keywords' => 'required|string',
            'year' => 'required',
            'file' => 'required|max:10240', // Maximum file size: 10MB
        ]);

        if ($attributes->fails()) {
            return redirect()->back()->withErrors($attributes)->withInput();
        }
        $currentUser = Auth::user(); 

        $storePath = "";
        $fileName = "";

        if ($request->has('file')){
            $file = $request->file('file');
            $fileName = time() . '_' . $this->replace_whitespaces($file->getClientOriginalName());
            $storePath = 'research_papers/'. $currentUser->name. '/' .$fileName;
            $file->storeAs('research_papers'. $currentUser->name, $fileName, 'public');
        }
            

        $paper = new Document();
        $paper->paper_title = $request->title;
        $paper->author_id = auth()->id();
        $paper->document_id = $this->remove_extension($fileName);
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
        // optional and nullable
        $paper->month = $request->month;
        $paper->doi = $request->doi;
        $paper->url = $request->url;

        // file path
        $paper->file_path = $storePath;


        $result = $paper->saveOrFail();

        if(!$result)
            return redirect()->back()->withErrors(['error' => "Error occur while saving paper"])->withInput();

        $papers = Auth::user()->papers->all();
        return view('pages.papers', ['mypapers' => $papers]);


    }

    public function showPaper($document_id){
        $paper = Document::where('document_id', '=', $document_id)->first();
        return view('pages.viewpaper', ['paper' => $paper]);
    }

    protected function replace_whitespaces($string) {
        return str_replace([' ', ':', '-'], '_', $string);
    }

    protected function remove_extension($filename) {
        $replaceWhite = $this->replace_whitespaces($filename);
        return pathinfo($replaceWhite, PATHINFO_FILENAME);
    }
}
