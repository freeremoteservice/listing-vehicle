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
              <a class="overlay-dark" href="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>">
                <img class="card-img lazyestload"
                     data-src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>"
                     src="<?= $vehicle->image ? base_url('uploads/vehicles/' . $vehicle->image) : base_url('public/img/default-vehicle.jpg'); ?>"
                     alt="Image" />
              </a>
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