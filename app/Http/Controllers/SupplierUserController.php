<?php

namespace App\Http\Controllers;

use App\SupplierUser;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use AppHttpResources\SupplierUser as SupplierUserResource;

class SupplierUserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = SupplierUser::all();
        return view('supplier_user.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('supplier_user.create');
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
        ]);
        $items = SupplierUser::create($input);
        return redirect()->route('supplier_user.index')
                ->with('�Exito!','SupplierUser creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupplierUser  $supplierUser
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierUser $supplierUser)
    {
        //
        $item = SupplierUser::find($id);
        if (is_null($item)) {
            return $this->sendError('SupplierUser not found.');
        }
        return $this->sendResponse(new SupplierUserResource($item), 'SupplierUser retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupplierUser  $supplierUser
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierUser $supplierUser)
    {
        //
        return view('supplier_user.edit',compact('supplierUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupplierUser  $supplierUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierUser $supplierUser)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $supplierUser->update($request->all());
        return redirect()->route('supplier_user.index')
                ->with('�Exito!','SupplierUser actualizado con �xito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupplierUser  $supplierUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierUser $supplierUser)
    {
        //
        $supplierUser->delete();
        return redirect()->route('supplier_user.index')
                ->with('�Exito!','El SupplierUser se quito con �xito.');
    }
}
