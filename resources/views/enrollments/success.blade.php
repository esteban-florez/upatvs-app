<x-layout.main title="Inscripción en curso">
  @php
    $reservation = $enrollment->mode === 'Reservación';
  @endphp
  @push('css-plugins')
    <link rel="stylesheet" href="{{ asset('css/bs-stepper.min.css') }}">
  @endpush
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/inscripcion.css') }}">
  @endpush
  @push('js-plugins')
    <script defer src="{{ asset('js/bs-stepper.min.js') }}"></script>
  @endpush
  @push('js')
    <script defer type="module" src="{{ asset('js/inscripcionjs/successStepper.js') }}"></script>  
    <script defer src="{{ asset('js/inscripcionjs/responsiveStepper.js') }}"></script>  
  @endpush
  <section class="container-fluid">
    <div ref="stepper" class="bs-stepper">
      <x-stepper.header :reservation="$reservation"/>
      <div class="bs-stepper-content">
        @if ($reservation)
          <x-stepper.content id="modeStep" />            
        @endif
        <x-stepper.content id="typeStep" />
        <x-stepper.content id="confirmStep" />
        <x-stepper.content id="finalStep" :pdf-url="route('enrollments-pdf.show', $enrollment->id)" first>
          <h3>Inscripción finalizada</h3>
          <div class="alert alert-success mt-3">
            <i class="fas fa-info-circle fa-lg mr-2"></i>
            <p class="font-weight-normal d-inline" id="finalParagraph">
              @if ($isOnline)
                Su inscripción ha sido registrada con éxito. El administrador verificará su pago en los próximos días. Para formalizar su inscripción debe descargar la Planilla de Inscripción haciendo click en el botón de abajo, y llevarla hasta la sede de la UPTA en La Victoria.
              @else
                Su inscripción ha sido registrada con éxito. Ahora debe descargar la Planilla de Inscripción haciendo click en el botón de abajo, y después llevarla impresa a la sede de la UPTA en La Victoria para realizar su pago y confirmar su inscripción.
              @endif
            </p>
          </div>
        </x-stepper.content>
      </div>
    </div>
  </section>
</x-layout.main>