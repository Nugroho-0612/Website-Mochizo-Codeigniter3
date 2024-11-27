<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('Admin/index') ?>" class="brand-link">
        <img src="<?= base_url() ?>assets/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$user['first_name']?></a>
            </div>
        </div>

       
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php $menu = $this->uri->segment(2); ?>
                <li class="nav-item">
                    <a href="<?= base_url('Admin/index') ?>" class="nav-link <?php if($menu=='index'){ echo "active"; }?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dasboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Admin/client') ?>" class="nav-link <?php if($menu=='client'){ echo "active"; }?>">
                        <i class="fas fa-users"></i>
                        <p>Client</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Admin/portofolio') ?>" class="nav-link <?php if($menu=='portofolio'){ echo "active"; }?>">
                        <i class="fas fa-folder"></i>
                        <p>Portofolio</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=site_url('Auth/logout')?>" class="nav-link ">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Log out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>