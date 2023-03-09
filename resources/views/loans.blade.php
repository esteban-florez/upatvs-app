<x-layout.main title="Préstamo de artículos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('loans.index') }}
  </x-slot>
  <x-slot name="titleAddon">
    <x-button icon="plus" color="success" hide-text="sm" data-target="#itemLoanModal" data-toggle="modal">
      Añadir
    </x-button>
  </x-slot>
  <section class="container-fluid px-2 px-sm-4 mt-3">
    <x-errors />
    <x-select2 />
    <x-alert />
    @if ($loans->isNotEmpty())
      <x-loan.table :loans=$loans />
    @else
      <div class="empty-container">
        <h2 class="empty">No hay préstamos registrados</h2>
      </div>
    @endif
  </section>
</x-layout.main>
<x-loan.new :items=$items :clubs=$clubs />