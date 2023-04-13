<?php

use Illuminate\Support\Facades\Auth;

$data = Auth::user();
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"><?php echo $data->nama ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php
                if ($data->status == 1) {
                ?>
                    <li class="nav-item">
                        <a href="{{url('pasien')}}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Pasien
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('pendaftaran')}}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Pendaftaran
                            </p>
                        </a>
                    </li>
                <?php
                } else { ?>
                    <li class="nav-item">
                        <a href="{{url('user')}}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('pasien')}}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Pasien
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('dokter')}}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Dokter
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('daftar')}}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Pendaftaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('poli')}}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Poli
                            </p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>