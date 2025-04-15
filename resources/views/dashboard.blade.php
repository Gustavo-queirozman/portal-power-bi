@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('conteudo')
<iframe style="width:100%; height:100%;" src="{{$urlPowerBi}}" frameborder="0"></iframe>
@endsection

@push('styles')
    @vite(['resources/css/dashboard.css'])
@endpush
