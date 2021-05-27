<div class="list-group">
    <a href="{{ route('account.index') }}"
        class="list-group-item list-group-item-action {{ $active == 'account' ? 'active' : null  }}"
        aria-current="true">
        Mis datos
    </a>
    <a href="{{ route('addresses.index') }}"
        class="list-group-item list-group-item-action {{ $active == 'address' ? 'active' : null  }}">Mis
        direcciones</a>

    <a href="{{ route('orders.index') }}"
        class="list-group-item list-group-item-action {{ $active == 'orders' ? 'active' : null  }}">Mis
        pedidos</a>

    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</div>