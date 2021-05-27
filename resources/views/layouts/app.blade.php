@extends('layouts.base')

@section('baseStyles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@endsection

@section('baseScripts')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

@endsection

@section('body')
    @component('components.navbar')

    @endcomponent

    <div class="mt-4">
        @yield('content')
    </div>
@endsection
