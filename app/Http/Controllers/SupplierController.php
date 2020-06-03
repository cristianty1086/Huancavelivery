<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use AppHttpResources\Supplier as SupplierResource;

class SupplierController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Supplier::all();
        return view('suppliers.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('suppliers.create');
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
            'name'=>'required',
            'email'=>'required',
            'estado'=>'required',
            'ruc'=>'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'descripcion'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
        ]);

        if ($request->file('logo')) {
            $imagePath = $request->file('logo');
            $imageName = $imagePath->getClientOriginalName();
            $imageNameUnique = uniqid().".".$imagePath->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('uploads', $imageNameUnique, 'public');
            $input['logo'] = '/storage/'.$path;
          }
        $items = Supplier::create($input);
        return redirect()->route('suppliers.index')
                ->with('�Exito!','Supplier creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
        $item = Supplier::find($id);
        if (is_null($item)) {
            return $this->sendError('Supplier not found.');
        }
        return $this->sendResponse(new SupplierResource($item), 'Supplier retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
        return view('suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $input = $request->all();
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'estado'=>'required',
            'ruc'=>'required',
            'descripcion'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
        ]);

        if ($request->file('logo')) {
            $imagePath = $request->file('logo');
            $imageName = $imagePath->getClientOriginalName();
            $imageNameUnique = uniqid().".".$imagePath->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('uploads', $imageNameUnique, 'public');
            $user->avatar = '/storage/'.$path;
          }
        $supplier->update($request->all());
        return redirect()->route('suppliers.index')
                ->with('�Exito!','Supplier actualizado con �xito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
        $supplier->delete();
        return redirect()->route('suppliers.index')
                ->with('�Exito!','El Supplier se quito con �xito.');
    }
}
