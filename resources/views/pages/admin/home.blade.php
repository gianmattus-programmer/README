@extends('layouts.app')

@section('template_title')
    Bienvenido {{ Auth::user()->name }}
@endsection

@section('content')
    @include('partials.blackheader')

@endsection

@section('footer_scripts')
    
@endsection