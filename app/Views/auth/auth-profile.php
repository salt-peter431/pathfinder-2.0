<!doctype html>
<html lang="en">
<head>
    <?= $title_meta ?>
    <?= $this->include('partials/head-css') ?>
</head>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
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
                                <a href="/home">  <!-- Or wherever your dashboard is -->
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
                                <form class="form-horizontal" method="post" action="profile">  <!-- POST in Step 2 -->
                                    <div class="mb-3">
                                        <label for="user_friendly_name">Display Name</label>
                                        <input type="text" class="form-control" id="user_friendly_name" name="user_friendly_name" value="<?= esc($user_friendly_name) ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail" name="useremail" value="<?= esc($useremail) ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword">Current Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Enter current password" value="" readonly>  <!-- Placeholder; editable next -->
                                    </div>

                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit" disabled>Update Profile</button>  <!-- Disabled for now -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p><a href="auth-logout" class="fw-medium text-primary">Sign Out</a></p>
                        <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('partials/vendor-scripts') ?>
    <script src="assets/js/app.js"></script>
</body>
</html>