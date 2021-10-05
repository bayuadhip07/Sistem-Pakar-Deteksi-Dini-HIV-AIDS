<?php
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    // echo $uri_segments[4];
?>

<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a <?php if($uri_segments[4]=='index.php'){echo "href='index.php'";}else{echo "href='../index.php'";} ?>>SISPAK-HAI</a>
        <hr style="margin-top: -5%;">
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
    <a <?php if($uri_segments[4]=='index.php'){echo "href='index.php'";}else{echo "href='../index.php'";} ?>>HIV</a>
        <hr style="margin-top: -5%;">
    </div>
    <ul class="sidebar-menu">
        <li class="<?php if($page == 'beranda'){echo 'active';} ?>">
            <a href="/sispak/modul/admin/index.php" class="nav-link"><i class="fas fa-fire"></i><span>Beranda</span></a>
        </li>
        <li class="<?php if($page == 'anggota'){echo 'active';} ?>">
            <a href="/sispak/modul/admin/anggota/show.php" class="nav-link"><i class="fas fa-user"></i><span>Anggota</span></a>
        </li>
        <li class="<?php if($page == 'stadium'){echo 'active';} ?>">
            <a href="/sispak/modul/admin/stadium/show.php" class="nav-link"><i class="fas fa-flask"></i><span>Stadium HIV/AIDS</span></a>
        </li>
        <li class="<?php if($page == 'gejala'){echo 'active';} ?>">
            <a href="/sispak/modul/admin/gejala/show.php" class="nav-link"><i class="fas fa-thermometer-full"></i><span>Gejala</span></a>
        </li>
        <li class="<?php if($page == 'basis_pengetahuan'){echo 'active';} ?>">
            <a href="/sispak/modul/admin/basis_pengetahuan/show.php" class="nav-link"><i class="fas fa-microchip"></i><span>Basis Pengetahuan</span></a>
        </li>
        <li class="<?php if($page == 'riwayat'){echo 'active';} ?>">
            <a href="/sispak/modul/admin/riwayat_konsultasi/show.php" class="nav-link"><i class="fas fa-database"></i><span>Riwayat Konsultasi</span></a>
        </li>
        <li class="<?php if($page == 'artikel'){echo 'active';} ?>">
            <a href="/sispak/modul/admin/artikel/show.php" class="nav-link"><i class="fas fa-newspaper"></i><span>Artikel</span></>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a> 
        </a>
    </div>
</aside>