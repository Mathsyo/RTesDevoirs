<div>
    <div class="d-flex justify-content-between align-items-center">
        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>
            <input type="text" class="form-control col-md-5" placeholder="Rechercher un.e professeur.e" wire:model="search">
        </div>
        <select class="form-select col-md-1 mb-3" wire:model="perPage">
            <option value="5">5</option>
            @foreach([10, 25, 50, 100] as $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <ul class="list-group mb-3">
        @foreach ($teachers as $teacher)
            <li class="list-group-item p-3 px-4 position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">
                            <span class="text-muted">
                                {{ $teacher->firstname }} {{ $teacher->lastname }}
                            </span>
                        </h5>
                    </div>
                    <div>
                        <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-sm btn-outline-primary stretched-link">
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>