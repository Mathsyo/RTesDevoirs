@extends('layouts.app')

@section('content')
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="card rounded-4 p-4 shadow-none">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>
                        <a href="{{ route('courses.index') }}" class="text-decoration-none text-dark me-2">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        Ajouter une matière
                    </h1>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>
                        Ajouter
                    </button>
                </div>

                <hr>

                @include('includes.alert')

                <div class="row">

                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}">
                    </div>

                    <div class="mb-3">
                        <label for="acronym" class="form-label">Acronyme</label>
                        <input type="text" class="form-control" id="acronym" name="acronym" value="{{ old('acronym') }}">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Couleur</label>
                        <input type="color" class="form-control" id="color" name="color" value="{{ old('color') }}">
                    </div>

                    <div class="mb-3">
                        <label for="teacher" class="form-label">Professeur</label>
                        <select class="form-select" id="teacher_id" name="teacher_id">
                            <option value="">Aucun</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->firstname }} {{ $teacher->lastname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
