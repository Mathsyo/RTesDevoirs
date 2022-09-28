<div>
    <div class="card rounded-4 p-4 shadow-none">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <h1>
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="{{ $homeworksView['icon'] }}"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li><h6 class="dropdown-header">Affichage des devoirs</h6></li>
                                @foreach($homeworksViews as $key => $view)
                                    <li>
                                        <button class="dropdown-item" wire:click="setHomeworksView({{ $key }})">
                                            <i class="{{ $view['icon'] }} me-2"></i> 
                                            {{ $view['name'] }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        Tous les devoirs
                    </h1>
                </div>
                <a class="btn btn-lg btn-primary" href="{{ route('homeworks.create') }}">
                    <i class="bi bi-plus-lg"></i>
                    Nouveau
                </a>
            </div>
            <hr>
            @livewire($homeworksView['component'])
        </div>
    </div>
</div>
