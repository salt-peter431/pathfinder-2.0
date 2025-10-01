<!doctype html>
<html lang="en" data-bs-theme="light" data-topbar="dark" data-layout="vertical" data-sidebar-size="lg" data-sidebar="dark" data-layout-mode="default" data-layout-style="default">
<head>
    <?= $title_meta ?? '' ?>
    <?= $this->include('partials/head-css') ?>
</head>
<body>
    <?= $this->include('partials/body') ?>
    <div id="layout-wrapper">
        <?= $this->include('partials/menu') ?>  <!-- Sidebar -->
        <div class="main-content">
            <?= $this->include('partials/topbar') ?>  <!-- Topbar (header) -->
            <div class="page-content">
                <div class="container-fluid">
                    <?= $page_title ?? '' ?>  <!-- Page header (e.g., "Profile / Pages") -->
                    <?= $this->renderSection('content') ?>  <!-- Dynamic page content -->
                </div>
            </div>
            <?= $this->include('partials/footer') ?>  <!-- Footer inside main-content -->
        </div>
    </div>
    <?= $this->include('partials/right-sidebar') ?>  <!-- Optional right sidebar -->
    <?= $this->include('partials/vendor-scripts') ?>
    <script src="assets/js/app.js"></script>
</body>
</html>