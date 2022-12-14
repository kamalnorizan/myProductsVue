<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->can('show-category')){
            abort(403);
        }

        $categories = Category::withCount('products')->get();

        return Inertia::render('Category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $category = Category::create($request->all());
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect('/category')->with('message', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        // if(!Auth::user()->can('update-category')){
        //     abort(403, 'TIADA HAK AKSES');
        // }else{
            $this->authorize('update',$category);
        // }
        // dd($category);

        // $category = Category::find($category);
        // dd($category);
        return Inertia::render('Category/Create',compact('category'));
    }

    public function summary()
    {
        $categories = Category::withCount('products')->get();

        return view('category.summary',compact('categories'));
    }

    public function summaryByAjax(Request $request)
    {
        $categories = Category::whereIn('id',$request->categories)->withCount('products')->get();

        $data['nama'] = $categories->pluck('name');
        $data['count'] = $categories->pluck('products_count');

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if(!Auth::user()->can('update-category')){
            abort(403);
        }

        $category->name = $request->name;
        $category->save();

        return redirect('/category')->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category')->with('message','Category deleted successfulll');
    }
}
