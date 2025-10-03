<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('partials/title-meta') ?>
    <?= view('partials/head-css', ['title' => $title, 'theme_mode' => $theme_mode]) ?> <!-- Head CSS with title and theme_mode passed -->
</head>
    <?= view('partials/body') ?>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Main Content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?= view('partials/page-title', ['pagetitle' => 'User Settings']) ?> <!-- Page title -->
                    <?= $theme_mode ?? 'NOT SET' ?> <!-- Debug: Display theme_mode -->
                    <!-- Content-->
                    
                </div>
            </div>
        </div>

        <?= view('partials/right-sidebar') ?> <!-- Optional right sidebar -->
    </div>
    <!-- End layout-wrapper -->

    <?= view('partials/menu') ?> <!-- Sidebar menu -->

    <?= view('partials/footer') ?> <!-- Footer -->

    <!-- Vendor JS -->
    <?= view('partials/vendor-scripts') ?>

</body>
</html>