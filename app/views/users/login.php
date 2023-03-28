<!-- APPROOT and URLROOT defined in /app/config -->
<!-- The form submits to login, that instantiate login controller and model -->
<!-- Authenticate username, password and start session -->

<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row vh-100 justify-content-center align-items-center">
    <div class="col-md-6 card bg-secondary h-50 justify-content-center align-items-center rounded-3 shadow">
        <?php flash('register_success'); ?>
        <h2>Login</h2>
        <p>Please fill your credentials.</p>
        <form action="<?php echo URLROOT . '/users/login'; ?>" class="" method='post'>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type='email' name="email" class="form-control bg-transparent <?php echo (!empty($data['email_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" class="form-control bg-transparent <?php echo (!empty($data['password_err']) ? 'is-invalid' : ''); ?>" name="password" value="<?php echo $data['password']; ?>">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-group">
                <div class="col">
                    <input type="submit" class="form-control btn btn-primary mt-5" value="Login">
                </div>
                <div class="col">
                    <p class="mt-2">Not registered, yet? <a href="<?php echo URLROOT . '/users/register'; ?>">Register now.</a></p>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
