
</div> <!-- element wrapper ends -->

<footer class="footer-dark" style="background-image: url(<?= base_url('assets/img/background/bg-footer.jpg'); ?>)">

  <div class="container">
    <div class="row">
      <div class="col-sm-7 col-xs-12">
        <a class="d-inline-block mb-6" href="<?= base_url(); ?>">
          <img class="logo" src="<?= base_url('public/img/logo-white.png'); ?>" alt="Logo">
        </a>
        <p class="text-white pt-1 pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip
          ex
          ea commodo consequat. Duis aute irure dolor</p>
        <ul class="list-unstyled text-white">
          <li class="mb-3">
            <i class="fas fa-phone-alt me-3" aria-hidden="true"></i>
            <a class="text-white" href="tel:<?= WEBSITE_PHONE; ?>"><?= WEBSITE_PHONE; ?></a>
          </li>
          <li class="mb-3">
            <i class="fas fa-envelope me-3" aria-hidden="true"></i>
            <a class="text-white" href="mailto:<?= WEBSITE_EMAIL; ?>"><?= WEBSITE_EMAIL; ?></a>
          </li>
        </ul>
      </div>

      <div class="col-sm-3 col-xs-12">
        <div class="mb-4 mt-4 mt-md-0">
          <h2 class="h4 text-white">Links</h2>
        </div>
        <ul class="list-unstyled list-gray">
          <li class="mb-3">
            <a href="<?= base_url(); ?>">Startseite</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('auth/register'); ?>">Registrieren</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('auth/login'); ?>">Anmelden</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('vehicle'); ?>">Vehicle</a>
          </li>
        </ul>
      </div>

      <div class="col-sm-2 col-xs-12">
        <div class="mb-4 mt-4 mt-md-0">
          <h2 class="h4 text-white">Company</h2>
        </div>
        <ul class="list-unstyled list-gray">
          <li class="mb-3">
            <a href="<?= base_url('contact_us'); ?>">Contact Us</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('about_us'); ?>">Über uns</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('privacy'); ?>">Privacy Policy</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('tos'); ?>">Terms and Conditions</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('online_tos'); ?>">Online Terms and Conditions</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('faq'); ?>">So funktioniert's</a>
          </li>
        </ul>
      </div>

    </div>

    <hr>

    <div class="row">

      <div class="col-sm-7 col-xs-12 align-self-center order-3 order-md-0">
        <p class="copy-right mb-0 pb-4 pb-md-0 text-center text-md-start">
          Copyright &copy; <span id="copy-year"></span>. All Rights Reserved by
          <a href="http://www.iamabdus.com/" target="_blank"> Abdus</a>
        </p>
      </div>

      <div class="col-sm-5 col-xs-12 d-flex align-items-center">
        <div class="ms-md-auto mx-auto mx-md-0 mt-3 mb-5 my-md-0">
          <a class="icon-sm icon-default icon-border hover-bg-primary rounded-circle ms-0" href="#facebook">
            <i class="fab fa-facebook-f" aria-hidden="true"></i>
          </a>
          <a class="icon-sm icon-default icon-border hover-bg-primary rounded-circle ms-2" href="#twitter">
            <i class="fab fa-twitter" aria-hidden="true"></i>
          </a>
          <a class="icon-sm icon-default icon-border hover-bg-primary rounded-circle ms-2" href="#pinterest">
            <i class="fab fa-pinterest-p" aria-hidden="true"></i>
          </a>
          <a class="icon-sm icon-default icon-border hover-bg-primary rounded-circle ms-2" href="#linkedin">
            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>

  </div>

</footer>


  <!-- JAVASCRIPTS -->
  <script src='<?= base_url("assets/plugins/jquery/jquery-3.4.1.min.js"); ?>'></script>
  <script src='<?= base_url("assets/plugins/bootstrap/js/bootstrap.bundle.js"); ?>'></script>
  <script src='<?= base_url("assets/plugins/menuzord/js/menuzord.js"); ?>'></script>

  <script src='<?= base_url("assets/plugins/selectric/jquery.selectric.min.js"); ?>'></script>
  <script src='<?= base_url("assets/plugins/dzsparallaxer/dzsparallaxer.js"); ?>'></script>
  <script src='<?= base_url("assets/plugins/isotope/isotope.pkgd.min.js"); ?>'></script>
  <script src='<?= base_url("assets/plugins/imagesloaded/imagesloaded.pkgd.min.js"); ?>'></script>
  
  
  
  <script src='<?= base_url("assets/plugins/revolution/js/jquery.themepunch.tools.min.js"); ?>'></script>
  <script src='<?= base_url("assets/plugins/revolution/js/jquery.themepunch.revolution.min.js"); ?>'></script>
  <script src='<?= base_url("assets/plugins/smoothscroll/SmoothScroll.js"); ?>'></script>
  <script src='<?= base_url("assets/plugins/lazyestload/lazyestload.js"); ?>'></script>
  <script src='<?= base_url("assets/plugins/owl-carousel/owl.carousel.min.js"); ?>'></script>  
  <script src='<?= base_url("assets/plugins/fancybox/jquery.fancybox.min.js"); ?>'></script>  
  <script src='<?= base_url("public/plugins/toastr/toastr.min.js"); ?>'></script>
  
  <script>
    var d = new Date();
    var year = d.getFullYear();
    document.getElementById("copy-year").innerHTML = year;

    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
  
  <!-- Page Level JS -->
  <?php if (isset($page_level_js) && is_array($page_level_js)): ?>
    <?php foreach ($page_level_js as $js): ?>
      <script src="<?= base_url($js); ?>"></script>
    <?php endforeach; ?>
  <?php endif; ?>
  
  <script src='<?= base_url("assets/js/listty.js"); ?>'></script>
</body>
</html>

