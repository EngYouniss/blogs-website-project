<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Article;
use App\Models\admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    public function index(){
        $articles=Article::with(['user','comment'])->get();
        return view('admin.show_articles')->with('all_articles',$articles);
    }
    public function create(){
        $categories=Category::where('parent',0)->get();
        $subcategory=Category::where('parent','!=',0)->get();
        return view('admin.add_article')->with('allCategories',$categories)->with('subcategories',$subcategory);
    }
    public function store(Request $request){
        $article=new Article();
        $article->title=$request->title;
        $article->content=$request->content;
        $article->content_ar=$request->content_ar;
        $article->image=$this->uploadImage($request->file('article_image'));
        $article->user_id=Auth::user()->id;
        $article->category_id=$request->category;
        if( $article->save()){
return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $article = Article::findOrFail($id); // يجلب المقال أو يعرض خطأ 404 إذا لم يكن موجودًا

        $article->delete(); // حذف المقال

        return redirect()->back()->with('success', 'تم حذف المقال بنجاح!'); // إعادة توجيه مع رسالة نجاح
    }

public function edit($id){
    $article=Article::find($id);
    $categories=Category::where('parent',0)->get();
    return view('admin.edit_article')->with('article',$article)->with('allCategories',$categories);
}

public function search(Request $request) {
    $query = $request->input('search'); // ✅ جلب الكلمة المدخلة

    // ✅ البحث في العنوان والمحتوى
    $articles = Article::where('title', 'LIKE', "%$query%")
                       ->orWhere('content', 'LIKE', "%$query%")
                       ->paginate(5); // ✅ إضافة التصفح بين الصفحات

    return view('user.search_result')
           ->with('articles', $articles)
           ->with('query', $query);
}




public function uploadImage($image){
    $imageName=time().'.'.$image->extension();
$image->move(public_path('/images'),$imageName);
return $imageName;
}

}
