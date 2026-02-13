<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Afficher les liens de l'utilisateur avec recherche et filtrage
     */
    public function index(Request $request)
    {
        $links = Auth::user()->links;
        $categories = Auth::user()->categories;
        $tags = Tag::all();
        
        return view('links.index', compact('links', 'categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'category_id' => 'required'
        ]);
        
        $link = new Link();
        $link->title = $request->title;
        $link->url = $request->url;
        $link->description = $request->description;
        $link->category_id = $request->category_id;
        $link->user_id = Auth::id();
        $link->save();
        
        // Gérer les tags
        if ($request->tags) {
            $tagNames = explode(',', $request->tags);
            foreach ($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                $link->tags()->attach($tag->id);
            }
        }
        
        return redirect()->back()->with('success', 'Lien créé');
    }

    public function update(Request $request, Link $link)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'category_id' => 'required'
        ]);
        
        $link->title = $request->title;
        $link->url = $request->url;
        $link->description = $request->description;
        $link->category_id = $request->category_id;
        $link->save();
        
        // Gérer les tags
        $link->tags()->detach();
        if ($request->tags) {
            $tagNames = explode(',', $request->tags);
            foreach ($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                $link->tags()->attach($tag->id);
            }
        }
        
        return redirect()->back()->with('success', 'Lien mis à jour');
    }

     public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->back()->with('success', 'Lien supprimé');
    }
}
