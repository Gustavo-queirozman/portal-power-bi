<?php
namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class NewUserMail extends Mailable implements ShouldQueue
{
    public $dados;

    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    public function build()
    {
        return $this->markdown('emails.new_user')
                    ->subject('Novo cadastro')
                    ->with('dados', $this->dados);
    }
}
