<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
  .form-step {
    display: none;
  }
  .form-step.active {
    display: block;
  }

  .progress-bar-container {
    display: flex;
    justify-content: center;
    margin: 20px 0;
  }

  .progress-bar {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    position: relative;
  }

  .progress-bar li {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    flex: 1;
    text-align: center;
  }

  .progress-bar li:not(:first-child)::after {
    content: '';
    width: 100%;
    height: 2px;
    background-color: #dcdcdc;
    position: absolute;
    top: 50%;
    right: -50%; /* Adjusts alignment for spacing */
    transform: translateX(-100%);
    z-index: 0; 
  }

  .progress-bar li.active::after {
    background-color: #007bff; /* Active blue color for lines */
  }

  .progress-bar li i {
    width: 40px;
    height: 40px;
    border: 2px solid #dcdcdc;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #fff;
    font-size: 20px;
    color: #dcdcdc;
    transition: all 0.3s ease;
    z-index: 1;
  }

  .progress-bar li.active i {
    border-color: #007bff;
    color: #007bff;
  }

  .progress-bar li span {
    margin-top: 8px;
    font-size: 14px;
    color: #555;
  }

  .progress-bar li.active span {
    color: #007bff;
  }

  .form-step hr {
    height: 2px;
    color: #007bff;
  }
  .action-group {
    display: flex;
    justify-content: flex-end;
    column-gap: 10px;
    align-items: center;
  }

  /* Mobile Responsive Styles */
  @media (max-width: 768px) {
    .modal-dialog {
      margin: 10px;
      max-width: calc(100% - 20px);
    }
    
    .modal-body {
      padding: 15px;
    }
    
    .progress-bar li i {
      width: 30px;
      height: 30px;
      font-size: 16px;
    }
    
    .progress-bar li span {
      font-size: 12px;
      margin-top: 5px;
    }
    
    .action-group {
      flex-direction: column;
      gap: 10px;
    }
    
    .action-group .btn {
      width: 100%;
    }
    
    .form-group {
      margin-bottom: 15px;
    }
    
    .form-group label {
      font-size: 14px;
      margin-bottom: 5px;
    }
    
    .form-control {
      font-size: 14px;
      padding: 8px 12px;
    }
    
    .custom-file-label {
      font-size: 14px;
      padding: 8px 12px;
    }
    
    .error {
      font-size: 12px;
    }
    
    /* Stack columns on mobile */
    .row .col-md-6 {
      margin-bottom: 15px;
    }
    
    /* Adjust file upload preview */
    #id_front_img_preview,
    #id_back_img_preview,
    #user_photo_preview,
    #company_document_preview {
      position: relative !important;
      height: auto !important;
      margin-top: 10px;
    }
    
    #id_front_img_preview img,
    #id_back_img_preview img,
    #user_photo_preview img,
    #company_document_preview img {
      max-width: 100%;
      height: auto;
      margin: 5px 0;
    }
  }

  @media (max-width: 576px) {
    .modal-dialog {
      margin: 5px;
      max-width: calc(100% - 10px);
    }
    
    .modal-body {
      padding: 10px;
    }
    
    .progress-bar li i {
      width: 25px;
      height: 25px;
      font-size: 14px;
    }
    
    .progress-bar li span {
      font-size: 11px;
    }
    
    .modal-title {
      font-size: 18px;
    }
  }
</style>
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookNowModal"> Book Now </button>
          <?php else: ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal"> Book Now </button>
          <?php endif; ?>
        <?= form_close() ?>

        <div class="card mt-4" style="background: #f3f8fb;">
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

<!-- Open Login Modal by clicking "Book Now" button if uer wasn't logged in yet -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background: #2196f3; color: #fff;">
        <h5 class="modal-title w-100 text-center map-sidebar" id="loginModalLabel">Log In To Book</h5>
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

