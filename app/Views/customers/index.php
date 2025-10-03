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
                    <?= view('partials/page-title', ['pagetitle' => 'Customer Dashboard']) ?> <!-- Adjusted: Use 'pagetitle' key only, matching template -->
                    <!--<?= $theme_mode ?? 'NOT SET' ?>--> <!-- Debug: Display theme_mode -->
                    <!-- Content-->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Customer List</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Tax Exempt</th>
                                                    <th>Created</th>
                                                    <th>Updated</th>
                                                    <th>Notes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($customers) && is_array($customers)): ?>
                                                    <?php foreach ($customers as $customer): ?>
                                                        <tr data-cust-id="<?= esc($customer['cust_id']) ?>"> <!-- Data attribute for future expansion -->
                                                            <td><?= esc($customer['cust_id']) ?></td>
                                                            <td><?= esc($customer['cust_name']) ?></td>
                                                            <td><?= esc($customer['cust_type']) ?></td>
                                                            <td><?= $customer['cust_tax'] ? 'No' : 'Yes' ?></td> <!-- Assuming 1 = taxable, 0 = exempt -->
                                                            <td><?= esc($customer['cust_created']) ?></td>
                                                            <td><?= esc($customer['cust_updated']) ?></td>
                                                            <td style="word-wrap: break-word; max-width: 200px;"><?= esc(substr($customer['cust_notes'], 0, 100)) ?>...</td> <!-- Truncated notes with wrapping -->
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center">No customers found.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
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