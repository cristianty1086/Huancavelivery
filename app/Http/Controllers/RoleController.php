<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use AppHttpControllersBaseController as BaseController;
use Validator;
use AppHttpResources\Role as RoleResource;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Role::all();
        return view('roles.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roles.create');
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
        $items = Role::create($input);
        return redirect()->route('roles.index')
                ->with('¡Exito!','Role creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $item = Role::find($id);
        if (is_null($item)) {
            return $this->sendError('Role not found.');
        }
        return $this->sendResponse(new RoleResource($item), 'Role retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $role->update($request->all());
        return redirect()->route('roles.index')
                ->with('¡Exito!','Role actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return redirect()->route('roles.index')
                ->with('¡Exito!','El Role se quito con éxito.');
    }
}
