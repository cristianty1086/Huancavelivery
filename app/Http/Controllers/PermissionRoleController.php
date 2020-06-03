<?php

namespace App\Http\Controllers;

use App\PermissionRole;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use AppHttpResources\PermissionRole as PermissionRoleResource;

class PermissionRoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = PermissionRole::all();
        return view('permission_role.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('permission_role.create');
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
        $items = PermissionRole::create($input);
        return redirect()->route('permission_role.index')
                ->with('�Exito!','PermissionRole creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PermissionRole  $permissionRole
     * @return \Illuminate\Http\Response
     */
    public function show(PermissionRole $permissionRole)
    {
        //
        $item = PermissionRole::find($id);
        if (is_null($item)) {
            return $this->sendError('PermissionRole not found.');
        }
        return $this->sendResponse(new PermissionRoleResource($item), 'PermissionRole retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PermissionRole  $permissionRole
     * @return \Illuminate\Http\Response
     */
    public function edit(PermissionRole $permissionRole)
    {
        //
        return view('permission_role.edit',compact('permissionRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PermissionRole  $permissionRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermissionRole $permissionRole)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $permissionRole->update($request->all());
        return redirect()->route('permission_role.index')
                ->with('�Exito!','PermissionRole actualizado con �xito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PermissionRole  $permissionRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermissionRole $permissionRole)
    {
        //
        $permissionRole->delete();
        return redirect()->route('permission_role.index')
                ->with('�Exito!','El PermissionRole se quito con �xito.');
    }
}
