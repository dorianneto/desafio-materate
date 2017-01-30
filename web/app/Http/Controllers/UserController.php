<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')->with('users', $users);
    }

    /**
     * Display a listing of the resource from trash.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $users = User::onlyTrashed()->get();

        return view('users.trash')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.update')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $password = $request->input('password');
        $rules    = [
            'name'  => 'required|max:191',
            'email' => ['required', 'max:191', Rule::unique('users')->ignore($user->id)]
        ];

        if (!empty($password)) {
            $rules['password'] = 'alpha_num|between:6,20';
        }

        $this->validate($request, $rules);

        try {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if (!empty($password)) { $user->password = bcrypt($password);}
            $user->save();

            $notice = [
                'alert' => 'success',
                'message' => 'Usuário alterado com sucesso!',
            ];
        } catch (Exception $except) {
            $notice = [
                'alert' => 'danger',
                'message' => $except->getMessage()
            ];
        }

        return redirect()->route('users.index')->with('notice', $notice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            $notice = [
                'alert' => 'success',
                'message' => 'Usuário removido com sucesso!',
            ];
        } catch (Exception $except) {
            $notice = [
                'alert' => 'danger',
                'message' => $except->getMessage()
            ];
        }

        return redirect()->route('users.index')->with('notice', $notice);
    }

    /**
     * Remove the specified resource from trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        try {
            $user = User::onlyTrashed()->find($id);
            $user->forceDelete();

            $notice = [
                'alert' => 'success',
                'message' => 'Usuário deletado com sucesso!',
            ];
        } catch (Exception $except) {
            $notice = [
                'alert' => 'danger',
                'message' => $except->getMessage()
            ];
        }

        return redirect()->route('users.trash')->with('notice', $notice);
    }

    /**
     * Restore the specified resource from trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        try {
            $user = User::onlyTrashed()->find($id);
            $user->restore();

            $notice = [
                'alert' => 'success',
                'message' => 'Usuário restaurado com sucesso!',
            ];
        } catch (Exception $except) {
            $notice = [
                'alert' => 'danger',
                'message' => $except->getMessage()
            ];
        }

        return redirect()->route('users.trash')->with('notice', $notice);
    }
}
