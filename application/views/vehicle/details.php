<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- ====================================
———	LISTING SINGLE HEADING
===================================== -->
<section class="py-7 pt-md-9 pb-md-8">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-8">
            <div class="img-fluid mb-4 mb-md-0">
              <!-- <a class="overlay-dark" href="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>">
                <img class="card-img lazyestload"
                     data-src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>"
                     src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>"
                     alt="Image" />
              </a> -->
              <div class="owl-carousel owl-theme listing-details-carousel nav-light-dark">
                  <?php if($vehicle->image): ?>
                    <?php foreach (explode(',', $vehicle->image) as $img): ?>
                      <div class="single-item">
                        <a class="overlay-dark" href="<?= base_url('uploads/vehicles/' . $img); ?>" data-fancybox="gallery" data-caption="Caption for single image">
                          <img class="lazyestload" data-src="<?= base_url('uploads/vehicles/' . $img); ?>" src="<?= base_url('uploads/vehicles/' . $img); ?>" alt="Image" />
                        </a>
                      </div>
                    <?php endforeach;?>
                  <?php else:?>
                    <div class="single-item">
                      <a class="overlay-dark" href="<?= base_url('public/img/default-vehicle.jpg'); ?>" data-fancybox="gallery" data-caption="Caption for single image">
                        <img class="lazyestload" data-src="<?= base_url('public/img/default-vehicle.jpg'); ?>" src="<?= base_url('public/img/default-vehicle.jpg'); ?>" alt="Image" />
                      </a>
                    </div>
                  <?php endif;?>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex justify-content-start">
            <div class="mb-2 mb-lg-0">
              <h1 class="single-listing-title"><?= $vehicle->name; ?></h1>
              <p class="text-muted mb-1">
                <i class="fas fa-map-marker-alt text-primary me-1"></i>
                Type: <?= $vehicle->type; ?>
              </p>
              <p class="text-muted mb-1">
                <i class="fas fa-euro-sign text-primary me-1"></i>
                <?= number_format($vehicle->price); ?>
              </p>
            </div>
          </div>
        </div>
        <div class="mt-5"></div>
        <div class="row">
          <div class="col-md-12">
            <div class="single-listing-content mb-6">
              <h3 class="fw-normal">Descritpion</h3>
              <hr>
              <p class="mb-6"><?= $vehicle->description; ?></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="single-listing-content mb-6">
              <h3 class="fw-normal">Machine Details</h3>
              <hr>
              <div class="row mb-2">
                <div class="col-md-3">manufacturer brand</div>
                <div class="col-md-9"><?= $vehicle->manufacturer_brand; ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-md-3">type</div>
                <div class="col-md-9"><?= $vehicle->manufacturer_type; ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-md-3">license plate</div>
                <div class="col-md-9"><?= $vehicle->license_plate; ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-md-3">vehicle identification number</div>
                <div class="col-md-9"><?= $vehicle->vehicle_id_number; ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-md-3">total weight</div>
                <div class="col-md-9"><?= number_format($vehicle->total_weight); ?> kg</div>
              </div>
              <div class="row mb-2">
                <div class="col-md-3">equipment</div>
                <div class="col-md-9"><?= $vehicle->equipment; ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-md-3">damages</div>
                <div class="col-md-9"><?= $vehicle->damages; ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <?php if ($this->session->flashdata('success')): ?>
          <p class="success" style="color: green;"><?= $this->session->flashdata('success') ?></p>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
          <p class="error"><?= $this->session->flashdata('error') ?></p>
        <?php endif; ?>

        <!-- Make Online Reservations -->
        <?= form_open_multipart('vehicle/' . $vehicle->id, ['id' => 'booking-form', 'class' => 'mb-5', 'method' => 'post']); ?>
          <?php if (!$this->session->userdata('logged_in')): ?>
            <h3 class="mb-3 fw-normal">
              <a href="<?= base_url('auth/login'); ?>">Login</a> to be able to book
            </h3>
          <?php endif; ?>

          <div class="form-group mb-6">
            The final total price is made up of the surcharge and VAT. See online terms and conditions.
          </div>

          <?php if ($this->session->userdata('logged_in')): ?>

            <div class="form-group mb-6">
              <button type="submit" class="btn btn-primary"> Book Now </button>
            </div>
          <?php else: ?>
            <button type="button" id="bookNowBtn" class="btn btn-primary"> Book Now </button>
          <?php endif; ?>
        <?= form_close() ?>
        <div class="card mt-4" style="background: #dde2e5;">
          <div class="card-body text-center">
            <div class="fw-bold mb-2" style="color: #294a7d; font-size: 1.2em;">
              Do you have any questions<br>about the product?<br>
              <span style="font-size: 1.1em;">Talk to us!</span>
            </div>
            <div class="mb-2" style="color: #294a7d;">
              <?= WEBSITE_PHONE?><br>
              <a href="<?= WEBSITE_EMAIL?>" style="color: #294a7d; text-decoration: underline;"><?= WEBSITE_EMAIL?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Members Log In Style Modal for Booking -->
<div class="modal fade" id="bookNowModal" tabindex="-1" aria-labelledby="bookNowModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background: #2196f3; color: #fff;">
        <h5 class="modal-title w-100 text-center map-sidebar" id="bookNowModalLabel">Members Log In</h5>
        <i class="fas fa-window-close main-wrapper" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;"></i>
      </div>
      <div class="modal-body">
        <?= form_open('auth/login'); ?>
          <input type="hidden" name="redirect" value="<?= current_url(); ?>">
          <div class="mb-3">
            <label for="modalEmail" class="form-label">Email*</label>
            <input type="email" name="email" class="form-control" id="modalEmail" required>
            <small class="form-text text-muted">Enter your Foundation username.</small>
          </div>
          <div class="mb-3">
            <label for="modalPassword" class="form-label">Password*</label>
            <input type="password" name="password" class="form-control" id="modalPassword" required>
            <small class="form-text text-muted">Enter the password that accompanies your username.</small>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <button type="submit" class="btn btn-outline-primary px-4">LOG IN</button>
            <a href="#" class="text-primary" style="font-size: 0.95em;">Forgot Password?</a>
          </div>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer justify-content-center">
        <span>Not a member yet? <a href="<?= base_url('auth/register'); ?>" class="text-primary">Sign up</a></span>
      </div>
    </div>
  </div>
</div>

<script src='<?= base_url("assets/plugins/jquery/jquery-3.4.1.min.js"); ?>'></script>

<script>
// Modal logic for Book Now
document.addEventListener('DOMContentLoaded', function () {
  var bookNowBtn = document.getElementById('bookNowBtn');
  if (bookNowBtn) {
    bookNowBtn.addEventListener('click', function () {
      var modal = new bootstrap.Modal(document.getElementById('bookNowModal'));
      modal.show();
    });
  }
  // You can handle modal form submission here if needed
});

  $(document).ready(function(){
    var $carousel = $('.listing-details-carousel');
    if ($carousel.hasClass('owl-loaded')) {
      $carousel.trigger('destroy.owl.carousel').removeClass('owl-loaded');
      $carousel.find('.owl-stage-outer').children().unwrap();
    }
    $carousel.owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      dots: true
    });
  });
</script>
