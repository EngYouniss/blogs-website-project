<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\Article as AdminArticle;
use App\Models\admin\Category as AdminCategory;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = AdminArticle::all(); // Retrieve all articles
        $lastarticles= AdminArticle::orderBy('id','desc')->take(5)->get();
        $categories = AdminCategory::with('subCategories')->where('parent', 0)->get(); // Retrieve categories with subcategories
        return view('user.homeu')->with(['allcategories' => $categories, 'allarticles' => $articles,'lastarticles'=>$lastarticles]);
    }

    // public function news($name)
    // {
    //     $articles = AdminArticle::all(); // Retrieve all articles

    //     $subcategory = AdminCategory::where('name', $name)->first();

    //     if (!$subcategory) {
    //         return redirect()->back()->with('error', 'Category not found');
    //     }

    //     switch ($subcategory->name) {
    //         case 'yemen news':
    //             return view('user.yemen_news')->with('allcategories', AdminCategory::with('subCategories')->where('parent', 0)->get())->with('allarticles', $articles);
    //         case 'world news':
    //             return view('user.world_news')->with('allcategories', AdminCategory::with('subCategories')->where('parent', 0)->get());
    //         default:
    //             return redirect()->back()->with('error', 'Category not found');
    //     }
    // }

    public function showArticlesCategories($name)
    {
        $category = AdminCategory::where('name', $name)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $articles = AdminArticle::where('category_id', $category->id)->get();

        return view('user.homeu')->with(['allcategories' => AdminCategory::with('subCategories')->where('parent', 0)->get(), 'allarticles' => $articles]);
    }

    public function showArticleDetails($id)
    {
        $articles = AdminArticle::where('id',$id )->first();
        $articlesall= AdminArticle::orderBy('id','desc')->take(5)-> where('category_id',$articles->category_id)->get();
        $allarticlesforrelated = AdminArticle::orderby('id','desc')->take(5)->get();
        // $lastarticles = AdminArticle::orderBy('id', 'desc')->take(5)->get();
        if (!$articles) {
            return redirect()->back()->with('error', 'Article not found');
        }
        $user= User::where('id',$articles->user_id)->first();
$categories = AdminCategory::with('subCategories')->where('parent', 0)->get();

        return view('user.details')->with(['allcategories' => $categories, 'allarticles' => $articles,
        'allarticlesforrelated'=>$allarticlesforrelated,'user'=>$user,'articlesall'=>$articlesall]);
    }
    public function showLastArticleDetails($id)
    {
        $lastarticles = AdminArticle::where('id',$id )->first();
        $user= User::where('id',$lastarticles->user_id)->first();

        return view('user.last_articles')->with(['allcategories' => AdminCategory::with('subCategories')->where('parent', 0)->get(),'lastArticles'=>$lastarticles,'user'=>$user]);
    }
}
