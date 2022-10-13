@extends('layouts.app')

@section('content')
    <div class="card rounded-4 p-4 shadow-none">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>
                    <a href="{{ route('teachers.index') }}" class="text-decoration-none text-dark me-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    {{ $teacher->firstname ?? '' }} {{ $teacher->lastname ?? '' }}
                </h1>
                <a class="btn btn-outline-warning" href="{{ route('teachers.edit', $teacher) }}">
                    <i class="bi bi-pencil me-2"></i>
                    Modifier
                </a>
            </div>
            @if($teacher->courses)
                @foreach ($teacher->courses as $course)
                    <span class="mx-1">
                        <i class="bi bi-person-fill me-1"></i>
                        <a href="{{ route('courses.show', $course) }}" class="text-decoration-none text-dark">
                            {{ $course->code }} - {{ $course->acronym ?? $course->name }}
                        </a>
                    </span>
                @endforeach
            @endif
            <hr>
            @include('includes.alert')
            {{-- Coordonnées --}}
            <div class="my-3">
                <h3 class="text-muted">Coordonnées</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Prénom</label>
                            <input type="text" class="form-control" value="{{ $teacher->firstname ?? '' }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" value="{{ $teacher->lastname ?? '' }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <br>
                            <button class="btn btn-outline-primary" id="teacher-email" data-email="{{ $teacher->email ?? '' }}" onclick="copyToClipboard('{{ $teacher->email ?? '' }}')">
                                {{ $teacher->email ?? '' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function copyToClipboard(text) {
            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);

            $('#teacher-email').removeClass('btn-outline-primary').addClass('btn-primary').html('Copié !');
            setTimeout(() => {
                $('#teacher-email').addClass('btn-outline-primary').removeClass('btn-primary');
                $('#teacher-email').html($('#teacher-email').attr('data-email'));
            }, 1000);
        }

    </script>
@endpush
