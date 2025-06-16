<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="rev_slider_14_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="listty-automobile"
  data-source="gallery" style="margin:0px auto;background:#0a0000;padding:px;margin-top:0px;margin-bottom:0px;">
  <!-- START REVOLUTION SLIDER 5.4.8.1 fullwidth mode -->
  <div id="rev_slider_14_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8.1" dir="ltr">
    <ul>
      <!-- SLIDE  -->
      <li data-index="rs-46" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0"
        data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4=""
        data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
        <!-- MAIN IMAGE -->
        <img src="<?= base_url('public/img/banner.jpg'); ?>" alt="" data-lazyload="<?= base_url('public/img/banner.jpg'); ?>" data-bgposition="center center"
          data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
        <!-- LAYERS -->
      </li>
    </ul>
    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
  </div>
</div><!-- END REVOLUTION SLIDER -->

<!-- ====================================
———	ALL USED CARS
===================================== -->
<section class="py-7 pt-md-10 sec-pb-70">
  <div class="container">
    <div class="section-title">
      <h2> All Used Cars </h2>
      <p>This are some of most popular listing</p>
    </div>

    <!-- Grid-->
    <div class="row grid">
      <?php if($recent_items) :?>
        <?php foreach($recent_items as $item) :?>
          <div class="col-md-6 col-lg-4 col-xs-12 element-item recent-item">
            <div class="card">
              <a href="<?= base_url('vehicle/' . $item['id']); ?>" class="card-img">
                <?php if($item['image']): 
                  $img = explode(',', $item['image'])[0];
                  ?>
                  <img class="card-img-top lazyestload" data-src="<?= base_url('uploads/vehicles/' . $img); ?>" src="<?= base_url('uploads/vehicles/' . $img); ?>" alt="gallery-img">
                <?php else :?>
                  <img class="card-img-top lazyestload" data-src="<?= base_url('public/img/default-vehicle.jpg'); ?>" src="<?= base_url('public/img/default-vehicle.jpg'); ?>" alt="gallery-img">
                <?php endif;?>
              </a>
              <div class="card-body p-0">
                <div class="p-4">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <h3 class="card-title mb-0">
                      <a href="<?= base_url('vehicle/' . $item['id']); ?>">
                        <?= $item['name'];?>
                      </a>
                    </h3>
                  </div>

                  <div class="mb-6 meta-post">
                    <date class="text-capitalize meta-time"><?= $item['created_at']?>,</date>
                    <a class="text-uppercase" href="<?= base_url('vehicle/' . $item['id']); ?>"><?= $item['manufacturer_brand']?></a>
                  </div>
                  <div class="card-text">
                    <h4 class="text-primary">$<?= $item['price']?></h4>
                  </div>
                </div>

                <div class="card-footer py-3 px-4 bg-transparent">
                  <p class="mb-0">Brand New, Automatic, 80 km/h</p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;?>
      <?php endif;?>
    </div>
  </div>
</section>
