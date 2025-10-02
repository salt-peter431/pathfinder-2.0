<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>User Settings | Skote - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    
    <!-- App css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
</head>

<body class="loading" data-topbar="colored" data-layout="horizontal" data-layout-menu="fixed" data-rightbar-onstart="true">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Main Content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page Title -->
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="page-title">User Settings</h6>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Settings</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php if (session()->getFlashdata('success')): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashdata('success') ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (session()->getFlashdata('error')): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashdata('error') ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php endif; ?>

                                    <form method="post">
                                        <?= csrf_field() ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="theme_mode" class="form-label">Theme Mode</label>
                                                    <select name="theme_mode" id="theme_mode" class="form-select">
                                                        <option value="dark" <?= $settings['theme_mode'] === 'dark' ? 'selected' : '' ?>>Dark</option>
                                                        <option value="light" <?= $settings['theme_mode'] === 'light' ? 'selected' : '' ?>>Light</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="sidebar_layout" class="form-label">Sidebar Layout</label>
                                                    <select name="sidebar_layout" id="sidebar_layout" class="form-select">
                                                        <option value="horizontal" <?= $settings['sidebar_layout'] === 'horizontal' ? 'selected' : '' ?>>Horizontal</option>
                                                        <option value="vertical" <?= $settings['sidebar_layout'] === 'vertical' ? 'selected' : '' ?>>Vertical</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="home_screen" class="form-label">Home Screen</label>
                                                    <select name="home_screen" id="home_screen" class="form-select">
                                                        <option value="dashboard" <?= $settings['home_screen'] === 'dashboard' ? 'selected' : '' ?>>Dashboard</option>
                                                        <option value="orders" <?= $settings['home_screen'] === 'orders' ? 'selected' : '' ?>>Orders</option>
                                                        <option value="customers" <?= $settings['home_screen'] === 'customers' ? 'selected' : '' ?>>Customers</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Save Settings</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>