@extends('layouts.app')

@section('content')
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="card rounded-4 p-4 shadow-none">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>
                        <a href="{{ route('teachers.index') }}" class="text-decoration-none text-dark me-2">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        Ajouter un.e professeur.e
                    </h1>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>
                        Ajouter
                    </button>
                </div>

                <hr>

                <div class="row">

                    @include('includes.alert')

                    <div class="mb-3">
                        <label for="firstname" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}">
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
