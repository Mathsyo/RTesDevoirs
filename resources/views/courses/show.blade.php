@extends('layouts.app')

@section('content')
    <div class="card rounded-4 p-4 shadow-none">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>
                    <a href="{{ route('home') }}" class="text-decoration-none text-dark me-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    {{ $course->code }} - {{ $course->acronym ?? $course->name }}
                </h1>
            </div>
            {{-- Teacher Details --}}
            @if($course->homeworks->count() > 0)
                <span class="mx-1">
                    <i class="bi bi-list-task me-1"></i>
                    {{ $course->homeworks->count() }} Devoirs
                </span>
            @endif
            @if($course->teacher)
                <span class="mx-1">
                    <i class="bi bi-person-fill me-1"></i>
                    {{ $course->teacher->firstname ?? '' }} {{ $course->teacher->lastname ?? '' }}
                </span>
            @endif

            <hr>
            <div class="my-3">
                    <h3 class="text-muted">Devoirs</h3>
                @livewire('homework.list-homework', ['course' => $course])
            </div>
        </div>
    </div>
@endsection
