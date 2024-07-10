<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ url('/') }}" class="b-brand" style="display: flex; align-items: center;">
                <img src="{{ asset('assets/images/logo-surat.png') }}" alt="Logo"
                    style="height: 33px; margin-right: 10px;" />
                <h1 class="header-title" style="font-size: 33px; font-weight: bold; margin: 0;">SiSurat</h1>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Menu</label>
                </li>
                <li class="nxl-item">
                    <a href="{{route('surat.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="fas fa-star"></i></span>
                        <span class="nxl-mtext">Arsip</span>
                    </a>
                </li>
                <li class="nxl-item">
                    <a href="{{route('kategori-surat.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="fas fa-cogs"></i></span>
                        <span class="nxl-mtext">Kategori Surat</span>
                    </a>
                </li>
                <li class="nxl-item">
                    <a href="{{ route('about') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="fas fa-info-circle"></i></span>
                        <span class="nxl-mtext">About</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
