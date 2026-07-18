<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Di-import untuk menghapus file fisik di hosting

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
        $article = Article::findOrFail($id);
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

        Article::create($data);

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

    // Menampilkan form edit
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    // Menyimpan perubahan
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul', 'konten']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * FIX: Menghapus artikel beserta file gambar fisiknya di hosting
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Hapus file gambar asli di folder storage/public/articles jika ada
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        // Hapus data dari database
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}