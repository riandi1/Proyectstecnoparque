<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create','store');
        $this->middleware('can:admin.categories.edit')->only('edit','update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }
    /*
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        $category =category::create($request->all());
        return redirect()->route('admin.categories.edit', $category)->with('info','la categoria se creo con exito');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id"
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.edit', $category)->with('info','la categoria se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('info','la categoria se elimino con exito');
    }
}
