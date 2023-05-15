@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('conteudo')
<iframe style="width:100%; height:100%;" src="{{$urlPowerBi}}" frameborder="0"></iframe>
@endsection

<style>
    body {
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
</style>