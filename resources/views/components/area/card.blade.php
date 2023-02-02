<div class="col-sm-6 col-md-4 mb-3">
  <div class="card h-100">
    <div class="card-body">
      <div class="area-card">
        <div class="area-title">
          <h3 class="m-0">{{ str($area->name)->ucfirst() }}</h3>
          <p class="m-0">PNF:  
            <span class="font-weight-bold">
              {{ $area->pnf->name }}
            </span>
          </p>
        </div>
        <div class="area-buttons">
          <x-button :url="route('areas.edit', $area->id)" color="warning" icon="edit">Editar</x-button>
          <x-button :url="route('courses.index', ['filters|area_id' => $area->id])" icon="eye">Ver cursos</x-button>
        </div>
      </div>
    </div>
  </div>
</div>
