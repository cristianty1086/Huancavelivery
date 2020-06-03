<?php

namespace App\Http\Controllers;

use App\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use AppHttpResources\RoleUser as RoleUserResource;

class RoleUserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = RoleUser::all();
        return view('role_user.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('role_user.create');
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
        $items = RoleUser::create($input);
        return redirect()->route('role_user.index')
                ->with('�Exito!','RoleUser creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function show(RoleUser $roleUser)
    {
        //
        $item = RoleUser::find($id);
        if (is_null($item)) {
            return $this->sendError('RoleUser not found.');
        }
        return $this->sendResponse(new RoleUserResource($item), 'RoleUser retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleUser $roleUser)
    {
        //
        return view('role_user.edit',compact('roleUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoleUser $roleUser)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $roleUser->update($request->all());
        return redirect()->route('role_user.index')
                ->with('�Exito!','RoleUser actualizado con �xito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleUser $roleUser)
    {
        //
        $roleUser->delete();
        return redirect()->route('role_user.index')
                ->with('�Exito!','El RoleUser se quito con �xito.');
    }
}
