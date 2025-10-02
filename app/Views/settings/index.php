<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <?= $this->include('partials/head-css', ['title' => $title]) ?> <!-- Head CSS with title passed -->
</head>

<body data-topbar="colored" data-layout="horizontal" data-layout-menu="fixed" data-rightbar-onstart="true">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?= $this->include('partials/body') ?> <!-- Topbar and sidebar wrapper -->

        <!-- Main Content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?= $this->include('partials/page-title', ['pagetitle' => 'User Settings']) ?> <!-- Page title -->

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Flash messages and form here (unchanged from previous) -->
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
                                            <!-- Profile Section (unchanged) -->
                                            <div class="col-12 mb-4">
                                                <h5 class="card-title">Profile Information</h5>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_name" class="form-label">Username</label>
                                                            <input type="text" name="user_name" id="user_name" class="form-control" value="<?= esc($user['user_name']) ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_friendly_name" class="form-label">Display Name</label>
                                                            <input type="text" name="user_friendly_name" id="user_friendly_name" class="form-control" value="<?= esc($user['user_friendly_name'] ?? '') ?>" placeholder="Optional">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_email" class="form-label">Email Address</label>
                                                            <input type="email" name="user_email" id="user_email" class="form-control" value="<?= esc($user['user_email']) ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_password" class="form-label">New Password</label>
                                                            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Leave blank to keep current">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Must match new password if changing">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Preferences Section (unchanged) -->
                                            <div class="col-12">
                                                <h5 class="card-title">Preferences</h5>
                                                <hr>
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
                                            </div>
                                        </div>
                                        <div class="text-end mt-4">
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

        <?= $this->include('partials/right-sidebar') ?> <!-- Optional right sidebar -->
    </div>
    <!-- End layout-wrapper -->

    <?= $this->include('partials/menu') ?> <!-- Sidebar menu -->

    <?= $this->include('partials/footer') ?> <!-- Footer -->

    <!-- Vendor JS -->
    <?= $this->include('partials/vendor-scripts') ?>
</body>

</html>