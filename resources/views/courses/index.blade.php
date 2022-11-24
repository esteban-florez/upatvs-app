<x-layout.main title="Cursos">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/cursos.css') }}">
  @endpush
  <x-layout.bar>
    <x-search placeholder="Buscar curso..." :value="$search" name="search" :action="route(Route::currentRouteName())">
      <x-slot name="hidden">
        @foreach ($filters as $filter => $value)
          <input type="hidden" name="filters|{{ $filter }}" value="{{ $value }}">
        @endforeach
        <input type="hidden" name="sort" value="{{ $sort }}">
      </x-slot>
    <div>
      <x-button icon="plus" color="success" hide-text="sm" :url="route('courses.create')">
        Añadir
      </x-button>
      <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">
        Filtros
      </x-button>
    </div>
    <x-slot name="filtersCollapse">
      <x-filters-collapse>
        <x-slot name="filters">
          <x-select :options="$areas" id="areaId" name="filters|area_id" :selected="$filters['area_id'] ?? ''">
            Área de Formación
          </x-select>
        </x-slot>
        <x-slot name="sorts">
          <x-radio :options="['name' => 'Nombre', 'total_price' => 'Precio', 'duration' => 'Duración']" name="sort" :checked="$sort" notitle/>
        </x-slot>
      </x-filters-collapse>
    </x-slot>
  </x-layout.bar>
  <section class="container-fluid">
    <x-alerts type="success" icon="plus-circle"/>
    <x-alerts type="warning" icon="edit"/>
    <x-alerts type="danger" icon="times-circle"/>
    <x-table>
      <x-slot name="header">
        <th>ID</th>
        <th>Nombre</th>
        <th>Instructor</th>
        <th>Precio</th>
        <th>Martícula</th>
        <th>Estado</th>
        <th>Duración</th>
        <th>Acciones</th>
      </x-slot>
      <x-slot name="body">
        @forelse ($courses as $course)
          <x-row :data="[
            $course->id,
            $course->name,
            $course->instructor_id,
            $course->total_price,
            $course->student_limit,
            $course->duration,
            $course->duration,
            ]"
            :details="route('courses.show', $course->id)"
            :edit="route('courses.edit', $course->id)"
            :delete="route('courses.destroy', $course->id)"
          />
        @empty
          <div class="empty-container">
            <h2 class="empty">No hay cursos disponibles</h2>
          </div>
        @endforelse
        </x-slot>
        <x-slot name="pagination">
          <div class="pagination-container">
            {{ $courses->links() }}
          </div>
        </x-slot>
      </x-table>
  </section>
</x-layout.main>