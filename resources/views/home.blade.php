@extends('layouts.sidebar')
@section('title', 'Home')
@section('conteudo')
<div class="flex wrap" style="padding:0px; width:100%;" id="conteudos">
    <div style="background-color:white; border-radius:3px;  margin:5px; width:280px; padding:10px">
        <h3 style="margin:0px">Faturamento</h3>
        <p>
            Fonte: Caderno 2.0 <br>
            Dados atualizados em: 07/05/2023. <br>
            Dados atualizados até: Mar/2023. <br> 
            Sistemas de Referência: Sala de situação.
        </p>
        <div class="row" style="display:flex">
            <form action="/dashboard" method="post">
                @csrf
                <input type="hidden" name="setor" value="faturamento">
                <input type="hidden" name="versao" value="nova">
                <button type="submit" class="button" style="margin-right:10px;">NOVO PAINEL</button>
            </form>

            <form action="/dashboard" method="post">
                @csrf
                <input type="hidden" name="setor" value="faturamento">
                <input type="hidden" name="versao" value="anterior">
                <button type="submit" class="button">VERSÃO ANTERIOR</button>
            </form>
        </div>
    </div>
    <div style="background-color:white; border-radius:3px; margin:5px; width:280px; padding:10px">
    <h3 style="margin:0px">Venda</h3>
        <p>
            Fonte: Caderno 2.0 <br>
            Dados atualizados em: 07/05/2023. <br>
            Dados atualizados até: Mar/2023. <br> 
            Sistemas de Referência: Sala de situação.
        </p>
        <div class="row" style="display:flex">
            <form action="/dashboard" method="post">
                @csrf
                <input type="hidden" name="setor" value="venda">
                <input type="hidden" name="versao" value="nova">
                <button type="submit" class="button" style="margin-right:10px;">NOVO PAINEL</button>
            </form>

            <form action="/dashboard" method="post">
                @csrf
                <input type="hidden" name="setor" value="venda">
                <input type="hidden" name="versao" value="anterior">
                <button type="submit" class="button">VERSÃO ANTERIOR</button>
            </form>
        </div>
    </div>
</div>
@endsection


<style>
    body{
        background-color: #F0F0F4;
        font-family: Helvetica;
    }

    .flex {
        display: flex;
    }

    .wrap {
        flex-wrap: wrap;
    }

    .text-center {
        text-align: center;
    }

    @media (max-width:304px) {
        #conteudos {
            display: flex;
            justify-content: center;
        }
    }

    .button{
        
        border:1px solid #00995D;
        background-color: #00995D;
        padding:5px;
        color:white;
    }
</style>