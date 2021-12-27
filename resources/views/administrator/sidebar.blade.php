<li>
    <a href=" {{ route('admin.dashboard') }} "><i class="fa fa-dashboard"></i>Dashboard</a>
</li>

<li>
    <a href="{{ route('admin.notulis') }}"><i class="fa fa-user"></i>Manajemen Notulis</a>
</li>

<li>
    <a href="{{ route('admin.notulen') }}"><i class="fa fa-list"></i>Data Notulen </a>
</li>

<li>
    <a href="{{ route('admin.pimpinan') }}"><i class="fa fa-user"></i>Pimpinan Rapat </a>
</li>


<li style="padding-left:2px;">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off text-danger"></i>{{__('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</li>

@push('styles')
    <style>
        .noclick       {
            pointer-events: none;
            cursor: context-menu;
            background-color: #ed5249;
        }

        .default{
            cursor: default;
        }

        .set_active{
            border-right: 5px solid #1ABB9C;
        }

    </style>
@endpush
