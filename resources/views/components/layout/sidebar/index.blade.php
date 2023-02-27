@php
  $user = auth()->user();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar mt-0 h-100">
    <div class="user-panel my-3 pb-3 d-flex align-items-center">
      <div class="image pl-2">
      <img src="{{ asset($user->image) }}" class="img-circle elevation-2" alt="Imagen del usuario">
      </div>
      <div class="info">
        <p class="d-block text-white m-0">{{ $user->full_name }}</p>
        <span class="text-bold text-muted">{{ $user->role }}</span>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
        <x-layout.sidebar.item :url="route('home')" icon="home">
          Inicio
        </x-layout.sidebar.item>
        <x-layout.sidebar.item icon="graduation-cap">
          Cursos
          <x-slot name="menu">
            @isnt('Administrador')
            <x-layout.sidebar.item :url="route('available-courses.index')" icon="list">
              Lista de cursos
            </x-layout.sidebar.item>
            @endis
            @is('Administrador')
            <x-layout.sidebar.item :url="route('courses.index')" icon="list">
              Lista de cursos
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('courses.create')" icon="plus">
              Registrar curso
            </x-layout.sidebar.item>
            @endis
            @is('Estudiante')
            <x-layout.sidebar.item :url="route('users.enrollments.index', $user->id)" icon="star">
              Mis cursos
            </x-layout.sidebar.item>
            @endis
            @is('Instructor')
              @if ($user->enrolledCourses)
              <x-layout.sidebar.item :url="route('users.enrollments.index', $user->id)" icon="star">
                Mis cursos
              </x-layout.sidebar.item>
              @endif
            <x-layout.sidebar.item :url="route('users.courses.index', $user->id)" icon="school">
              Cursos dictados
            </x-layout.sidebar.item>
            @endis
            @isnt('Estudiante')
            <x-layout.sidebar.item :url="route('areas.index')" icon="chalkboard-teacher">
              Áreas de formación
            </x-layout.sidebar.item>
            @endisnt
          </x-slot>
        </x-layout.sidebar.item>
        <x-layout.sidebar.item icon="basketball-ball">
          Clubes
          <x-slot name="menu">
            @is('Administrador')
            <x-layout.sidebar.item :url="route('clubs.index')" icon="list">
              Lista de clubes
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('clubs.create')" icon="plus">
              Registrar club
            </x-layout.sidebar.item>
            @endis
            @isnt('Administrador')
            <x-layout.sidebar.item :url="route('available-clubs.index')" icon="list">
              Lista de clubes
            </x-layout.sidebar.item>
            @endis
            @is('Estudiante')
            <x-layout.sidebar.item :url="route('users.memberships.index', $user->id)" icon="star">
              Mis clubes
            </x-layout.sidebar.item>
            @endis
            @is('Instructor')
              @if ($user->joinedClubs)
              <x-layout.sidebar.item :url="route('users.memberships.index', $user->id)" icon="star">
                Mis clubes
              </x-layout.sidebar.item>
              @endif
            <x-layout.sidebar.item :url="route('users.clubs.index', $user->id)" icon="school">
              Clubes dictados
            </x-layout.sidebar.item>
            @endis
          </x-slot>
        </x-layout.sidebar.item>
        @is('Administrador')
        <x-layout.sidebar.item icon="boxes">
          Inventario
          <x-slot name="menu">
            <x-layout.sidebar.item :url="route('items.amount.index')" icon="list-alt">
              Inventario actual
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('operations.index')" icon="history">
              Historial
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('items.index')" icon="th">
              Artículos
            </x-layout.sidebar.item>
          </x-slot>
        </x-layout.sidebar.item>
        @endis
        <x-layout.sidebar.item icon="money-bill">
          Pagos
          <x-slot name="menu">
            @isnt('Administrador')
            <x-layout.sidebar.item :url="route('users.payments.index', $user->id)" icon="list">
              Mis pagos
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('unfulfilled-payments.index', ['user' => $user->id])" icon="receipt">
              Cuotas restantes
            </x-layout.sidebar.item>
            @endis
            @is('Administrador')
            <x-layout.sidebar.item :url="route('payments.index')" icon="list">
              Lista de pagos
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('pending-payments.index')" icon="check">
              Pagos pendientes
            </x-layout.sidebar.item>
            @endis
          </x-slot>
        </x-layout.sidebar.item>
        @isnt('Administrador')
        <x-layout.sidebar.item :url="route('schedule')" icon="calendar-alt">
          Horario
        </x-layout.sidebar.item>
        @endisnt
        @is('Administrador')
        <x-layout.sidebar.item url="#" icon="chart-pie">
          Estadísticas
        </x-layout.sidebar.item>
        @endis
        <div class="divider"></div>
        @isnt('Administrador')
        <x-layout.sidebar.item :url="route('users.show', $user->id)" icon="user-alt">
          Perfil
        </x-layout.sidebar.item>
        @endisnt
        @is('Administrador')
        <x-layout.sidebar.item icon="cog">
          Configuración
          <x-slot name="menu">
            <x-layout.sidebar.item :url="route('users.index')" icon="user-alt">
              Usuarios
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('pnfs.index')" icon="university">
              PNFs
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('credentials.index')" icon="file-invoice">
              Credenciales de pago
            </x-layout.sidebar.item>
            <x-layout.sidebar.item url="#" icon="database">
              Base de datos
            </x-layout.sidebar.item>
          </x-slot>
        </x-layout.sidebar.item>
        @endis
        <x-layout.sidebar.item :url="route('logout')" icon="sign-out-alt">
          Cerrar Sesión
        </x-layout.sidebar.item>
      </ul>
    </nav>
  </div>
</aside>