<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRecuperaRequest;
use App\Models\User;
use Illuminate\Support\Str;
use DB;

class RecuperaClaveController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('auth.recuperarClave');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function store(StoreRecuperaRequest $request)
    {

          $usuario = User::where('email', $request->email)
                          ->where('cedula', $request->cedula)
                          ->first();

        //$usuario = User::where('cedula', $request->cedula)->first();
        //dd($usuario);
        if ($usuario== null) {

         return redirect('/login')->with('status', 'Correo o Cedula no registrado en el sistema');
        }else
            {

                $usuario->password = bcrypt($request->password);
                //$usuario->change_password_admin = null;

                if($usuario->save())
                {
                   return redirect('/login')->with('message', 'La información fue almacenada satisfactoriamente');
                }
                else
                {
                  return redirect('/login')->with('status', 'Se ha presentado un error.!');
                }
         }

    }


}
