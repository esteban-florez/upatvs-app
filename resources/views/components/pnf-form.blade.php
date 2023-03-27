@props(['pnf' => null])

@php
  $action = $pnf 
    ? route('pnfs.update', $pnf)
    : route('pnfs.store');
@endphp

<section class="container-fluid">
  <div class="row justify-content-center">
    <div class="card col-md-6 mt-3">
      <div class="card-body">
        <form method="POST" action="{{ $action }}">
          @if ($pnf)
            @method('PUT')
          @endif
          @csrf
          <h3>{{$pnf ? 'Editar' : 'Añadir'}} PNF</h3>
          <p class="font-italic">
            <b>Nota:</b> Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
          </p>
          <x-field name="name" placeholder="Ej. Informática" :value="old('name') ?? $pnf->name ?? ''" minlength="5" maxlength="50" required>
            Nombre: 
          </x-field>
          <x-field name="leader" placeholder="Ej. Luis Vargas" :value="old('leader') ?? $pnf->leader ?? ''" minlength="5" maxlength="50" required>
            Jefe de Departamento:
          </x-field>
          <x-button color="secondary" icon="times" :url="route('pnfs.index')">
            Cancelar
          </x-button>
          <x-button color="success" icon="check" type="submit">
            Aceptar 
          </x-button>
        </form>
      </div>
    </div>
  </div>
</section>