<div>
    @if($homeworks->count() > 0)
        @foreach($homeworks as $date => $homeworks)
            <ul class="list-group mb-3">
                {{ \Carbon\Carbon::parse($date)->locale('fr')->isoFormat('dddd DD MMMM') }}
                @foreach ($homeworks as $homework)
                    <label class="list-group-item d-flex justify-content-between align-items-center mb-0 {{ $homework->done ? 'homework-done' : '' }}" style="border-left: 3px solid {{ $homework->course->color }}">
                        <div class="d-flex gap-3">
                            <input class="form-check-input position-static ms-0" type="checkbox" value="" style="font-size: 1.375em;" wire:click="toggleDone({{ $homework->id }})" {{ $homework->done ? 'checked' : '' }}>
                            <span class="pt-1 form-checked-content">
                                <strong>{{ $homework['title'] }}</strong>
                                <p class="mb-0 pb-0 fw-light">
                                    {{ $homework['description'] }}
                                </p>
                                @if(!$course)
                                    <small class="d-block text-muted">
                                        <i class="bi bi-bookmark-fill me-1"></i>
                                        {{ $homework->course->code }} - {{ $homework->course->acronym ?? $homework->course->name }}
                                    </small>
                                @endif
                            </span>
                        </div>
                        <button class="btn btn-outline-danger" wire:click="delete({{ $homework->id }})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </label>
                @endforeach
            </ul>
        @endforeach
    @else 
        <h2 class="text-muted text-center p-2">
            <i class="bi bi-exclamation-circle"></i>
            Aucun devoir
        </h2>
    @endif
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
</div>

@push('styles')
    <style>
        .homework-done {
            background-color: #e9ecef;
        }
        .homework-done .form-checked-content {
            text-decoration: line-through;
        }

    </style>
@endpush