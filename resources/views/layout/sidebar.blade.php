<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('Logo.png') }}" alt="Logo" width="50">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-65">BTIKA STORE</span>
        </a>

        <a href="/menu;" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ url('/') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <!-- Entitas Master -->
        {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Entitas Master</span></li> --}}
        <li class="menu-item {{ Request::is('role/index') || Request::is('role/edit/*') ? 'active' : '' }}">
            <a href="{{ url('role/index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Role">Role</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('user/index') || Request::is('user/edit/*') ? 'active' : '' }}">
            <a href="{{ url('user/index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="User">User</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('vendor/index') || Request::is('vendor/edit/*') ? 'active' : '' }}">
            <a href="{{ url('vendor/index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-buildings"></i>
                <div data-i18n="Vendor">Vendor</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('satuan/index') || Request::is('satuan/edit/*') ? 'active' : '' }}">
            <a href="{{ url('satuan/index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-calculator"></i>
                <div data-i18n="Satuan">Satuan</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('barang/index') || Request::is('barang/edit/*') ? 'active' : '' }}">
            <a href="{{ url('barang/index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Barang">Barang</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('margin-penjualan/index') || Request::is('margin-penjualan/edit/*') ? 'active' : '' }}">
            <a href="{{ url('margin-penjualan/index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-offer"></i>
                <div data-i18n="Margin Penjualan">Margin Penjualan</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('pengadaan*') ? 'active open' : '' }}">
            <a href="cards-basic.html" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Pengadaan">Pengadaan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('pengadaan') || Request::is('pengadaan/edit/*') ? 'active' : '' }}">
                    <a href="{{ url('pengadaan/index') }}" class="menu-link">
                        <div data-i18n="Pengadaan">Pengadaan</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('detail-pengadaan/index') | Request::is('detail-pengadaan/edit/*') ? 'active' : '' }}">
                    <a href="{{ url('detail-pengadaan/index') }}" class="menu-link">
                        <div data-i18n="Detail Pengadaan">Detail Pengadaan</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="/menu" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cart"></i>
                <div data-i18n="User interface">Penjualan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Error">Penjualan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Error">Detail Penjualan</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="/menu" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Extended UI">Penerimaan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Error">Penerimaan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Error">Detail Penerimaan</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="icons-boxicons.html" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-sync"></i>
                <div data-i18n="Boxicons">Retur</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Error">Retur</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Error">Detail Retur</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="icons-boxicons.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Boxicons">Kartu Stok</div>
            </a>
        </li>
    </ul>
</aside>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil semua elemen dengan class 'menu-item'
        let menuItems = document.querySelectorAll('.menu-item');

        // Loop melalui semua item menu
        menuItems.forEach(function(item) {
            // Tambahkan event listener untuk 'click' pada setiap item
            item.addEventListener('click', function() {
                // Hapus class 'active' dari semua item
                menuItems.forEach(function(el) {
                    el.classList.remove('active');
                });

                // Tambahkan class 'active' pada item yang diklik
                this.classList.add('active');
            });
        });
    });
</script>
