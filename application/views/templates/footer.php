
</div> <!-- element wrapper ends -->

<footer class="footer-dark" style="background-image: url(<?= base_url('assets/img/background/bg-footer.jpg'); ?>)">

  <div class="container">
    <div class="row">
      <div class="col-sm-7 col-xs-12">
        <a class="d-inline-block mb-6" href="index.html">
          <svg class="logo-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" width="140" height="44">
            <path class="fill-primay" d="M0 44V0h139.813v44H0zM137.346 2.467H2.467v39.065h134.879V2.467z" />
            <path class="fill-primay"
              d="M120.927 22.389v11.095h-4.566V22.389a371.288 371.288 0 0 0-2.086-2.888 347.047 347.047 0 0 1-2.2-3.053 386.86 386.86 0 0 0-2.201-3.053c-.7-.959-1.395-1.922-2.086-2.888h5.617l5.255 7.287 5.222-7.287h5.649c.002 0-8.604 11.882-8.604 11.882zM98.034 33.484h-4.565V15.069h-6.372v-4.562h17.244v4.562h-6.306v18.415zm-21.908 0H71.56V15.069h-6.372v-4.562h17.244v4.562h-6.306v18.415zm-17.425-1.789c-.69.623-1.511 1.116-2.463 1.477-.953.361-1.987.542-3.104.542-1.007 0-1.982-.143-2.923-.427a10.814 10.814 0 0 1-2.661-1.214h.033a9.928 9.928 0 0 1-1.577-1.215 18.73 18.73 0 0 1-.953-.952l3.416-3.151c.153.197.399.432.739.706.339.274.728.537 1.166.788.44.253.902.467 1.38.64.481.175.941.262 1.379.262.372 0 .744-.044 1.117-.131.359-.082.703-.22 1.018-.41.305-.185.564-.437.755-.739.197-.306.296-.689.296-1.149 0-.175-.06-.366-.181-.574-.12-.208-.329-.432-.624-.673-.296-.241-.706-.498-1.232-.771a20.567 20.567 0 0 0-1.971-.87 25.42 25.42 0 0 1-2.562-1.132 8.896 8.896 0 0 1-2.053-1.428 5.903 5.903 0 0 1-1.347-1.871c-.317-.7-.476-1.51-.476-2.429 0-.94.175-1.822.526-2.642a6.21 6.21 0 0 1 1.494-2.133c.646-.602 1.423-1.072 2.332-1.412.908-.339 1.911-.509 3.006-.509.591 0 1.22.077 1.889.23.668.153 1.319.35 1.954.591a12.95 12.95 0 0 1 1.79.837c.558.317 1.023.64 1.396.968l-2.825 3.545a15.71 15.71 0 0 0-1.281-.788 10.316 10.316 0 0 0-1.281-.558 4.311 4.311 0 0 0-1.478-.263c-.919 0-1.637.181-2.151.542-.515.361-.772.881-.772 1.559 0 .307.093.586.279.837.186.252.438.482.756.689.348.225.717.417 1.1.574.416.176.854.34 1.314.492 1.314.504 2.42 1.013 3.318 1.526.898.514 1.62 1.062 2.168 1.642s.936 1.204 1.166 1.871c.23.668.345 1.395.345 2.183 0 .963-.197 1.871-.591 2.724a6.803 6.803 0 0 1-1.626 2.216zM34.839 10.507h4.532v22.977h-4.532V10.507zm-20.036 0h4.566v18.415h9.263v4.563H14.803V10.507z" />
          </svg>
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
            <a href="<?= base_url(); ?>">Home</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('auth/register'); ?>">Create Account</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('auth/login'); ?>">Login</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('vehicle'); ?>">Vehicle</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('blog'); ?>">Blog</a>
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
            <a href="<?= base_url('terms_of_services'); ?>">Terms and Conditions</a>
          </li>
          <li class="mb-3">
            <a href="<?= base_url('how_it_works'); ?>">How It Works</a>
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
  
  
  
  
  <!-- Page Level JS -->
  <?php if (isset($page_level_js) && is_array($page_level_js)): ?>
    <?php foreach ($page_level_js as $js): ?>
      <script src="<?= base_url($js); ?>"></script>
    <?php endforeach; ?>
  <?php endif; ?>
  
  
  
  
  
  
  
  
  <script>
    var d = new Date();
    var year = d.getFullYear();
    document.getElementById("copy-year").innerHTML = year;
  </script>
  <script src='<?= base_url("assets/js/listty.js"); ?>'></script>
</body>
</html>

