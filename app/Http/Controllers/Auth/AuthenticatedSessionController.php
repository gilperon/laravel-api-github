<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/*MEU JWT*/
use App\Helpers\MeuToken;
use function App\Helpers\storeToken;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        //Minha Chave
        $secret_key = "23sadsdfsf345345344234";
        //Set your Payloads vars to JWT
        $payload_array = [
            'sub' => 111, //ID do usuario
            'email' => $request->email, //ID do usuario
            'iss' => 'localhost.com', // Emissor
            'iat' => time()
        ];


        $token = new MeuToken($secret_key,$payload_array);
        $get_token = $token->createToken();
        storeToken($get_token);
        return view('auth.jwt');
        exit;

        //storeCookie();exit;
        //return $get_token;exit;


        /*
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
        */
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
