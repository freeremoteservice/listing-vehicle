<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ? $title : "Page Title"; ?></title>

  <!-- PLUGINS CSS STYLE -->
  <link href='<?= base_url("assets/plugins/fontawesome-5.15.2/css/all.min.css"); ?>' rel='stylesheet'>
  <link href='<?= base_url("assets/plugins/fontawesome-5.15.2/css/fontawesome.min.css"); ?>' rel='stylesheet'>
  <link href='<?= base_url("assets/plugins/bootstrap/css/bootstrap.min.css"); ?>' rel='stylesheet'>
  <link href='<?= base_url("assets/plugins/listtyicons/style.css"); ?>' rel='stylesheet'>
  <link href='<?= base_url("assets/plugins/menuzord/css/menuzord.css"); ?>' rel='stylesheet'>

  <link href='<?= base_url("assets/plugins/selectric/selectric.css"); ?>' rel='stylesheet'>
  <link href='<?= base_url("assets/plugins/dzsparallaxer/dzsparallaxer.css"); ?>' rel='stylesheet'>
  
  <link href='<?= base_url("assets/plugins/owl-carousel/assets/owl.carousel.min.css"); ?>' rel='stylesheet'>
  <link href='<?= base_url("assets/plugins/owl-carousel/assets/owl.theme.default.min.css"); ?>' rel='stylesheet'>
  <link href='<?= base_url("assets/plugins/fancybox/jquery.fancybox.min.css"); ?>' rel='stylesheet'>
  <link href='<?= base_url("assets/plugins/revolution/css/settings.css"); ?>' rel='stylesheet'>
  <link href='<?= base_url("public/plugins/toastr/toastr.css"); ?>' rel="stylesheet">
  
  <!-- Page Level CSS -->
  <?php if (isset($page_level_css) && is_array($page_level_css)): ?>
    <?php foreach ($page_level_css as $css): ?>
        <link rel="stylesheet" href="<?= base_url($css); ?>">
    <?php endforeach; ?>
  <?php endif; ?>
  
  
  

  <!-- GOOGLE FONT --><!-- font-family: 'Mulish', sans-serif; --><!-- font-family: 'Poppins', sans-serif; -->
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;600;700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- CUSTOM CSS -->
  <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" id="option_style">
  <link rel="stylesheet" href="<?= base_url('public/css/custom.css'); ?>">

  <!-- <link rel="stylesheet" href="assets/css/default.css" id="option_color"> -->

  <!-- FAVICON -->
  <link href="<?= base_url('assets/img/favicon.png'); ?>" rel="shortcut icon">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body id="body" class="up-scroll">

    <!-- HEADER -->
    <header class="header">
      <nav class="nav-menuzord navbar-sticky">
        <div class="container clearfix">
          <div id="menuzord" class="menuzord menuzord-responsive <?= is_admin() ? 'admin_menu' : ''; ?>">

            <a href="<?= base_url(); ?>" class="menuzord-brand">
              <img class="logo" src="<?= base_url('public/img/logo.png'); ?>" alt="Logo">
            </a>

            <?php if ($this->session->userdata('logged_in')): ?>
            <div class="menu-right menu-left">
                <div class="avatar">
                  <a class="dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    data-bs-display="static" aria-expanded="false">
                    <img class="avatar-img lazyestload" data-src="<?= base_url('assets/img/user/user-2.jpg'); ?>" src="<?= base_url('assets/img/user/user-2.jpg'); ?>" alt="Image">
                    <span class="avatar-name"><?= $this->session->userdata('username'); ?>
                      <span class="small"><?= is_admin() ? 'Admin' : 'User'; ?></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="d-flex flex-wrap align-items-center" href="profile-user.html">
                        <i class="fa fa-user me-2" aria-hidden="true"></i>
                        <span>My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="d-flex flex-wrap align-items-center" href="<?= base_url('auth/logout'); ?>">
                        <i class="fas fa-gem me-2" aria-hidden="true"></i>
                        <span>Log out</span>
                      </a>
                    </li>
                  </ul>

                </div>
            </div>
            <?php else: ?>
                <div class="float-right btn-wrapper">
                    <a class="btn btn-outline-primary" href="/auth/login">+ <span>Anmelden</span></a>
                    <a class="btn btn-outline-primary" href="/auth/register">+ <span>Registrieren</span></a>
                </div>
            <?php endif; ?>

            <?php if (is_admin()): ?>
            <div class="float-right btn-wrapper">
              <a class="btn btn-outline-primary" href="<?= base_url('admin/add_vehicle'); ?>">+ <span>Add Vehicle</span></a>
            </div>
            <?php else: ?>
            <ul class="menuzord-menu menuzord-right">
              <li class="">
                <a href="<?= base_url(); ?>">Startseite</a>
              </li>
              <li class="">
                <a href="<?= base_url('vehicle'); ?>">Vehicle</a>
              </li>
              <li class="">
                <a href="<?= base_url('about_us'); ?>">Über uns</a>
              </li>
              <li class="">
                <a href="javascript:0">Pages</a>
                <ul class="dropdown">
                  <li><a href="<?= base_url('contact_us'); ?>">Contact Us</a></li>
                  <li><a href="<?= base_url('privacy'); ?>">Privacy policy</a></li>
                  <li><a href="<?= base_url('tos'); ?>">Terms and Conditions</a></li>
                  <li><a href="<?= base_url('online_tos'); ?>">Online Terms and Conditions</a></li>
                  <li><a href="<?= base_url('faq'); ?>">So funktioniert's</a></li>
                </ul>
              </li>
            </ul>
            <?php endif; ?>

          </div>
        </div>
      </nav>
    </header>
    <div class="main-wrapper">
