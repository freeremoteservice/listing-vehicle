<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- ====================================
———	LOGIN PAGE
===================================== -->
<section class="py-7 py-md-10 bg-light ">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card">
          <div class="bg-primary text-center py-4">
            <h2 class="text-white mb-0 h4">Members Log In</h2>
          </div>
          <div class="card-body px-7 pt-7 pb-0">
            <form id="login-form">
              <div class="form-group mb-7">
                <label class="form-label" for="email">Email*</label>
                <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>" required>
                <em>Enter your Foundation username.</em>
              </div>
              <div class="form-group mb-7">
                <label class="form-label" for="password">Password*</label>
                <input type="password" name="password" class="form-control">
                <em>Enter the password that accompanies your username.</em>
              </div>
              <div class="form-group d-flex justify-content-between align-items-center mb-7">
                <button type="submit" class="btn btn-outline-primary text-uppercase">
                  Anmelden
                </button>
                <a href="#FogotPassword">Fogot Password?</a>
              </div>
            </form>
          </div>
          <div class="card-footer bg-transparent text-center py-3">
            <p class="mb-0">Not a member yet? <a href="<?= base_url('auth/register'); ?>" class="link">Registrieren</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
