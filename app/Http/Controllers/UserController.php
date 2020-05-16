<?php

namespace App\Http\Controllers;
use App\Rol;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $id_rol =  Rol::all();
        return view('users.edit', ['users' => $user, 'id_rol' => $id_rol]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $id_rol = Rol::all();
        return view('users.show', ['id_rol' => $id_rol, 'users' => $user]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user)
    {
        $request = request()->all();
        $user->update($request);
        return back()->withStatus(__('Perfil actualizado con éxito.'));
    }
}
