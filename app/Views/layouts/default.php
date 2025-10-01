<!doctype html>
<html lang="en">
<head>
    <?= $title_meta ?? '' ?>  <!-- Assuming you have a variable for title/meta -->
    <?= $this->include('partials/head-css') ?>  <!-- Include any head partials if they exist -->
</head>
<body>
    <?= $this->include('partials/topbar') ?>  <!-- Your topbar.php -->
    <?= $this->include('partials/sidebar') ?>  <!-- Your sidebar.php -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>  <!-- This is where dynamic page content loads -->
            </div>
        </div>
        <?= $this->include('partials/footer') ?>  <!-- Your footer.php -->
    </div>
    <?= $this->include('partials/vendor-scripts') ?>  <!-- Include any script partials -->
    <script src="assets/js/app.js"></script>
</body>
</html>