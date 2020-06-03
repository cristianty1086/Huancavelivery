<?php

namespace App\Http\Controllers;

use App\PermissionUser;
use Illuminate\Http\Request;
use AppHttpControllersBaseController as BaseController;
use Validator;
use AppHttpResources\PermissionUser as PermissionUserResource;

class PermissionUserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = PermissionUser::all();
        return view('permisssion_user.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('permisssion_user.create');
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
        $items = PermissionUser::create($input);
        return redirect()->route('permisssion_user.index')
                ->with('¡Exito!','PermissionUser creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PermissionUser  $permissionUser
     * @return \Illuminate\Http\Response
     */
    public function show(PermissionUser $permissionUser)
    {
        //
        $item = PermissionUser::find($id);
        if (is_null($item)) {
            return $this->sendError('PermissionUser not found.');
        }
        return $this->sendResponse(new PermissionUserResource($item), 'PermissionUser retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PermissionUser  $permissionUser
     * @return \Illuminate\Http\Response
     */
    public function edit(PermissionUser $permissionUser)
    {
        //
        return view('permisssion_user.edit',compact('permissionUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PermissionUser  $permissionUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermissionUser $permissionUser)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $permissionUser->update($request->all());
        return redirect()->route('permisssion_user.index')
                ->with('¡Exito!','PermissionUser actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PermissionUser  $permissionUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermissionUser $permissionUser)
    {
        //
        $permissionUser->delete();
        return redirect()->route('permisssion_user.index')
                ->with('¡Exito!','El PermissionUser se quito con éxito.');
    }
}
