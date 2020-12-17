@extends('layouts.layout')

@section('first-Content')
@include('partials.menu')
<div id="main-container">
    <div class="container">
        <h1 class="text-center text-uppercase pt-3  pb-4">@yield('title-section', 'Sin Titulo')</h1>
        @yield('second-content')
    </div>
</div>


@endsection
