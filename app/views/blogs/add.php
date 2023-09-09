<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- Check if the user is logged in, else redirect -->
<?php if (isLoggedIn()) : ?>
    <div class="container mt-5">
        <a href="<?php echo URLROOT . '/blogs'; ?>" class="btn btn-lignt mt-5"><i class="fa fa-backward"></i></a>
        <div class="card card-body bg-lignt mt-2">
            <h2>Add Blog</h2>
            <p>Created your blog below Title and Body are required fields.</p>
            <form action="<?php echo URLROOT . '/blogs/add'; ?>" method="post">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <!-- updated title error if the field is empty, and pre-populate field -->
                    <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title'] ?>">
                    <!-- placing erro message blelow the input -->
                    <span class="invalid-feedback"><?php echo $data['title_err'] ?></span>
                </div>
                <div class="form-group mb-3">
                    <label for="body">Body:</label>
                    <!-- validate field and pre-populate data -->
                    <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                    <!-- error placement -->
                    <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                </div>
                <input type="submit" class="btn btn-success" value="Post">
            </form>
        </div>
    </div>
    <!-- Redirect to login page if not logged in -->
<?php else : redirect('users/login');
endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>