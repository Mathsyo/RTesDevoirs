@extends('layouts.app')

@section('content')
    <div class="card rounded-4 p-4 shadow-none">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>
                    <a href="{{ route('home') }}" class="text-decoration-none text-dark me-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    Tous les professeurs
                </h1>
                @if(auth()->user()->isAdmin())
                    <a class="btn btn-primary btn-lg" href="{{ route('teachers.create') }}">
                        <i class="bi bi-plus-lg me-2"></i>
                        Ajouter
                    </a>
                @endif
            </div>
            <hr>
            @livewire('teacher.list-teacher')
        </div>
    </div>
@endsection
