<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- ====================================
———	CATEGORY GRID FULL
===================================== -->
<section class="py-7 py-md-10">
	<div class="container">
		<!-- Search Result Bar -->
        <div class="search-result-bar">
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

		<div class="row">
            <?php if (!empty($vehicles)): ?>
                <?php foreach ($vehicles as $index => $vehicle): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card rounded-0 card-hover-overlay">
                            <div class="position-relative">
                                <img class="card-img rounded-0 lazyestload" data-src="<?= $vehicle['image'] ? base_url('uploads/vehicles/' . $vehicle['image']) : 'public/img/default-vehicle.jpg'; ?>" src="<?= $vehicle['image'] ? base_url('uploads/vehicles/' . $vehicle['image']) : 'public/img/default-vehicle.jpg'; ?>" alt="Card image cap">
                                <div class="card-img-overlay">
                                    <ul class="list-inline list-inline-rating">
                                        <li class="list-inline-item">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        </li>
                                        <li class="list-inline-item">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        </li>
                                        <li class="list-inline-item">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        </li>
                                        <li class="list-inline-item">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        </li>
                                        <li class="list-inline-item">
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="listing-reservation.html">
                                            <?= $vehicle['name'];?> <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        </a>
                                    </h3>
                                    <p class="text-white"><?= $vehicle['description']; ?></p>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent">
                                <ul class="list-unstyled d-flex mb-0 py-2">
                                    <li>
                                        <button class="btn-like px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite this listing">
                                        <i class="fas fa-euro-sign text-primary" aria-hidden="true"></i>
                                        <span><?= $vehicle['price']; ?></span>
                                        </button>
                                    </li>
                                    <li class="ms-auto">
                                        <a class="px-2" href="<?= base_url('vehicle/details/' . $vehicle['id']); ?>">View details</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ====================================
———	pagination
===================================== -->
<section class="my-5">
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
</section>
