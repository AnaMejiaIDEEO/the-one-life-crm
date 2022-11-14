<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Perfil;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, SessionManager $sessionManager)
    {
        /* if( User::where('email',request()->input('email')) ){
            $message = "El usuario ya existe.";
            return view('usuarios/response-register', ['message'=>$message]);
        }

        if( request()->input('password') !== request()->input('password_confirmation') ){
            $message = "La confirmación de la contraseña es incorrecta.";
            return view('usuarios/response-register', ['message'=>$message]);
        } */
        
        $user = User::create($request->validated());
        if( $user !== null){
            $credentials = $request->only('email', 'password');
            try{
                $token = JWTAuth::attempt($credentials);
                $message = "Nuevo usuario registrado";
                /* return back()->with('message', $message); */
                return view('usuarios/response-register', ['token'=>$token,'message'=>$message]);
            } catch (JWTException $e) {
                return response()->json([
                    'message' => 'Error',
                ], 500);
            }
        }

        return back()->with('success', 'No se puede agregar al usuario solicitado.');
    }
    
    

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:50'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Login failed',
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'message' => 'Error',
            ], 500);
        }
        Auth::user();

        $user = User::where('email',request()->input('email'));
        $perfil = Perfil::find($user->perfil_id);

        return response()->view($perfil->index, ['token'=>$token, 'perfil'=>$user->perfil_id])
            ->header('Authorization', 'Bearer '.$token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'success' => true,
                'message' => 'User disconnected'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        //Realizamos la autentificación
        $user = JWTAuth::authenticate($request->token);
        if(!$user)
            return response()->json([
                'message' => 'Invalid token / token expired',
            ], 401);
        return response()->json(['user' => $user]);
    }
}
