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
        <a href="#booking-form" class="btn btn-primary">Book Now</a>
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
        <?php if ($this->session->flashdata('success')): ?>
          <p class="success" style="color: green;"><?= $this->session->flashdata('success') ?></p>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
          <p class="error"><?= $this->session->flashdata('error') ?></p>
        <?php endif; ?>

        <!-- Make Online Reservations -->
        <?= form_open_multipart('vehicle/' . $vehicle->id, ['id' => 'booking-form', 'class' => 'mb-5', 'method' => 'post']); ?>
          <?php if (!$this->session->userdata('logged_in')): ?>
            <h3 class="mb-3 fw-normal"><a href="<?= base_url('auth/login'); ?>">Login</a> to be able to book</h3>
          <?php endif; ?>

          <div class="form-group mb-6">
            The final total price is made up of the surcharge and VAT. See online terms and conditions.
          </div>
          
          <?php if ($this->session->userdata('logged_in')): ?>
            <div class="form-group mb-6">
              <label for="id_front">Upload Front photo of your ID:</label>
              <div class="form-group position-relative mb-6 form-group-dragable">
                <input type="file" id="id_front" name="id_front" class="custom-file-input">
                <label class="custom-file-label mb-0" for="id_front">
                    Click or Drag images here
                </label>
                <div id="FrontOfIDPreview" style="position: absolute; top: 0; left: 0; height: 100%;"></div>
              </div>
              <span class="error" style="color: red;"><?= form_error('id_front'); ?></span>
            </div>

            <div class="form-group mb-6">
              <label for="id_back">Upload Back photo of your ID:</label>
              <div class="form-group position-relative mb-6 form-group-dragable">
                <input type="file" id="id_back" name="id_back" class="custom-file-input">
                <label class="custom-file-label mb-0" for="id_back">
                    Click or Drag images here
                </label>
                <div id="BackOfIDPreview" style="position: absolute; top: 0; left: 0; height: 100%;"></div>
              </div>
              <span class="error" style="color: red;"><?= form_error('id_back'); ?></span>
            </div>

            <div class="form-group mb-6">
              <button type="submit" class="btn btn-primary"> Book Now asdf </button>
            </div>
          <?php else: ?>
            <a href="<?= base_url('auth/login'); ?>" class="btn btn-primary">Book Now</a>
          <?php endif; ?>

        <?= form_close() ?>

      </div>
    </div>
  </div>
</section>

<script>
    document.getElementById('id_front').addEventListener('change', function (event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('FrontOfIDPreview');
        previewContainer.innerHTML = ''; // Clear previous previews

        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.height = 'calc(100% - 10px)'; // Adjust size
                    img.style.margin = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });

    document.getElementById('id_back').addEventListener('change', function (event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('BackOfIDPreview');
        previewContainer.innerHTML = ''; // Clear previous previews

        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.height = 'calc(100% - 10px)'; // Adjust size
                    img.style.margin = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>