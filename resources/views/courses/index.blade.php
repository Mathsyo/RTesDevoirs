@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>
            <a href="{{ route('home') }}" class="text-decoration-none text-dark me-2">
                <i class="bi bi-arrow-left"></i>
            </a>
            Toutes les matières
        </h1>
        @if(auth()->user()->isAdmin())
            <a class="btn btn-primary btn-lg" href="{{ route('courses.create') }}">
                <i class="bi bi-plus-lg me-2"></i>
                Ajouter
            </a>
        @endif
    </div>
    <hr>
    @include('includes.alert')
    @livewire('course.list-course')
@endsection
