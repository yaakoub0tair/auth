<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Auth::user()->categories;
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        
        $category = new Category();
        $category->name = $request->name;
        $category->user_id = Auth::id();
        $category->save();
        
        return redirect()->back()->with('success', 'Catégorie créée');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);
        
        $category->name = $request->name;
        $category->save();
        
        return redirect()->back()->with('success', 'Catégorie mise à jour');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Catégorie supprimée');
    }
}