<div class="modal fade" id="bookNowModal" tabindex="-1" aria-labelledby="bookNowModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background: #2196f3; color: #fff;">
        <h5 class="modal-title w-100 text-center map-sidebar" id="bookNowModalLabel">Book Now</h5>
        <i class="fas fa-window-close main-wrapper" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;"></i>
      </div>
      <div class="modal-body">
        <?php if ($this->session->flashdata('error')): ?>
            <p style="color: red;"><?= $this->session->flashdata('error'); ?></p>
        <?php endif; ?>
        <div class="progress-bar-container">
          <ul class="progress-bar">
            <li class="active" data-step="1" title="Bidder Company">
              <i class="fas fa-building"></i>
            </li>
            <li data-step="2" title="Bidder">
              <i class="fas fa-user"></i>
            </li>
          </ul>
        </div>
        <?= form_open_multipart('vehicle/order_vehicle', ['id' => 'register-form', 'class' => 'register-form', 'method' => 'post']); ?>
          <div class="multi-step-form">
            <!-- Step 1: Bidder Company -->
            <div class="form-step active" id="step-1">
              <input type="hidden" name="vehicle_id" value="<?= $vehicle->id;?>">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="delivery_address">Delivery Address *</label>
                    <input type="text" id="delivery_address" name="delivery_address" class="form-control" required>
                    <span class="error" id="delivery_address_error" style="display: none; color: red;">Please enter a delivery address.</span>
                    <span class="error"><?= form_error('delivery_address'); ?></span>
                  </div>
                </div>
              </div>
              <div class="action-group">
                <button type="button" class="btn btn-primary next-step">Next</button>
              </div>
            </div>
            <!-- Step 2: Bidder -->
            <div class="form-step" id="step-2">
              <div class="row" id="id-container" style="display: <?= ($this->session->userdata('role') == 'company' || $this->session->userdata('role') == 'admin') ? 'none' : '';?>">
                <div class="col-md-6">
                  <label for="id_front_img">ID Front Image *</label>
                  <div class="form-group position-relative mb-6 form-group-dragable">
                    <input type="file" id="id_front_img" name="id_front_img" class="custom-file-input">
                    <label class="custom-file-label mb-0" for="id_front_img">
                      Click or Drag image here
                    </label>
                    <div id="id_front_img_preview" style="position: absolute; top: 0; left: 0; height: 100%;"></div>
                    <span class="error" id="id_front_img_error" style="display: none; color: red;">Please upload ID front image.</span>
                    <span class="error"><?= form_error('id_front_img'); ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="id_back_img">ID Back Image *</label>
                  <div class="form-group position-relative mb-6 form-group-dragable">
                    <input type="file" id="id_back_img" name="id_back_img" class="custom-file-input">
                    <label class="custom-file-label mb-0" for="id_back_img">
                      Click or Drag image here
                    </label>
                    <div id="id_back_img_preview" style="position: absolute; top: 0; left: 0; height: 100%;"></div>
                    <span class="error" id="id_back_img_error" style="display: none; color: red;">Please upload ID back image.</span>
                    <span class="error"><?= form_error('id_back_img'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row" id="company-doc-container" style="display: <?= ($this->session->userdata('role') == 'private' || $this->session->userdata('role') == 'admin') ? 'none' : '';?>;">
                <div class="col-md-12">
                  <label for="user_photo">Your Photo *</label>
                  <div class="form-group position-relative mb-6 form-group-dragable">
                    <input type="file" id="user_photo" name="user_photo" class="custom-file-input">
                    <label class="custom-file-label mb-0" for="user_photo">
                      Click or Drag image here
                    </label>
                    <div id="user_photo_preview" style="position: absolute; top: 0; left: 0; height: 100%;"></div>
                    <span class="error" id="user_photo_error" style="display: none; color: red;">Please upload your photo.</span>
                    <span class="error"><?= form_error('user_photo'); ?></span>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="company_document">Company Document *</label>
                  <div class="form-group position-relative mb-6 form-group-dragable">
                    <input type="file" id="company_document" name="company_document" class="custom-file-input">
                    <label class="custom-file-label mb-0" for="company_document">
                      Click or Drag file here
                    </label>
                    <div id="company_document_preview" style="position: absolute; top: 0; left: 0; height: 100%;"></div>
                    <span class="error" id="company_document_error" style="display: none; color: red;">Please upload company document.</span>
                    <span class="error"><?= form_error('company_document'); ?></span>
                  </div>
                </div>
              </div>
              <div class="action-group">
                <button type="button" class="btn btn-secondary prev-step">Back</button>
                <button type="button" class="btn btn-primary next-step">Finish</button>
              </div>
            </div>
          </div>
        <?= form_close();?>
      </div>
    </div>
  </div>
</div>

<script src='<?= base_url("assets/plugins/jquery/jquery-3.4.1.min.js"); ?>'></script>

<script>
document.getElementById('id_back_img').addEventListener('change', function (event) {
  const files = event.target.files;
  const previewContainer = document.getElementById('id_back_img_preview');
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

document.getElementById('id_front_img').addEventListener('change', function (event) {
  const files = event.target.files;
  const previewContainer = document.getElementById('id_front_img_preview');
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

document.getElementById('user_photo').addEventListener('change', function (event) {
  const files = event.target.files;
  const previewContainer = document.getElementById('user_photo_preview');
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

document.getElementById('company_document').addEventListener('change', function (event) {
  const files = event.target.files;
  const previewContainer = document.getElementById('company_document_preview');
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

    $(".next-step").click(function () {
      let currentStep = $(".form-step.active");
      let nextStep = currentStep.next(".form-step");
      
      // Validate delivery address if we're on step 1
      if (currentStep.attr('id') === 'step-1') {
        let deliveryAddress = $('#delivery_address').val().trim();
        if (!deliveryAddress) {
          $('#delivery_address_error').show();
          $('#delivery_address').focus();
          return;
        } else {
          $('#delivery_address_error').hide();
        }
      }
      
      // Validate step 2 (Finish button) - image uploads based on user role
      if (currentStep.attr('id') === 'step-2') {
        let isValid = true;
        
        // Check if user is private (show ID fields) or company (show company fields)
        let isPrivateUser = $('#id-container').is(':visible');
        let isCompanyUser = $('#company-doc-container').is(':visible');
        
        if (isPrivateUser) {
          // Validate ID fields for private users
          let idFrontImg = $('#id_front_img')[0].files.length;
          let idBackImg = $('#id_back_img')[0].files.length;
          
          if (!idFrontImg) {
            $('#id_front_img_error').show();
            isValid = false;
          } else {
            $('#id_front_img_error').hide();
          }
          
          if (!idBackImg) {
            $('#id_back_img_error').show();
            isValid = false;
          } else {
            $('#id_back_img_error').hide();
          }
        }
        
        if (isCompanyUser) {
          // Validate company fields for company users
          let userPhoto = $('#user_photo')[0].files.length;
          let companyDoc = $('#company_document')[0].files.length;
          
          if (!userPhoto) {
            $('#user_photo_error').show();
            isValid = false;
          } else {
            $('#user_photo_error').hide();
          }
          
          if (!companyDoc) {
            $('#company_document_error').show();
            isValid = false;
          } else {
            $('#company_document_error').hide();
          }
        }
        
        if (!isValid) {
          return; // Don't submit if validation fails
        }
        
        // If validation passes, submit the form
        $('#register-form').submit();
        return;
      }
      
      currentStep.removeClass("active");
      nextStep.addClass("active");

      // Update progress bar
      let stepIndex = $(".form-step").index(nextStep) + 1;
      $(".progress-bar li").removeClass("active");
      $(".progress-bar li").slice(0, stepIndex).addClass("active");
    });

    $(".prev-step").click(function () {
      let currentStep = $(".form-step.active");
      let prevStep = currentStep.prev(".form-step");
      currentStep.removeClass("active");
      prevStep.addClass("active");
      // Update progress bar
      let stepIndex = $(".form-step").index(prevStep) + 1;
      $(".progress-bar li").removeClass("active");
      $(".progress-bar li").slice(0, stepIndex).addClass("active");
    })
  });
</script>
