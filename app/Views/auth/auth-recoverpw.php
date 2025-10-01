<!doctype html>
<html lang="en">

<head>
    <?php $title_meta = '<title>Reset Password | Pathfinder</title>'; ?>
    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Reset Password</h5>
                                        <p>Enter your email to receive reset instructions.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="<?= base_url('/') ?>">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/locally.svg" alt="" class="rounded-circle" height="98%">
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <div class="p-2">
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    <?php 
                                        if (isset($result) && $result == 'success') { 
                                            echo "Email and instructions have been sent to you.<br/>Please check your email!";
                                        } else {
                                            echo "Enter your email and instructions will be sent to you!";
                                        }
                                    ?>
                                </div>
                                <?= form_open('auth-recoverpw', ['class' => 'form-horizontal']) ?>

                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email" name="useremail" value="<?= set_value('useremail') ?>" required>
                                    </div>
                                    <?php if (isset($validation) && $validation->hasError('useremail')) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->getError('useremail') ?>
                                        </div>
                                    <?php } ?>

                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                    </div>

                                <?= form_close() ?>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Remember It? <a href="<?= base_url('auth-login') ?>" class="fw-medium text-primary">Sign In here</a></p>
                        <p>© <?= date('Y') ?> Pathfinder. Crafted with <i class="mdi mdi-heart text-danger"></i> by Pride Printing</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- App js -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>