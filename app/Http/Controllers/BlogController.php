<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    public function index()
    {


        $this->data['posts'] = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category_name')
            ->where('published', true)
            ->get();

        return view('blog', $this->data);
    }

    public function addBlog()
    {

        $this->data['categories'] = Category::all();

        return view('add-blog', $this->data);
    }

    public function blogPost(Request $request)
    {
        $blog = new Post();
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->content = $request->description;
        $blog->published = $request->published == "true" ? true : false;
        $blog->save();

        return redirect()->route('blog');
    }
}
