<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- ====================================
———	LISTING SINGLE HEADING
===================================== -->
<section class="py-7 pt-md-9 pb-md-8">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="mb-2 mb-lg-0">
          <h1 class="single-listing-title"><?= $vehicle->name; ?></h1>
          <p class="text-muted mb-1"> <i class="fas fa-map-marker-alt text-primary me-1"></i> Type: <?= $vehicle->type; ?> </p>
          <p class="text-muted mb-1"> <i class="fas fa-euro-sign text-primary me-1"></i> <?= $vehicle->price; ?></p>
          <div class="d-flex align-items-center">
            <ul class="list-inline list-inline-rating me-2">
              <li class="list-inline-item">
                <i class="fa fa-star" aria-hidden="true"></i>
              </li>
              <li class="list-inline-item">
                <i class="fa fa-star" aria-hidden="true"></i>
              </li>
              <li class="list-inline-item">
                <i class="fa fa-star" aria-hidden="true"></i>
              </li>
              <li class="list-inline-item">
                <i class="fa fa-star" aria-hidden="true"></i>
              </li>
              <li class="list-inline-item">
                <i class="fa fa-star" aria-hidden="true"></i>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-4 d-lg-flex justify-content-end align-items-end">
        <!-- <a href="#add-review" class="btn btn-primary">Book Now</a> -->
        <a href="<?= base_url('auth/login'); ?>" class="btn btn-primary">Book Now</a>
      </div>
    </div>

  </div>
</section>

<!-- ====================================
———	LISTING DETAILS CAROUSEL
===================================== -->
<section>
  <div class="owl-carousel owl-theme listing-details-carousel nav-light-dark">

    <div class="single-item">
      <a class="overlay-dark" href="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" data-fancybox="gallery" data-caption="Caption for single image">
        <img class="lazyestload" data-src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" alt="Image" />
      </a>
    </div>

    <div class="single-item">
      <a class="overlay-dark" href="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" data-fancybox="gallery" data-caption="Caption for single image">
        <img class="lazyestload" data-src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" alt="Image" />
      </a>
    </div>

    <div class="single-item">
      <a class="overlay-dark" href="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" data-fancybox="gallery" data-caption="Caption for single image">
        <img class="lazyestload" data-src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" alt="Image" />
      </a>
    </div>

    <div class="single-item">
      <a class="overlay-dark" href="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" data-fancybox="gallery" data-caption="Caption for single image">
        <img class="lazyestload" data-src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" alt="Image" />
      </a>
    </div>

    <div class="single-item">
      <a class="overlay-dark" href="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" data-fancybox="gallery" data-caption="Caption for single image">
        <img class="lazyestload" data-src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" alt="Image" />
      </a>
    </div>

    <div class="single-item">
      <a class="overlay-dark" href="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" data-fancybox="gallery" data-caption="Caption for single image">
        <img class="lazyestload" data-src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" alt="Image" />
      </a>
    </div>

    <div class="single-item">
      <a class="overlay-dark" href="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" data-fancybox="gallery" data-caption="Caption for single image">
        <img class="lazyestload" data-src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>" alt="Image" />
      </a>
    </div>

  </div>
</section>

<!-- ====================================
———	MAIN CONTENT
===================================== -->
<section class="pt-7 pb-4 pt-md-9 pb-md-8">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-lg-8">
        <!-- About -->
        <div class="single-listing-content mb-6">
          <h3 class="fw-normal mb-6">About This Restuarant</h3>
          <p class="mb-6"><?= $vehicle->description; ?></p>

          <!-- Departments at this Store -->
          <div class="mb-6">
            <h4 class="fw-normal mb-4">Services</h4>
            <p class="mb-1">Counter Service</p>
            <p class="mb-1">Table Service</p>
            <p class="mb-1">Buffet Service</p>
            <p class="mb-1">Self Service</p>
            <p class="mb-1">Gueridon Service</p>
          </div>

          <!-- Departments at this Store -->
          <div class="mb-6">
            <h4 class="fw-normal mb-4">Seating</h4>
            <p class="mb-1">55 Guests in our Main Dining Room</p>
            <p class="mb-1">16 Guests in our Garden Room</p>
          </div>

        </div>

        <hr>

        <!-- Features -->
        <div class="my-6">
          <h3 class="fw-normal mb-6">Features</h3>
          <ul class="list-unstyled mb-7">
            <li class="d-inline-block me-4 mb-2">
              <i class="fa fa-wifi me-2" aria-hidden="true"></i>High Speed Wifi
            </li>
            <li class="d-inline-block me-4 mb-2">
              <i class="fa fa-car me-2" aria-hidden="true"></i>Street Parking
            </li>
            <li class="d-inline-block me-4 mb-2">
              <i class="fas fa-glass-martini me-2" aria-hidden="true"></i>Alcohol
            </li>
            <li class="d-inline-block me-4 mb-2">
              <i class="fab fa-pagelines me-2" aria-hidden="true"></i>Vegetarian
            </li>
            <li class="d-inline-block me-4 mb-2">
              <i class="fa fa-cube me-2" aria-hidden="true"></i>Reservations
            </li>
            <li class="d-inline-block me-4 mb-2">
              <i class="far fa-check-circle me-2" aria-hidden="true"></i> Pets Friendly
            </li>
            <li class="d-inline-block me-4 mb-2">
              <i class="far fa-credit-card me-2" aria-hidden="true"></i>Accept Credit Card
            </li>
          </ul>
          <hr>
        </div>

      </div>

      <!--======= Sidebar =======-->
      <div class="col-md-5 col-lg-4 ps-xl-8">
        <!-- Make Online Reservations -->
        <form class="mb-5" action="#">
          <?php if (!$this->session->userdata('logged_in')): ?>
            <h3 class="mb-3 fw-normal"><a href="<?= base_url('auth/login'); ?>">Login</a> to be able to book</h3>
          <?php endif; ?>

          <div class="form-group mb-6">
            The final total price is made up of the surcharge and VAT. See online terms and conditions.
          </div>

          <div class="form-group mb-6">
            <?php if ($this->session->userdata('logged_in')): ?>
              <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
              <input type="hidden" name="vehicle_id" value="<?= $vehicle->id; ?>">
              <button type="submit" class="btn btn-primary"> Book Now </button>
            <?php else: ?>
              <a href="<?= base_url('auth/login'); ?>" class="btn btn-primary">Book Now</a>
            <?php endif; ?>
          </div>

        </form>

      </div>
    </div>
  </div>
</section>
