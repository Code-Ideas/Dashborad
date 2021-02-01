<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\Section;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->get('search_input');
        $articles = Article::with('photo')->search($filter)->paginate(20);

        return view('admin.articles.index', compact('articles', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::pluck('name', 'id');

        return view('admin.articles.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->input());
        if ($request->hasFile('image')) {
            $article->storeImage($request->file('image')->store('articles', 'public'));
        }

        return redirect()->route('admin.articles.index')->with('success', 'تم اضافة المقال');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $sections = Section::pluck('name', 'id');

        return view('admin.articles.edit', compact('article', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->input());
        if ($request->hasFile('image')) {
            $article->updateImage($request->file('image')->store('articles', 'public'));
        }

        return redirect()->route('admin.articles.index')->with('success', 'تم تعديل المقال');
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

        return redirect()->route('admin.articles.index')->with('success', 'تم حذف المقال');
    }
}
