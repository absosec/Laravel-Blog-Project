<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use File;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'ASC')->get();
        return view('back.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('back.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
            'content' => 'required|string|min:10'
        ]);
    
        $article = new Article();
        $article->title = e($request->title); // Using e() to escape any HTML entities
        $article->category_id = $request->category_id;
        $article->content = e($request->content);
        $article->slug = str_slug($request->title);
    
        if ($request->hasFile('image')) {
            $imageName = uniqid() . '.' . $request->image->getClientOriginalExtension(); // Generates a unique filename
            $request->image->move(public_path('uploads'), $imageName);
            $article->image = 'uploads/' . $imageName;
        }
        $article->save();
        toastr()->success('Article created successfully');
        return redirect()->route('admin.articles.index');
    }    

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('back.articles.update', compact('categories', 'article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
            'content' => 'required|string|min:10'
        ]);
    
        $article = Article::findOrFail($id);
        $article->title = e($request->title); // Using e() to escape any HTML entities
        $article->category_id = $request->category_id;
        $article->content = e($request->content);
        $article->slug = str_slug($request->title);
    
        if ($request->hasFile('image')) {
            // Generate a unique filename to avoid file overwriting
            $imageName = uniqid() . '.' . $request->image->getClientOriginalExtension(); 
            $request->image->move(public_path('uploads'), $imageName);
            $article->image = 'uploads/' . $imageName;
        }
        $article->save();
        toastr()->success('Article updated successfully!');
        return redirect()->route('admin.articles.index');
    }    

    public function destroy($id)
    {
        Article::find($id)->delete();
        toastr()->success('Article moved to deleted articles folder');
        return redirect()->route('admin.articles.index');
    }

    public function switch(Request $request)
    {
        $article = Article::findOrFail($request->id);
        $article->status = $request->statu == "true" ? 1 : 0;
        $article->save();
    }

    public function deleted()
    {
        $articles = Article::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view('back.articles.deleted', compact('articles'));
    }

    public function recover($id)
    {
        Article::onlyTrashed()->find($id)->restore();
        toastr()->success('The article was successfully recovered');
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $article = Article::onlyTrashed()->find($id);
        if (File::exists($article->image)) { //probably vulnerable to arbitrary file delete on the server
            File::delete(public_path($article->image));
        }

        $article->forceDelete();
        toastr()->success('Article deleted successfully');
        return redirect()->route('admin.article.deleted');
    }
}
