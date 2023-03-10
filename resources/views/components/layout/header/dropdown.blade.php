@php
    $user = Auth::user();
@endphp

<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
  @if ($user->unreadNotifications->isNotEmpty())
    <a href="{{ route('mark-all-notifications') }}" class="dropdown-item dropdown-header">
      Marcar todo como leído
    </a>
    @foreach ($user->unreadNotifications as $notification)
      <x-layout.header.notification :notification=$notification />
      <div class="dropdown-divider"></div>
    @endforeach
  @else
    <div class="empty-notification">No tienes ninguna notificación</div>
  @endif
  {{-- TODO -> Se hace una vista de notificaciones en general y que cada una lleve a una vista, no se como crjo se haría eso, o directamente no se pone el "ver todas las notificaciones" xd --}}
  <a href="{{ route('payments.index') }}" class="dropdown-item dropdown-footer">
    Ver todas las notificaciones
  </a>
</div>