<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
  #register-form .error {
    color: #dc2626;
    font-size: 12px;
    margin-top: 5px;
  }
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

</style>

<!-- ====================================
———	SING UP
===================================== -->
<section class="py-7 py-md-10 bg-light height100vh">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-xl-10">
        <div class="bg-white p-5 rounded border">
          <h2 class="fw-normal mb-4">Account Registration</h2>
          <p>Please fill out the fields below to create your account. We will send your account information to the email address
            you enter. Your email address and information will NOT be sold or shared with any 3rd party. If you already have an
            account, please,
            <a href="<?= base_url('auth/login'); ?>">click here</a>.
          </p>

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
                <li data-step="3" title="Newsletter">
                  <i class="fas fa-file-alt"></i>
                </li>
                <li data-step="4" title="Success">
                  <i class="fas fa-check"></i>
                </li>
              </ul>
            </div>

            <?= form_open('auth/register', ['id' => 'register-form', 'class' => 'register-form']); ?>

              <div class="multi-step-form">
                <!-- Step 1: Bidder Company -->
                <div class="form-step active" id="step-1">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="company_name">Company Name *</label>
                        <input type="text" id="company_name" name="company_name" class="form-control">
                        <span class="error"><?= form_error('company_name'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="invoice_email">Invoice email (if different) <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="This e-mail address only needs to be filled in if invoices are to be sent to a central e-mail address and not to the e-mail address of the recpective user."></i></label>
                        <input type="text" id="invoice_email" name="invoice_email" class="form-control">
                        <span class="error"><?= form_error('invoice_email'); ?></span>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for="company_street">Street *</label>
                        <input type="text" id="company_street" name="company_street" class="form-control">
                        <span class="error"><?= form_error('company_street'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="company_address_suffix">Address Suffix</label>
                        <input type="text" id="company_address_suffix" name="company_address_suffix" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="company_postal_code">Postal Code *</label>
                        <input type="text" id="company_postal_code" name="company_postal_code" class="form-control">
                        <span class="error"><?= form_error('company_postal_code'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="company_city">City *</label>
                        <input type="text" id="company_city" name="company_city" class="form-control">
                        <span class="error"><?= form_error('company_city'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="company_country">Country *</label>
                        <select name="company_country" id="company_country" class="form-control">
                          <option value="de">Germany</option>
                          <option value="at">Austria</option>
                          <option value="ch">Switzerland</option>
                          <option value="be">Belgium</option>
                          <option value="nl">Netherlands</option>
                        </select>
                        <span class="error"><?= form_error('company_country'); ?></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="company_phone">Phone *</label>
                        <input type="text" id="company_phone" name="company_phone" class="form-control">
                        <span class="error"><?= form_error('company_phone'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="company_mobile">Moble *</label>
                        <input type="text" id="company_mobile" name="company_mobile" class="form-control">
                        <span class="error"><?= form_error('company_mobile'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="company_website">Website</label>
                        <input type="text" id="company_website" name="company_website" class="form-control">
                      </div>
                      <hr>
                      <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                        <label for="skip_vat_checkbox" style="cursor: pointer;">Skip barrel</label>
                        <input type="checkbox" id="skip_vat_checkbox" style="cursor: pointer; width: 16px; height: 16px; border-radius: 4px;">
                      </div>
                      <div id="vat-container" class="form-group">
                        <label for="vat">VAT</label>
                        <input type="text" id="vat" name="vat" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="action-group">
                    <button type="button" class="btn btn-primary next-step">Next</button>
                  </div>
                </div>

                <!-- Step 2: Bidder -->
                <div class="form-step" id="step-2">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="user_name">Username *</label>
                        <input type="text" id="user_name" name="user_name" class="form-control">
                        <span class="error"><?= form_error('user_name'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="user_email">Email *</label>
                        <input type="text" id="user_email" name="user_email" class="form-control">
                        <span class="error"><?= form_error('user_email'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <span class="error"><?= form_error('password'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="password_confirm">Password Confirmation *</label>
                        <input type="password" id="password_confirm" name="password_confirm" class="form-control">
                        <span class="error"><?= form_error('password_confirm'); ?></span>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for="user_salutation">Salutation *</label>
                        <select name="user_salutation" id="user_salutation" class="form-control">
                          <option value="mr">Mr.</option>
                          <option value="mrs">Mrs.</option>
                          <option value="ms">Ms.</option>
                          <option value="dr">Dr.</option>
                          <option value="prof">Prof.</option>
                        </select>
                        <span class="error"><?= form_error('user_salutation'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="user_title">Title</label>
                        <input type="text" id="user_title" name="user_title" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="user_first_name">First name *</label>
                        <input type="text" id="user_first_name" name="user_first_name" class="form-control">
                        <span class="error"><?= form_error('user_first_name'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="user_last_name">Last name *</label>
                        <input type="text" id="user_last_name" name="user_last_name" class="form-control">
                        <span class="error"><?= form_error('user_last_name'); ?></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="user_street">Street *</label>
                        <input type="text" id="user_street" name="user_street" class="form-control">
                        <span class="error"><?= form_error('user_street'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="user_postal_code">Postal Code *</label>
                        <input type="text" id="user_postal_code" name="user_postal_code" class="form-control">
                        <span class="error"><?= form_error('user_postal_code'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="user_city">City *</label>
                        <input type="text" id="user_city" name="user_city" class="form-control">
                        <span class="error"><?= form_error('user_city'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="user_country">Country *</label>
                        <select name="user_country" id="user_country" class="form-control">
                          <option value="de">Germany</option>
                          <option value="at">Austria</option>
                          <option value="ch">Switzerland</option>
                          <option value="be">Belgium</option>
                          <option value="nl">Netherlands</option>
                        </select>
                        <span class="error"><?= form_error('user_country'); ?></span>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for="user_mobile">Mobile *</label>
                        <input type="text" id="user_mobile" name="user_mobile" class="form-control">
                        <span class="error"><?= form_error('user_mobile'); ?></span>
                      </div>
                      <div class="form-group">
                        <label for="user_birthdate">Birthdate *</label>
                        <input type="date" id="user_birthdate" name="user_birthdate" class="form-control">
                        <span class="error"><?= form_error('user_birthdate'); ?></span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="action-group">
                    <button type="button" class="btn btn-secondary prev-step">Back</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                  </div>
                </div>

                <!-- Step 3: Newsletter -->
                <div class="form-step" id="step-3">
                  <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                    <label for="newsletter_checkbox" style="cursor: pointer;">Yes, please send me the newsletter.</label>
                    <input type="checkbox" id="newsletter_checkbox" name="newsletter_checkbox" style="cursor: pointer; width: 16px; height: 16px; border-radius: 4px;">
                  </div>
                  <div class="action-group">
                    <button type="button" class="btn btn-secondary prev-step">Back</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
                </div>

                <!-- Step 4: Success -->
                <div class="form-step" id="step-4">
                  <h3>Success!</h3>
                  <p>Thank you for registering.</p>
                </div>
              </div>

            <?= form_close(); ?>

        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $(".next-step").click(function () {
      let currentStep = $(".form-step.active");
      let nextStep = currentStep.next(".form-step");

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
    });

    $('#skip_vat_checkbox').change(function () {
      if ($(this).is(':checked')) {
        $('#vat-container').hide(); // Show the VAT field
      } else {
        $('#vat-container').show(); // Hide the VAT field
      }
    });
  });

</script>
