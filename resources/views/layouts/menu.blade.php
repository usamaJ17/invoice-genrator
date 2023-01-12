{{-- <li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/*') ? 'active' : '' }}">Dashboard</a>
</li> --}}
<li class="nav-item dropdown">
    <a href="{{url('/')}}" class="nav-link">Home</a> 
</li>
<li class="nav-item dropdown">
    <a href="{{route('invoice.index')}}" class="nav-link">Invoice</a> 
</li>
<li class="nav-item dropdown">
    <a href="{{route('purchase.index')}}" class="nav-link">Purchase</a> 
</li>

