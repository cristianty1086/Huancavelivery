<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\User;
use App\Role;
use App\RoleUser;
use Validator;
use App\Http\Resources\User as UserResource;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        if(count($users)>0){
            foreach($users as $user)
            {
                $user['roles'] = $user->roles;
            }
        }
        return view('users.index',['data' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'rol' => 'required',
            'password' => 'required',
            'telefono' => 'required',
            'estado' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->file('avatar')) {
            $imagePath = $request->file('avatar');
            $imageName = $imagePath->getClientOriginalName();
            $imageNameUnique = uniqid().".".$imagePath->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs('uploads', $imageNameUnique, 'public');
            $user['avatar'] = '/storage/'.$path;
          }

        $user['password'] = bcrypt($input['password']);
        $user['name'] = $request->name;
        $user['telefono'] = $request->phone;
        $user['estado'] = $request->status;
        $user['email'] = $request->email;
        $us = User::create($user);

        RoleUser::create(['user_id'=>$us->id,'role_id'=>$request->rol]);
        return redirect()->route('users.index')
                        ->with('success','Usuario creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',['user'=>$user,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'rol' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        if ($request->file('avatar')) {
            $imagePath = $request->file('avatar');
            $imageName = $imagePath->getClientOriginalName();
            $imageNameUnique = uniqid().".".$imagePath->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs('uploads', $imageNameUnique, 'public');
            $user->avatar = '/storage/'.$path;
          }

        $user->name = $request->name;
        $user->telefono = $request->telefono;
        $user->estado = $request->status;
        $user->email = $request->email;
        $user->save();

        $roleuser = RoleUser::where('user_id',$user->id);
        if(is_null($roleuser))
        {
            RoleUser::create(['user_id'=>$user->id,'role_id'=>$request->rol]);
        }
        else{
            $roleuser->role_id = $request->rol;
        }
        return redirect()->route('users.index')
                        ->with('success','Datos actualizados con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
                        ->with('success','El usuario se quito con exito.');
    }
}
