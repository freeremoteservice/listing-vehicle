<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav class="navbar navbar-expand-md navbar-dark">
  <div class="container">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url(); ?>">
            <i class="fas fa-tachometer-alt" aria-hidden="true"></i> Dashboard <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/orders'); ?>">
            <i class="fa fa-users" aria-hidden="true"></i> List Orders </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/vehicles'); ?>">
            <i class="fa fa-list-ul" aria-hidden="true"></i> List Vehicles </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="<?= base_url('admin/users'); ?>">
            <i class="fas fa-user-circle" aria-hidden="true"></i> General Users </a>
        </li>
      </ul>

      <form class="d-none d-md-block">
        <div class="input-group input-group-sm">
          <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." required="">
          <button type="submit" class="input-group-text">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</nav>


<section style="margin: 200px 0;">
<h1>This is Dashboard Page...</h1>
</section>