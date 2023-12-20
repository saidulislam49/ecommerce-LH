<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $data = DB::table('categories')->get(); //querybuilder
        $data = Category::all();
        return view('admin.category.category.index', compact('data'));
    }
    // category store
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories|max:55'
        ]);

        // Query Builder
        // $data = [];
        // $data['category_name'] = $request->category_name;
        // $data['category_slug'] = Str::slug($request->category_name, '-');
        // DB::table('categories')->insert($data);

        // Elequent ORM
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
        ]);
        $notification = array('message' => 'Category Inserted!!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    // category delete
    public function destroy($id)
    {
    }
}
