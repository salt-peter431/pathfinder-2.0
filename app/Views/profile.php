<?= $this->extend('layouts/default') ?> <!-- Extend the layout you created -->

<?= $this->section('content') ?> <!-- Start the dynamic content section -->
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-4">
                            <h5 class="text-primary">User Profile</h5>
                            <p>Update your details with Skote.</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div>
                    <a href="/home"> <!-- Or wherever your dashboard is -->
                        <div class="avatar-md profile-user-wid mb-4">
                            <span class="avatar-title rounded-circle bg-light">
                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                            </span>
                        </div>
                    </a>
                </div>
                <div class="p-2">
                    <?php if ($success = session()->getFlashdata('success')) { ?>
                        <div class="alert alert-success text-center mb-4" role="alert"><?= esc($success) ?></div>
                    <?php } ?>
                    <?php if ($error = session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger text-center mb-4" role="alert"><?= esc($error) ?></div>
                    <?php } ?>
                    <!-- For now, just display data read-only; we'll make it editable next -->
                    <form class="form-horizontal" method="post" action="profile"> <!-- POST in Step 2 -->
    <div class="mb-3">
        <label for="user_friendly_name">Display Name</label>
        <a href="javascript:void(0)" id="user_friendly_name" class="editable" data-type="text" data-pk="<?= session()->get('id') ?>" data-url="<?= site_url('profile/update') ?>" data-title="Enter display name"><?= esc($user_friendly_name) ?></a>
    </div>

    <div class="mb-3">
        <label for="useremail">Email</label>
        <a href="javascript:void(0)" id="useremail" class="editable" data-type="email" data-pk="<?= session()->get('id') ?>" data-url="<?= site_url('profile/update') ?>" data-title="Enter email"><?= esc($useremail) ?></a>
    </div>

    <div class="mb-3">
        <label for="userpassword">Current Password</label>
        <a href="javascript:void(0)" id="userpassword" class="editable" data-type="password" data-pk="<?= session()->get('id') ?>" data-url="<?= site_url('profile/update') ?>" data-title="Enter current password">********</a>  <!-- Masked for security -->
    </div>

    <!-- Remove the submit button for now—Xeditable handles saves inline -->
</form>
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <p><a href="auth-logout" class="fw-medium text-primary">Sign Out</a></p>
            <p>© <script>
                    document.write(new Date().getFullYear())
                </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    // Initialize Xeditable for Display Name (text type)
    $('#user_friendly_name').editable({
        type: 'text',
        mode: 'inline',
        name: 'user_friendly_name',
        url: '<?= site_url('profile/update') ?>',
        pk: <?= session()->get('id') ?>,
        title: 'Enter display name',
        inputclass: 'form-control-sm',
        success: function(response, newValue) {
            if (response.status === 'success') {
                toastr.success('Display name updated successfully!');
            } else {
                toastr.error('Update failed: ' + response.msg);
            }
        },
        error: function() {
            toastr.error('Network error. Please try again.');
        }
    });

    // Initialize Xeditable for Email (email type)
    $('#useremail').editable({
        type: 'email',
        mode: 'inline',
        name: 'useremail',
        url: '<?= site_url('profile/update') ?>',
        pk: <?= session()->get('id') ?>,
        title: 'Enter email',
        inputclass: 'form-control-sm',
        success: function(response, newValue) {
            if (response.status === 'success') {
                toastr.success('Email updated successfully!');
            } else {
                toastr.error('Update failed: ' + response.msg);
            }
        },
        error: function() {
            toastr.error('Network error. Please try again.');
        }
    });

    // Initialize Xeditable for Password (password type, with confirmation prompt)
    $('#userpassword').editable({
        type: 'password',
        mode: 'inline',
        name: 'userpassword',
        url: '<?= site_url('profile/update') ?>',
        pk: <?= session()->get('id') ?>,
        title: 'Enter current password',
        placement: 'bottom',
        inputclass: 'form-control-sm',
        success: function(response, newValue) {
            if (response.status === 'success') {
                toastr.success('Password updated successfully!');
            } else {
                toastr.error('Update failed: ' + response.msg);
            }
        },
        error: function() {
            toastr.error('Network error. Please try again.');
        }
    });
});
</script>
<?= $this->endSection() ?> <!-- End the content section -->