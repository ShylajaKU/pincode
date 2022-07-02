
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php 
    $this->meta_model->meta_fm();
    $title = $this->meta_model->get_meta_title_fm($this->uri->uri_string());
    if($title !== ''){
        $title = $title;
    }else{$title = 'pincodes.ind.in';}
    echo '<meta name="title" content="'.$title.'">';
    ?>
    <title><?= $title.' - Find Pincodes' ?></title>

    <?php
    $description = $this->meta_model->get_meta_description_fm($this->uri->uri_string());
    if($description == ''){
      $description = 'Find any pincodes or post offices of Inaia';
    }
    echo '<meta name="description" content="'.$description. '">';
    ?>



    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
    <link rel="shortcut icon" href="<?= base_url('assets/favicon/favicon16.png')?>" type="image/png">
    




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<link rel="stylesheet" href="<?= base_url('assets\css\bootstrap5-1-3.min.css')?>">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4176141279201887"
     crossorigin="anonymous"></script>

</head>
<?php require'styles.php'; ?>

<body>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url()?>">pincodes.ind.in</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url()?>">Search by Pincode</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('search-by-place')?>">Search by Place</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('contact')?>">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('privacy-policy')?>">Privacy Policy</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
<br>

