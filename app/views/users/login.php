<!-- APPROOT and URLROOT defined in /app/config -->
<!-- The form submits to login, that instantiate login controller and model -->
<!-- Authenticate username, password and start session -->

<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column justify-content-center align-items-center row vh-100 mt-5">
    <div class="d-flex flex-column justify-content-center align-items-center rounded-3 shadow bg-dark text-light mt-5 p-3">
        <?php flash('register_success'); ?>
        <h2>Login</h2>
        <p clas="text-muted">Please fill your login-credentials.</p>
        <form action="<?php echo URLROOT . '/users/login'; ?>" method='post'>
            <fieldset class="mb-5">
                <legend>Email & Password</legend>
            <div class="form-group mb-2">
                <input type='email' name="email" class="form-control bg-transparent <?php echo (!empty($data['email_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['email']; ?>" placeholder="john@mail.com" required>
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control bg-transparent <?php echo (!empty($data['password_err']) ? 'is-invalid' : ''); ?>" name="password" value="<?php echo $data['password']; ?>" placeholder="******" required>
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            </fieldset>
            <div class="form-group">
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary" value="Login">
                </div>
                <div>
                    <p class="text-muted">Not registered, yet? <a href="<?php echo URLROOT . '/users/register'; ?>" class="text-decoration-none">Register now.</a></p>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
