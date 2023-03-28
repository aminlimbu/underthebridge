<!-- form submits to register, register controller and model -->
<!-- validates inputs and checks duplicate username -->
<!-- pre-polulate fields on error -->
<!-- errors are displayed below inputfields -->
<!-- successful submission populated database with new user details -->

<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card card-body text-light bg-dark shadow rounded">
                <h2>User Registrateion</h2>
                <p>Please fill below to register</p>
                <form action="<?php echo URLROOT . '/users/register'; ?>" method="post">
                    <div class="form-group">
                        <label for="name">First Name: </label>
                        <input type="text" name="name" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name: </label>
                        <input type="text" name="lname" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" name="email" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" name="password" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password: </label>
                        <input type="password" name="confirm_password" class="bg-transparent text-light form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                    </div>
                    <div class="mt-3">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                        <p class="float-end mt-1">Already have an account? <a href="<?php echo URLROOT . '/users/login'; ?>">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
