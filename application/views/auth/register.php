<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
  #register-form .error {
    color: #dc2626;
    font-size: 12px;
    margin-top: 5px;
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

          <?= form_open_multipart('auth/register', ['id' => 'register-form', 'class' => 'register-form', 'method' => 'post']); ?>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username *</label>
                <input type="text" id="username" name="username" class="form-control">
                <span class="error"><?= form_error('username'); ?></span>
              </div>
              <div class="form-group">
                <label for="email">Email *</label>
                <input type="text" id="email" name="email" class="form-control">
                <span class="error"><?= form_error('email'); ?></span>
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
              <hr style="border-color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));">
              <div class="form-group">
                <label for="first_name">First name *</label>
                <input type="text" id="first_name" name="first_name" class="form-control">
                <span class="error"><?= form_error('first_name'); ?></span>
              </div>
              <div class="form-group">
                <label for="last_name">Last name *</label>
                <input type="text" id="last_name" name="last_name" class="form-control">
                <span class="error"><?= form_error('last_name'); ?></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="street">Street *</label>
                <input type="text" id="street" name="street" class="form-control">
                <span class="error"><?= form_error('street'); ?></span>
              </div>
              <div class="form-group">
                <label for="postal_code">Postal Code *</label>
                <input type="text" id="postal_code" name="postal_code" class="form-control">
                <span class="error"><?= form_error('postal_code'); ?></span>
              </div>
              <div class="form-group">
                <label for="city">City *</label>
                <input type="text" id="city" name="city" class="form-control">
                <span class="error"><?= form_error('city'); ?></span>
              </div>
              <div class="form-group">
                <label for="country">Country *</label>
                <select name="country" id="country" class="form-control">
                  <option value="de">Germany</option>
                  <option value="at">Austria</option>
                  <option value="ch">Switzerland</option>
                  <option value="be">Belgium</option>
                  <option value="nl">Netherlands</option>
                </select>
                <span class="error"><?= form_error('country'); ?></span>
              </div>
              <hr style="border-color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));">
              <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="text" id="phone" name="phone" class="form-control">
                <span class="error"><?= form_error('phone'); ?></span>
              </div>
              <div class="form-group">
                <label for="birthdate">Birthdate *</label>
                <input type="date" id="birthdate" name="birthdate" class="form-control">
                <span class="error"><?= form_error('birthdate'); ?></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <p>Select as *</p>
                <input type="radio" name="user_type" id="private_user" value="private" checked>
                <label for="private_user">Private User</label>
                <input type="radio" name="user_type" id="company_user" value="company" style="margin-left: 20px;">
                <label for="company_user">Company User</label>
              </div>
            </div>
          </div>

          <div class="action-group">
            <button type="submit" class="btn btn-primary">Submit</button>
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
    $('input[name="user_type"]').change(function () {
      if ($('#private_user').is(':checked')) {
        $('#company-doc-container').hide(); // Show the VAT field
        $('#id-container').show(); // Show the VAT field
      } else {
        $('#id-container').hide(); // Show the VAT field
        $('#company-doc-container').show(); // Show the VAT field
      }
    });
  });
</script>
