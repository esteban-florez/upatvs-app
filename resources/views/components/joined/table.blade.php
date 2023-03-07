@props(['memberships', 'club'])

<x-table>
  <x-slot name="header">
    <tr>
      <th>Nombre</th>
      <th>Cédula</th>
      <th>¿UPTA?</th>
      <th>Acciones</th>
    </tr>
  </x-slot>
  <x-slot name="body">
    @foreach ($memberships as $membership)
      @php
        $student = $membership->student;
      @endphp
      <x-row
        :data="[
            $student->full_name,
            $student->full_ci,
            $student->upta,
          ]"
      >
        <x-slot name="actions">
          @can('destroy', $membership)
            <form method="POST" action="{{ route('memberships.destroy', $membership) }}">
              @csrf
              @method('DELETE')
              <x-button color="danger" class="btn-sm" type="submit">
                Retirar
              </x-button>
            </form>
          @endcan
          @can('view', $student)
            <x-button :url="route('users.show', $student)" class="btn-sm" icon="eye">
              Detalles
            </x-button>
          @endcan
        </x-slot>
      </x-row>
    @endforeach
  </x-slot>
  <x-slot name="pagination">
    <div class="pagination-container">
      {{ $memberships->links() }}
    </div>
  </x-slot>
</x-table>