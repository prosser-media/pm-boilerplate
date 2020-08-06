@extends('layouts.main')

@section('content')
<div class="container mx-auto flex justify-center items-center" style="min-height: calc(100vh - 132px);">
    <div class="w-full md:w-1/2 lg:w-1/3 p-6 shadow-lg rounded">
        @yield('auth-content')
    </div>
</div>
@endsection
