<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('customer.dashboard')}}">Customer Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('customer/order*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer.order.index') }}"><i class="fas fa-hand-point-right"></i> <span>Total Order</span></a></li>
        </ul>
    </aside>
</div>
