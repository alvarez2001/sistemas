<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.usuarios.index');
    }
    public function destroy(Usuario $usuario)
    {

        $nombreImg = public_path('images/thumbnails/' . $usuario->imagen);

        $dato = $usuario->delete();


        if ($dato) {
            if (@getimagesize($nombreImg)) {
                unlink($nombreImg);
            }
            return redirect()->route('usuarios.listar')->with('status', 'Se ha eliminado el usuario con exito')->with('success', True);
        } else {
            return redirect()->route('usuarios.listar')->with('status', 'Ha ocurrido un error al eliminar el usuario');
        }
    }

    public function listar(Usuario $usuario)
    {

        $usuarios = Usuario::where('id', '!=', auth()->id())
            ->select(['id', 'nombre', 'apellido', 'cedula', 'correo', 'imagen', 'rol'])->get();
        return view('auth.usuarios.listar', ['usuarios' => $usuarios]);
    }

    public function actualizar(Usuario $usuario)
    {
        $validaciones = $this->validate(request(), [
            'nombre' => 'required|string|max:155',
            'apellido' => 'required|string|max:155',
            'cedula' => 'string|max:8',
            'correo' => 'email|string|max:255|unique:mvc_usuarios,correo,' . $usuario->id,
            'nickname' => 'required|string|max:100|unique:mvc_usuarios,nickname,' . $usuario->id,
            'rol_id' => 'required'
        ]);

        $actualizando = $usuario->update([
            'nombre' => $validaciones['nombre'],
            'apellido' => $validaciones['apellido'],
            'cedula' => $validaciones['cedula'],
            'correo' => $validaciones['correo'],
            'nickname' => $validaciones['nickname'],
            'rol' => $validaciones['rol_id']
        ]);

        if ($actualizando) {
            $reenviar = redirect()->route('usuarios.listar')->with('status', 'Se ha actualizar el usuario con exito')->with('success', True);
        } else {
            $reenviar = redirect()->route('usuarios.listar')->with('status', 'Se ha producido un error al actualizar el usuario ' . $usuario->nombre);
        }

        return $reenviar;
    }


    public function crear()
    {
        $validaciones = $this->validate(request(), [
            'nombre' => 'required|string|max:155',
            'apellido' => 'required|string|max:155',
            'cedula' => 'string|max:8',
            'correo' => 'email|string|max:255|unique:mvc_usuarios',
            'nickname' => 'required|string|max:100|unique:mvc_usuarios',
            'password' => 'required|string|max:255',
            'rol_id' => 'required',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,svg'
        ]);
        $imagen = $validaciones['imagen'];
        $nombre = time() . '.' . $imagen->getClientOriginalExtension();
        $destino = public_path('images/thumbnails');
        $imagen->move($destino, $nombre);

        $creado = Usuario::create([
            'nombre' => $validaciones['nombre'],
            'apellido' => $validaciones['apellido'],
            'cedula' => $validaciones['cedula'],
            'correo' => $validaciones['correo'],
            'nickname' => $validaciones['nickname'],
            'password' => Hash::make($validaciones['password']),
            'rol' => $validaciones['rol_id'],
            'imagen' => $nombre
        ]);

        if ($creado) {
            return redirect()->route('usuarios.showFormCrear')->with('status', 'Se ha creado el usuario con exito')->with('success', True);
        }
        return redirect()->route('usuarios.showFormCrear')->with('status', 'Ha ocurrido un error al guardar el usuario');
    }

    public function showFormCrear()
    {
        return $this->showsForms('auth.usuarios.crear', new Usuario);
    }

    public function showFormEdit(Usuario $usuario)
    {
        return $this->showsForms('auth.usuarios.put', $usuario);
    }

    private function showsForms($vista, $usuarioModel)
    {
        $roles = Rol::get();
        return view($vista, ['roles' => $roles, 'usuario' => $usuarioModel]);
    }
}