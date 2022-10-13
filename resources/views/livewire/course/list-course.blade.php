<div>
    <div class="d-flex justify-content-between align-items-center">
        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>
            <input type="text" class="form-control col-md-5" placeholder="Rechercher un cours" wire:model="search">
        </div>
        <select class="form-select col-md-1 mb-3" wire:model="perPage">
            <option value="5">5</option>
            @foreach([10, 25, 50, 100] as $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <ul class="list-group mb-3">
        @foreach ($courses as $course)
            <li class="list-group-item p-3 px-4 position-relative" style="border-left: 3px solid {{ $course->color }}">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">
                            <span class="text-muted">
                                {{ $course->code }} {{ $course->acronym ? ' '.$course->acronym : '' }}
                            </span>
                            {!! $course->name ? '- '.$course->name : '' !!}
                        </h5>
                        <small class="d-block text-muted">
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
                        </small>
                    </div>
                    <div>
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-outline-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-outline-danger btn-sm" wire:click="delete({{ $course->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
