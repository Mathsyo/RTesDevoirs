@extends('layouts.app')

@section('content')
    <div class="card rounded-4 p-4 shadow-none">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>
                    <a href="{{ route('home') }}" class="text-decoration-none text-dark me-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    Tous les cours
                </h1>
            </div>
            <hr>
            @livewire('course.list-course')
        </div>
    </div>
@endsection
