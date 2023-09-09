<!-- form submits to register, register controller and model -->
<!-- validates inputs and checks duplicate username -->
<!-- pre-polulate fields on error -->
<!-- errors are displayed below inputfields -->
<!-- successful submission populated database with new user details -->

<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid">
    <div class="d-flex flex-column justify-content-center align-items-center h-100 mt-5">
        <div class="card card-body text-light bg-dark shadow rounded mt-3" style="max-width: 500px;">
            <h2>User Registration</h2>
            <p class="text-muted">Please fill all fields to register</p>
            <form action="<?php echo URLROOT . '/users/register'; ?>" method="post">
                <fieldset class="mb-3">
                    <legend>Name</legend>
                    <div class="form-group mb-2">
                        <input type="text" name="name" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" placeholder="John" required>
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" placeholder="Watson" required>
                        <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>
                    </div>
                </fieldset>
                <fieldset class="mb-3">
                    <legend>Username & Password</legend>
                    <div class="form-group mb-2">
                        <input type="email" name="email" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="john@mail.com" required>
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" name="password" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="********" required>
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" placeholder="********" required>
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                </fieldset>
                <div class="d-flex justify-content-between align-items-center">
                    <input type="submit" value="Register" class="btn btn-success btn-block me-2">
                    <p class="my-auto">Already have an account? <a href="<?php echo URLROOT . '/users/login'; ?>" class="text-decoration-none">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>