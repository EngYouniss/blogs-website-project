<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\Article as AdminArticle;
use App\Models\admin\Category as AdminCategory;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function showYemenNews()
    {
        $subcategory = AdminCategory::where('name', 'yemen news')->first();

        if (!$subcategory) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $articles = AdminArticle::where('category_id', $subcategory->id)->get();

        return view('user.yemen_news')->with(['allcategories' => AdminCategory::with('subCategories')->where('parent', 0)->get(), 'allarticles' => $articles]);
    }
}
