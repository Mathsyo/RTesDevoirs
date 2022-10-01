@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="card rounded-4 p-4 shadow-none col-md-6">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>
                        <a href="{{ route('home') }}" class="text-decoration-none text-dark me-2">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        Nouveau devoir
                    </h1>
                </div>
                <hr>
                @include('includes.alert')
                <form action="{{ route('homeworks.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Titre du devoir</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titre du devoir" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description du devoir</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description du devoir">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date de rendu</label>
                        <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline') }}">
                        @error('deadline')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Matière</label>
                        <select name="course_id" class="form-select @error('course_id') is-invalid @enderror">
                            <option value="">Sélectionnez une matière</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" @if(old('course_id') == $course->id) selected @endif>{{ $course->code }} - {{ $course->acronym ?? $course->name }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @if(session()->has('confirm'))
                        <input type="text" name="force" class="d-none" value="1">
                        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content rounded-4 ">
                                    <div class="modal-header p-4">
                                        <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <span class="fs-3 text-danger mb-3">
                                            {{ session()->get('confirm') }}
                                        </span>
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <span class="fw-bold">Titre du devoir :</span>
                                                <span class="ms-2">{{ session()->get('homeworkCheck')->title }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span class="fw-bold">Description du devoir :</span>
                                                <span class="ms-2">{{ session()->get('homeworkCheck')->description }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span class="fw-bold">Date de rendu :</span>
                                                <span class="ms-2">{{ session()->get('homeworkCheck')->deadline }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span class="fw-bold">Matière :</span>
                                                <span class="ms-2">{{ session()->get('homeworkCheck')->course->code }} - {{ session()->get('homeworkCheck')->course->acronym ?? session()->get('homeworkCheck')->course->name }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer justify-content-between p-4">
                                        <a type="button" class="btn btn-outline-secondary border-0" href="{{ route('home') }}">Annuler</a>
                                        <button class="btn btn-primary" id="confirm" type="submit">Confirmer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            // on page loaded, show modal
                            window.addEventListener('load', function() {
                                $('#confirmModal').modal('show');
                            });
                        </script>
                    @else
                        <button type="submit" class="btn btn-lg btn-primary w-100">
                            <i class="bi bi-check-lg"></i>
                            Enregistrer
                        </button>
                    @endif

                </form>
            </div>
        </div>
    </div>

@endsection
