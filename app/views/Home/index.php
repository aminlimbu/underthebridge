<?php require APPROOT . '/views/inc/header.php';?>

    <div class="banner">
       <div class="color-overlay">
        <div class="hero-title">
            <h1 class="display-5"><?php echo $data['title'];?></h1>
            <p class="lead col-10"><?php echo $data['description']?></p>
        </div>
        </div>
    </div>
    <div class="hbdawn">
            <div class="color-overlay60 seaquotes d-flex justify-content-center align-items-center">
                Tranquality
            </div>
    </div>
    <div class="video-wrapper">
        <video playsinline autoplay muted loop>
            <source src="<?php echo URLROOT . '/media/shb.mp4'?>">
        </video>
        <div class="color-overlay60 seaquotes text-light d-flex flex-column justify-content-center align-items-center">
            <div class="d-block m-2"><?php echo $data['quotes'] . '<br>';?><br></div>
            <div class="lead dim d-block">source: api-ninjas</div>
        </div>
    </div>
    <div class="hbfire">
            <div class="color-overlay60">
            New Year
            </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php';?>
