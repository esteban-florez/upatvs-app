<div class="col-sm-6 col-md-4 mb-3">
  <div class="card h-100">
    <div class="card-body">
      <div class="area-card">
        <div class="area-title">
          <h3 class="m-0">{{ Str::ucfirst($area->name) }}</h3>
          <p class="m-0">PNF:  
            <span class="font-weight-bold">
            @if($area->is_pnf)
              PNF en {{ Str::ucfirst($area->name) }}.
            @else
              N/A.
            @endif
            </span>
          </p>
        </div>
        <div class="area-buttons">
          <x-button icon="edit">Editar</x-button>
          <x-button icon="trash-alt" color="danger">Eliminar</x-button>
        </div>
      </div>
    </div>
  </div>
</div>
