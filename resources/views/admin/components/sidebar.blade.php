<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin/product-category*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product-category.index') }}"><i class="fas fa-hand-point-right"></i> <span>Category</span></a></li>
            <li class="{{ Request::is('admin/product*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product.index') }}"><i class="fas fa-hand-point-right"></i> <span>Product</span></a></li>
            <li class="{{ Request::is('admin/order*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.order.index') }}"><i class="fas fa-hand-point-right"></i> <span>Total Order</span></a></li>
        </ul>
    </aside>
</div>
