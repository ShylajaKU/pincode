<link rel="stylesheet" href="<?= base_url('assets\css\bootstrap5-1-3.min.css')?>">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url()?>">pincode.ind.in</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url()?>">Search by Pincode</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Search by Place</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
<br><br>
<style>
    .cont{
        width: 80vw;
    }
    @media (min-width: 750px) {
        .cont{
        width:50vw;
        }
    }
</style>
  <div class="container cont">
    <?= form_open("",array('class' => 'd-flex',))?>
      <input class="form-control me-2" type="search" name="pincode" placeholder="Pincode" aria-label="Pincode" required>
      <button class="btn btn-primary" type="submit">Search</button>
    <?= form_close()?>
    </div>


