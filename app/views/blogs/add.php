<?php require APPROOT . '/veiws/inc/header.php';?>
<a href="<?php echo URLROOT . '/posts';?>" class="btn btn-lignt"><i class="fa fa-backward"></i></a>
<div class="card card-body bg-lignt mt-5">
    <h2>Add Blog</h2>
    <p>Created your blog below Title and Body are required fields.</p>
    <form action="<?php echo URLROOT . '/posts/add';?>">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['title']?>">
        <span class="invalid-feedback"><?php echo $data['title_err']?></span>
    </div>
    <div class="form-group mb-3">
        <label for="body">Body:</label>
        <textarea name="body" class="form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : '';?>"><?php echo $data['body'];?></textarea>
    </div>
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>