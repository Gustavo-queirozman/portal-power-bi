@component('mail::message')
# 🎉 Nova solicitação de cadastro

Olá! Um novo usuário acabou de solicitar cadastro com os seguintes dados:

@component('mail::table')
| Campo     | Informação              |
|-----------|--------------------------|
| **Nome**      | {{ $dados['name'] ?? 'Não informado' }} |
| **Usuário**   | {{ $dados['username'] ?? 'Não informado' }} |
| **Email**     | {{ $dados['email'] ?? 'Não informado' }} |
@endcomponent

@endcomponent
