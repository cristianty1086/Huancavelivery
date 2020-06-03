<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use AppHttpResources\Category as CategoryResource;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Category::all();
        return view('categories.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'descripcion' => 'required',
        ]);

        if ($request->file('imagen')) {
            $imagePath = $request->file('imagen');
            $imageName = $imagePath->getClientOriginalName();
            $imageNameUnique = uniqid().".".$imagePath->getClientOriginalExtension();
            $path = $request->file('imagen')->storeAs('uploads', $imageNameUnique, 'public');
            $input['imagen'] = '/storage/'.$path;
          }
        $items = Category::create($input);
        return redirect()->route('categories.index')
                ->with('�Exito!','Category creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $item = Category::find($id);
        if (is_null($item)) {
            return $this->sendError('Category not found.');
        }
        return $this->sendResponse(new CategoryResource($item), 'Category retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $input = $request->all();
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'descripcion' => 'required',
        ]);

        if ($request->file('imagen')) {
            $imagePath = $request->file('imagen');
            $imageName = $imagePath->getClientOriginalName();
            $imageNameUnique = uniqid().".".$imagePath->getClientOriginalExtension();
            $path = $request->file('imagen')->storeAs('uploads', $imageNameUnique, 'public');
            $user->avatar = '/storage/'.$path;
          }
        $category->update($request->all());
        return redirect()->route('categories.index')
                ->with('�Exito!','Category actualizado con �xito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('categories.index')
                ->with('�Exito!','El Category se quito con �xito.');
    }
}
