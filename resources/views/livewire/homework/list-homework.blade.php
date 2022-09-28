<div>
    @if($homeworks->count() > 0)
        @foreach($homeworks as $date => $homeworks)
            <ul class="list-group">
                {{ \Carbon\Carbon::parse($date)->locale('fr')->isoFormat('dddd DD MMMM') }}
                @foreach ($homeworks as $homework)
                    <label class="list-group-item d-flex gap-3 mb-0" style="border-left: 3px solid {{ $homework->course->color }}">
                        <input class="form-check-input position-static ms-0" type="checkbox" value="" style="font-size: 1.375em;">
                        <span class="pt-1 form-checked-content">
                            <strong>{{ $homework['title'] }}</strong>
                            <small class="d-block text-muted">
                                <i class="bi bi-bookmark-fill me-1"></i>
                                {{ $homework->course->code }} - {{ $homework->course->acronym ?? $homework->course->name }}
                            </small>
                        </span>
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
