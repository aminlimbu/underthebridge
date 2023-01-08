<?php require APPROOT . '/views/inc/header.php';?>
<div class="mt-5 mx-5">
<div class="row mt-5 mb-3">
    <div class="col-md-6">
        <h1>Blogs</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT;?>/blogs/add" class="btn btn-primary float-end me-2">
        <i class="fa fa-pencil"></i>Add Blogs
        </a>
    </div>
</div>
<?php foreach($data['blogs'] as $blog):?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $blog->title;?></h4>
            <div class="bg-light p-2 mb-3">
                written by <?php echo $blog->first_name . ' ' . $blog->last_name;?> on <?php echo $blog->blogCreated;?>
            </div>
            <p class="card-text"><?php echo $blog->body;?></p>
            <a href="<?php echo URLROOT . '/blogs/show';?>" class="btn btn-dark">More</a>
        </div>
        <?php endforeach;?>
        </div>
<?php require APPROOT . '/views/inc/footer.php';?>