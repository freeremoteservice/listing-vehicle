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
          <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-tachometer-alt" aria-hidden="true"></i> Dashboard <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('admin/orders'); ?>">
            <i class="fa fa-users" aria-hidden="true"></i> List Orders </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/vehicles'); ?>">
            <i class="fa fa-list-ul" aria-hidden="true"></i> List Vehicles </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/users'); ?>">
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
      <h2 class="fw-normal mb-4 mb-md-0">All Orders</h2>
      <ul class="list-unstyled d-flex p-0 m-0">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Orders</li>
      </ul>
    </nav>

    <table id="my-listing" class="display nowrap table-data-default" style="width:100%">
      <thead>
        <tr class="table-row-bg-white">
          <th>User ID</th>
          <th>Vehicle ID</th>
          <th>Front of ID</th>
          <th>Back of ID</th>
          <th>Status</th>
          <th>Ordered At</th>
          <th data-priority="2"></th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($orders)): ?>
          <?php foreach ($orders as $order): ?>
            <tr class="table-row-bg-white">
              <td><?= $order['user_id']; ?></td>
              <td><?= $order['vehicle_id']; ?></td>
              <td class="td-media">
                <div class="media media-table">
                  <a class="media-img" href="listing-reservation.html">
                    <img class="img-fluid rounded me-2 lazyestload" data-src="<?= !empty($order['id_front_image']) ? base_url('uploads/ids/' . $order['id_front_image']) : base_url('public/img/default-id.jpg'); ?>" src="<?= !empty($order['id_front_image']) ? base_url('uploads/ids/' . $order['id_front_image']) : base_url('public/img/default-id.jpg'); ?>">
                  </a>
                </div>
              </td>
              <td class="td-media">
                <div class="media media-table">
                  <a class="media-img" href="listing-reservation.html">
                  <img class="img-fluid rounded me-2 lazyestload" data-src="<?= !empty($order['id_back_image']) ? base_url('uploads/ids/' . $order['id_back_image']) : base_url('public/img/default-id.jpg'); ?>" src="<?= !empty($order['id_back_image']) ? base_url('uploads/ids/' . $order['id_back_image']) : base_url('public/img/default-id.jpg'); ?>">
                  </a>
                </div>
              </td>
              <td>
                <span class="badge badge-warning px-2 py-1 text-white"><?= $order['status']; ?></span>
              </td>
              <td><?= $order['created_at']; ?></td>
              <td>
                <div class="dropdown">
                  <a class="dropdown-toggle icon-burger-mini" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" data-bs-display="static">
                  </a>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="javascript:void(0)">Approve</a>
                    <a class="dropdown-item" href="javascript:void(0)">Cancel</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6">No orders available</td>
          </tr>
        <?php endif; ?>

      </tbody>
    </table>

  </div>
</section>
