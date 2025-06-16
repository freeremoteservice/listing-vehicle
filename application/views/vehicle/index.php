<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- ====================================
———	CATEGORY GRID FULL
===================================== -->
<section class="py-7">
	<div class="container">
		<!-- Search Result Bar -->
        <div class="search-result-bar mb-0">
			<div class="col-md-7">
				<p>We found <span> <?= count($vehicles); ?> </span> results.</p>
			</div>

			<div class="col-md-5">
				<div class="d-flex align-items-center justify-content-md-end">
					<form method="get" action="<?= base_url('vehicle'); ?>" class="select-bg-transparent select-border">
						<select name="type" class="select-location" onchange="this.form.submit()">
                            <option value="">All Types</option>
                            <?php foreach ($types as $type): ?>
                                <option value="<?= $type; ?>" <?= $selected_type == $type ? 'selected' : ''; ?>>
                                    <?= ucfirst($type); ?>
                                </option>
                            <?php endforeach; ?>
						</select>
                    </form>
				</div>
			</div>
        </div>

        <?php if (!empty($vehicles)): ?>
            <?php foreach ($vehicles as $index => $vehicle): ?>
                <div class="card card-list">
                    <div class="row">
                        <div class="col-md-4 col-xl-3">
                            <div class="card-list-img">
                                <?php if($vehicle['image']): 
                                    $img = explode(',', $vehicle['image'])[0];
                                ?>
                                    <img class="lazyestload" data-src="<?= base_url('uploads/vehicles/' . $img); ?>" src="<?= base_url('uploads/vehicles/' . $img); ?>" alt="gallery-img">
                                <?php else :?>
                                    <img class="lazyestload" data-src="<?= base_url('public/img/default-vehicle.jpg'); ?>" src="<?= base_url('public/img/default-vehicle.jpg'); ?>" alt="gallery-img">
                                <?php endif;?>
                                <span class="badge badge-primary">Verified</span>
                            </div>
                        </div>

                        <div class="col-md-8 col-xl-9">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h3 class="card-title mb-0">
                                        <a href="<?= base_url('vehicle/' . $vehicle['id']); ?>">
                                            <?= $vehicle['name'];?>
                                        </a>
                                    </h3>
                                </div>
                            </div>

                            <i class="fas fa-euro-sign text-primary" aria-hidden="true"></i>
                            <span><?= $vehicle['price']; ?></span>
                            <p class="mb-4"><?= $vehicle['description']; ?></p>
                            <div>
                                <a class="px-2" href="<?= base_url('vehicle/details/' . $vehicle['id']); ?>">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<!-- ====================================
———	pagination
===================================== -->
<!-- <section class="my-5">
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
            <li class="page-item me-2">
                <a class="page-link" href="javascript:void(0)">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                </a>
            </li>
            <li class="page-item active me-2"><a class="page-link" href="javascript:void(0)">1</a></li>
            <li class="page-item me-2"><a class="page-link" href="javascript:void(0)">2</a></li>
            <li class="page-item me-2"><a class="page-link" href="javascript:void(0)">3</a></li>
            <li class="page-item me-2"><a class="page-link" href="javascript:void(0)">4</a></li>
            <li class="page-item me-2"><a class="page-link" href="javascript:void(0)">5</a></li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
            </li>
            </ul>
        </nav>
    </div>
</section> -->
