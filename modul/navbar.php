<nav class="navbar fixed-top navbar-expand-md navbar-dark" style="background-color: #0353ff;">
    <div class="container">
        <div class="flex-row d-flex">
            <a href="/sispak/index.php">
                <img src="/sispak/assets/image/icon.png" alt="logo.php" class="logo">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapsingNavbar">
            <ul class="navbar-nav ml-auto" >
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'home'){echo 'active';} ?>" href="/sispak/index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'konsultasi'){echo 'active';} ?>" href="/sispak/modul/form_konsultasi.php">Konsultasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'artikel'){echo 'active';} ?>" href="/sispak/modul/artikel.php">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'about'){echo 'active';} ?>" href="/sispak/modul/about.php">Tentang Kami</a>
                </li>
                <?php
                if(!isset($_SESSION)) 
                { 
                    session_start(); 
                } 

                if (!isset($_SESSION['status'])) {
                ?>        
                    <li class="nav-item">
                        <a class="nav-link <?php if($page == 'login'){echo 'active';} ?>" href="/sispak/modul/login.php">Admin</a>
                    </li>
                <?php
                }else{
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/sispak/modul/admin/index.php">Menu Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sispak/modul/logout.php">Keluar</a>
                    </li>
                <?php
                }
                ?>

            </ul>
        </div>
    </div>
</nav>