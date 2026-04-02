<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }
    
    public function show($id)
{
    $article = \App\Models\Article::findOrFail($id);
    return view('articles.show', compact('article'));
}

public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'konten' => 'required',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
    ]);

    $data = $request->all();

    // Logika Simpan Gambar
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('articles', 'public');
        $data['image'] = $path;
    }

    \App\Models\Article::create($data);

    return redirect()->route('articles.index')->with('success', 'Artikel berhasil diterbitkan!');
}

    public function toggleFavorite(Article $article)
    {
        $user = auth()->user();

        // Jika sudah difavoritkan, hapus. Jika belum, tambahkan.
        if ($user->favoriteArticles()->where('article_id', $article->id)->exists()) {
            $user->favoriteArticles()->detach($article->id);
        } else {
            $user->favoriteArticles()->attach($article->id);
        }

        return back();
    }
    
}