<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function generateImageHtml($type, $username, $filename) {
  $src = base_url('uploads/users/' . $filename);
  $name_subfix = '';
  switch ($type) {
    case "id_front":
      $name_subfix = '_id_front.jpg';
      break;
    
    case "id_back":
      $name_subfix = '_id_back.jpg';
      break;

    case "photo":
      $name_subfix = '_photo.jpg';
  
    default:
      break;
  }

  return '
    <a class="media-img" href="' . $src . '" download="' . $username . $name_subfix . '">
      <img class="img-fluid rounded me-2 lazyestload" data-src="' . $src . '" src="' . $src . '">
    </a>
  ';
}

function generateFileHtml($username, $filename) {
  $src = base_url('uploads/users/' . $filename);
  return '
    <a class="media-img" href="' . $src . '" download="' . $username . '_company_document.pdf">
      ' . $filename . '
    </a>
  ';
}

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
          <a class="nav-link " href="<?= base_url('admin/orders'); ?>">
            <i class="fa fa-users" aria-hidden="true"></i> List Orders </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/vehicles'); ?>">
            <i class="fa fa-list-ul" aria-hidden="true"></i> List Vehicles </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('admin/users'); ?>">
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

<!-- ====================================
——— LISTINGS
===================================== -->
<section class="bg-light pb-8 pt-5 height100vh">
  <div class="container">
    <!-- Breadcrumb -->
    <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-5" aria-label="breadcrumb">
      <h2 class="fw-normal mb-4 mb-md-0 d-inline-block">
        All Users
        <span class="small text-muted ms-2 fs-6">
          <?= count($users); ?> Users Found
        </span>
      </h2>
      <ul class="list-unstyled d-flex p-0 m-0">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Startseite</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Users</li>
      </ul>
    </nav>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>


    <table id="table-list-users" class="display nowrap table-data-default" style="width:100%">
      <thead>
        <tr class="table-row-bg-white">
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>ID Front/Photo</th>
          <th>ID Back/Company Doc</th>
          <th>Registered At</th>
          <th data-priority="2"></th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($users)): ?>
          <?php foreach ($users as $user): ?>
            <?php
              if($user['role'] == 'private') {
                $_html_for_file1 = generateImageHtml('id_front', $user['username'], $user['id_front_img']);
                $_html_for_file2 = generateImageHtml('id_back', $user['username'], $user['id_back_img']);
              } else {
                $_html_for_file1 = generateImageHtml('photo', $user['username'], $user['photo_img']);
                $_html_for_file2 = generateFileHtml($user['username'], $user['company_doc_file']);
              }
              ?>
            <tr class="table-row-bg-white">
              <td><?= $user['username']; ?></td>
              <td><?= $user['email']; ?></td>
              <td><?= $user['role']; ?></td>
              <td class="td-media" align="center">
                <div class="media media-table" style="width: 60px;">
                  <?= $_html_for_file1; ?>
                </div>
              </td>
              <td class="td-media" align="center">
                <div class="media media-table" style="width: 60px;">
                <?= $_html_for_file2; ?>
                </div>
              </td>
              <td><?= $user['created_at']; ?></td>
              <td>
                <div class="dropdown">
                  <a class="dropdown-toggle icon-burger-mini" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" data-bs-display="static">
                  </a>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="<?= site_url('admin/remove_user/' . $user['id']); ?>" onclick="return confirm('Are you sure you want to remove this user?');">Remove</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7">No users available</td>
          </tr>
        <?php endif; ?>

      </tbody>
    </table>

  </div>
</section>