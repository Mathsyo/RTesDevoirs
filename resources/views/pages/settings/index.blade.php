@extends('layouts.app')

@section('content')
    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <div class="card rounded-4 p-4 shadow-none">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>
                        <a href="{{ route('home') }}" class="text-decoration-none text-dark me-2">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        Paramètres
                    </h1>
                    <button class="btn btn-primary">
                        <i class="bi bi-download me-2"></i>
                        Sauvegarder
                    </button>
                </div>
                <hr>

                @include('includes.alert')
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="generals" data-bs-toggle="tab" data-bs-target="#generals-pane" type="button" role="tab" aria-controls="generals-pane" aria-selected="true">
                            Généraux
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="mail" data-bs-toggle="tab" data-bs-target="#mail-pane" type="button" role="tab" aria-controls="mail-pane" aria-selected="false">
                            Mail
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="generals-pane" role="tabpanel" aria-labelledby="generals" tabindex="0">
                        <h2 class="text-muted text-center py-4">
                            <i class="bi bi-exclamation-circle"></i>
                            Aucun paramètre
                        </h2>
                    </div>
                    <div class="tab-pane fade p-4" id="mail-pane" role="tabpanel" aria-labelledby="mail" tabindex="0">

                        <div class="mb-3">
                            <label class="form-label">Email Type</label>
                            {{-- <input type="text" name="email_type" class="form-control @error('email_type') is-invalid @enderror" placeholder="Titre du devoir" value="{{ old('email_type') }}"> --}}
                            <select name="email_type" class="form-control @error('email_type') is-invalid @enderror">
                                <option value="smtp" {{ old('email_type') == 'smtp' ? 'selected' : '' }}>SMTP</option>
                                <option value="mailgun" {{ old('email_type') == 'mailgun' ? 'selected' : '' }}>Mailgun</option>
                                <option value="sendgrid" {{ old('email_type') == 'sendgrid' ? 'selected' : '' }}>Sendgrid</option>
                                <option value="ses" {{ old('email_type') == 'ses' ? 'selected' : '' }}>SES</option>
                                <option value="postmark" {{ old('email_type') == 'postmark' ? 'selected' : '' }}>Postmark</option>
                                <option value="log" {{ old('email_type') == 'log' ? 'selected' : '' }}>Log</option>
                                <option value="array" {{ old('email_type') == 'array' ? 'selected' : '' }}>Array</option>
                            </select>
                            @error('email_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Host --}}
                        <div class="mb-3">
                            <label class="form-label">Host</label>
                            <input type="text" name="email_host" class="form-control @error('email_host') is-invalid @enderror" placeholder="Host" value="{{ old('email_host') ?? env('MAIL_HOST') }}">
                            @error('email_host')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- port  --}}
                        <div class="mb-3">
                            <label class="form-label">Port</label>
                            <input type="text" name="email_port" class="form-control @error('email_port') is-invalid @enderror" placeholder="Port" value="{{ old('email_port') ?? env('MAIL_PORT') }}">
                            @error('email_port')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Username --}}
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="email_username" class="form-control @error('email_username') is-invalid @enderror" placeholder="Username" value="{{ old('email_username') ?? env('MAIL_USERNAME') }}">
                            @error('email_username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="email_password" class="form-control @error('email_password') is-invalid @enderror" placeholder="Password" value="{{ old('email_password') ?? env('MAIL_PASSWORD') }}">
                            @error('email_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Encryption Select --}}
                        <div class="mb-3">
                            <label class="form-label">Encryption</label>
                            <select name="email_encryption" class="form-control @error('email_encryption') is-invalid @enderror">
                                <option value="tls" {{ old('email_encryption') == 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ old('email_encryption') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                <option value="null" {{ old('email_encryption') == 'null' ? 'selected' : '' }}>Null</option>
                            </select>
                            @error('email_encryption')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
