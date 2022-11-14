<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AppController extends Controller
{
    public function login()
    {
        return view('login',[]);
    }

    public function vendedores($token)
    {
        $validate = $this->validar($token);
        if( $validate['success'] ){
            // Obtener la lista de vendedores
            $vendedores_obj = User::where('perfil_id',2)
                ->where('active',1);
            $vendedores = [];
            foreach($vendedores_obj as $vendedor){
                $v = json([
                    'id' => $vendedor->id,
                    'nombre' => $vendedor->name
                ]);
                array_push($vendedores, $v);
            }
            return view('usuarios.admin.vendedores',[
                'vendedores' => $vendedores,
            ]);
        }
        return $validate;
    }

    public function validar($token)
    {
        $user = JWTAuth::authenticate($token);
        if(!$user){
            return [
                'success' => true,
                'message' => 'User connected'
            ];
        }
        return [
            'success' => false,
            'message' => 'Invalid token / token expired'
        ];
    }
}
