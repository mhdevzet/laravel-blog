<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function category()
    {

        $this->data['categories'] = Category::all();

        return view('category', $this->data);
    }

    public function categoryPost(Request $request)
    {

        $category = new Category();

        $category->name = $request->name;

        $category->save();

        return redirect()->route('category');
    }
}
