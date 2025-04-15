<?php

namespace App\Http\Controllers\Auth;

use App\Mail\NewUserMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Apenas convidados podem acessar
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validação dos dados do formulário
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
    }

    /**
     * Sobrescreve o método padrão de registro para apenas enviar e-mail
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // Dispara o e-mail
        Mail::to('destinatario@exemplo.com')->queue(new NewUserMail($request->all()));

        return response()->json(['mensagem' => 'E-mail enviado com sucesso!']);
    }
}
