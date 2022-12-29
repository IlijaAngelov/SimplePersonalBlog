<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->get();
        return view('index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        if($request->image != null) {
            $imageName = uniqId() . '-' . $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }
        Article::create([
            'title' => $request->title,
            'text'  => $request->text,
            'image' => $imageName
        ]);

        return redirect('/article')->with('status', 'Article Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, Article $article)
    {
        $updatedArticle = $request->validated();

        if(File::exists(public_path('images/'.$article->image))){
            File::delete(public_path('images/'.$article->image));
        }

        if($request->image != null) {
            $imageName = uniqId() . '-' . $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        Article::where('id', $article->id)->update([
            'title' => $updatedArticle['title'],
            'text'  => $updatedArticle['text'],
            'image' => $imageName
        ]);

        return redirect('/article')->with('status', 'Article Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/article');
    }

}
