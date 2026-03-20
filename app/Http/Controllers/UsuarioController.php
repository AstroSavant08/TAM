<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Hash;
use Illuminate\Support\Facades\Validator;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            if(Auth::user()->estado==1){
            return redirect()->intended('landing');
            }
            else{
        return redirect('login')->with('type','warning')
                                ->with('message','Su estado en el sistema es inactivo');
            }
    }
      return redirect('login')->with('type','danger')
                                ->with('message','Usuario o contraseña incorrectos');
    }

    public function index()
    {
        $datos = Usuario::all();
        // dd($datos);
        return view('usuarios/index',compact('datos'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
        $datos = Usuario::all();
        return view('usuarios/new', compact('datos'));
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required|date',
            'password' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'ciudad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'estado' => 'required',
            'rol' => 'required',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)
                         ->withInput();
        }else{
            //Validar si llegó una imagen
            if($request->file('foto')){
                //Guarda el objeto de la foto, el nombre (separándolo por el punto) y la extesión
                $archivo = $request->file('foto');
                $original = explode(".",$archivo->getClientOriginalName());
                $extension = $archivo->getClientOriginalExtension();
                //Agrega al nombre un número aleatorio y la extensión
                $nombre = $original[0].rand(1000,100000).".".$extension;
               
                //Guarda en public/img/fotos
                $destino = public_path('img/fotos');
                $archivo->move($destino,$nombre);
                //Guarda la ruta y el nombre del archivo en el arreglo de datos
                $request['picture'] = 'img/fotos/'.$nombre;

            }
            $request['password'] = Hash::make($request['password']);
            $resultado = Usuario::create($request->all());

            if($request['form']==1){
                $destino = 'usuarios';
            }
            else{
                $destino = 'login';
            }
            if($resultado){
                return redirect($destino)->with('type','success')
                                        ->with('message','Registro creado correctamente');
            }
            else{
                return redirect($destino)->with('type','warning')
                                        ->with('message','Registro no se creó correctamente');
            }


            $request['password'] = Hash::make($request['password']);
            Usuario::create($request->all());

            return redirect('usuarios')->with('type','success')
                                        ->with('message','Registro creado exitosamente');
        }
        //Validator
        //if(retunr back)
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datos = Usuario::find($id);
        return view('usuarios/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'genero'=>'required',
            'fecha_nacimiento'=>'required|date',
            'password'=>'required',
            'email'=>'required|email',
            'ciudad'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'estado'=>'required',
            'rol'=>'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)
                         ->withInput();
    }else{
        $datos = Usuario::find($id);
        $datos->update($request->all());
            return redirect('usuarios')->with('type','warning')
                                        ->with('message','Registro actualizado exitosamente');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect('usuarios')->with('type','danger')
                                       ->with('message','El registro se eliminó');
    }
    
}
