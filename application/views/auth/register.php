<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- ====================================
———	SING UP
===================================== -->
<section class="py-7 py-md-10 bg-light height100vh">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9 col-xl-7">
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
        <?= form_open('auth/register', ['class' => 'pb-7']); ?>
            <h3 class="h4 fw-normal mb-4">User Information</h3>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="form-label" for="username">Username</label>
                <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
                <?= form_error('username'); ?>
              </div>
              <div class="form-group col-md-6">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>">
                <?= form_error('email'); ?>
                </div>
            </div>
            <div class="form-group">
              <label class="form-label" for="password">Password</label>
              <input type="password" name="password" class="form-control">
              <?= form_error('password'); ?>
            </div>
            <div class="form-group mb-8">
              <label class="form-label" for="password_confirm">Confirm Password</label>
              <input type="password" name="password_confirm" class="form-control">
            </div>

            <div class="form-group mb-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  I agree to the <a href="terms-of-services.html">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>. Your
                  business listing is fully backed by our 100% money back guarantee.
                </label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary"> Create Account </button>

            <?= form_close(); ?>

        </div>
      </div>
    </div>
  </div>
</section>
