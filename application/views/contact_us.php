
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- ====================================
———	BREADCRUMB
===================================== -->
<section class="py-8 bg-no-repeat bg-cover" style="background-image: url(assets/img/background/breadcrumb-bg.jpg); ">
  <div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center" >
      <nav aria-label="breadcrumb">
        <h2 class="breadcrumb-title text-center text-white mb-4">Contact Us</h2>
        <ul class="breadcrumb bg-transparent justify-content-center p-0 m-0">
          <li class="breadcrumb-item"><a class="text-white" href="<?= base_url(); ?>">Startseite</a></li>
          <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
        </ul>
      </nav>
    </div>
  </div>
</section>

<!-- Grid wrapper for ell elements -->
<div class="element-wrapper">


<!-- ====================================
———	contact-us
===================================== -->

<section class="py-7 py-md-10" >
  <div class="container">
    <div class="row">
      <!-- Get inTouch -->
      <div class="col-md-12 col-lg-12">
        <h2 class="fw-normal my-4 mt-md-0">Get inTouch</h2>
        <p class="mb-6">Please feel free to contact us if you have queries, require more information or have any other request.</p>
        <hr>

        <form class="pt-4">
          <div class="row">
            <!-- Subject -->
            <div class="form-group col-md-6 mb-6">
              <label class="form-label" for="inputState">Subject*</label>
              <div class="select-bg-transparent select-border w-100">
                <select class="select-location">
                  <option>-- Select Subject --</option>
                  <option>Subject 1</option>
                  <option>Subject 2</option>
                  <option>Subject 3</option>
                  <option>Subject 4</option>
                  <option>Subject 5</option>
                </select>
              </div>
            </div>

            <!-- Company Name -->
            <div class="form-group col-md-6 mb-6">
              <label class="form-label" for="inputtext">Company Name*</label>
              <input type="text" class="form-control" id="inputtext" required>
            </div>
          </div>

          <!-- Your Name -->
          <div class="form-group mb-6">
            <label class="form-label" for="inputName">Your Name*</label>
            <input type="text" class="form-control" id="inputName" required>
          </div>

          <!-- Email Address -->
          <div class="form-group mb-6">
            <label class="form-label" for="inputAddress">Email Address*</label>
            <input type="email" class="form-control" id="inputAddress" required>
          </div>

          <!-- Text -->
          <div class="form-group mb-6">
						<label for="textBox" class="form-label control-label">Text*</label>
						<textarea class="form-control" rows="6" required></textarea>
          </div>
          <!-- Button -->
          <button type="submit" class="btn btn-primary text-uppercase px-5 py-3">send now</button>
        </form>
      </div>
    </div>
  </div>
</section>


  </div> <!-- element wrapper ends -->