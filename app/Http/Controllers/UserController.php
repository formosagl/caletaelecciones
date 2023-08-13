<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $usuarios = user::orderByDesc('level')->orderBy('name')->paginate(10);
        $niveles = [
            '5' => 'Super',
            '4' => 'Administrador',
            '3' => 'Director',
            '2' => 'Editor',
            '1' => 'Usuario',
            '0' => 'Desactivado'
        ];

        return view('users.index', compact('usuarios', 'niveles') );
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit($user) {
        if ($usuario = user::findOrFail($user)) {
            return view('users.edit', compact('usuario') );
        }

        return back()->with('error', 'No pudimos editar el usuario.');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|max:255|unique:users',
            'password'              => 'required|string|min:6|max:20',
            'password_confirmation' => 'required|string|same:password',
        ];

        $messages = [
            'name.required'       => 'Debes ingresar el nombre',
            'name'                => 'El nombre no es válido',
            'email.required'      => 'Debes ingresar un Email',
            'email.email'         => 'Debes ingresar un Email válido',
            'password.required'   => 'Debes ingresar una clave',
            'password.min'        => 'La clave debe tener al menos 6 caracteres',
            'password.max'        => 'La clave no debe tener mas de 20 caracteres',
            'password_confirmation.same'    => 'Las claves no coinciden.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = user::create([
            'name'             => strip_tags($request->input('name')),
            'email'            => $request->input('email'),
            'level'            => $request->level,
            'password'         => Hash::make($request->input('password')),
        ]);

        return redirect()->action('UserController@index')->with('success', 'Usuario creado con éxito.');
    }

    public function update(Request $request, $id)
    {
        $user = user::find($id);
        $emailCheck = ($request->input('email') != '') && ($request->input('email') != $user->email);
        $passwordCheck = $request->input('password') != null;

        $rules = [
            'name' => 'required|max:255',
        ];

        if ($emailCheck) {
            $rules['email'] = 'required|email|max:255|unique:users';
        }

        if ($passwordCheck) {
            $rules['password'] = 'required|string|min:6|max:20|confirmed';
            $rules['password_confirmation'] = 'required|string|same:password';
        }

        $messages = [
            'name.required'       => 'Debes ingresar el nombre',
            'name'                => 'El nombre no es válido',
            'email.required'      => 'Debes ingresar un Email',
            'email.email'         => 'Debes ingresar un Email válido',
            'password.required'   => 'Debes ingresar una clave',
            'password.min'        => 'La clave debe tener al menos 6 caracteres',
            'password.max'        => 'La clave no debe tener mas de 20 caracteres',
            'password.confirmed'  => 'Las claves no coinciden.',
            'password_confirmation.same'    => 'Las claves no coinciden.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->name = strip_tags($request->input('name'));

        if ($request->level != '5') {
            $user->level = strip_tags($request->input('level'));
        }

        if ($emailCheck) {
            $user->email = $request->input('email');
        }

        if ($passwordCheck) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();
        
        return redirect()->action('UserController@index')->with('success', 'Usuario modificado con éxito.');
    }

    public function destroy($id)
    {
        $currentUser = Auth::user();

        $user = user::findOrFail($id);

        if ($currentUser->id != $user->id) {
            $user->delete();

            return redirect()->action('UserController@index')->with('success', 'Usuario borrado con éxito.');
        }

        return back()->with('error', 'No puedes borrarte tu mismo.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('user_search_box');
        $searchRules = [
            'user_search_box' => 'required|string|max:255',
        ];
        $searchMessages = [
            'user_search_box.required' => 'Search term is required',
            'user_search_box.string'   => 'Search term has invalid characters',
            'user_search_box.max'      => 'Search term has too many characters - 255 allowed',
        ];

        $validator = Validator::make($request->all(), $searchRules, $searchMessages);

        if ($validator->fails()) {
            return response()->json([
                json_encode($validator),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $results = user::where('id', 'like', $searchTerm.'%')
                        ->orWhere('name', 'like', $searchTerm.'%')
                        ->orWhere('email', 'like', $searchTerm.'%')->get();

        return response()->json([
            json_encode($results),
        ], Response::HTTP_OK);
    }

}
