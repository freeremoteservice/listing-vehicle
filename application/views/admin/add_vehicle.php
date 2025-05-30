<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- ====================================
———	Add Listing
===================================== -->
<section class="bg-light py-5 height100vh">
  <div class="container">
    <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-5" aria-label="breadcrumb">
	    <h2 class="fw-normal mb-4 mb-md-0">Add a New Vehicle</h2>
	    <ul class="list-unstyled d-flex p-0 m-0">
	      <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
	      <li class="breadcrumb-item active" aria-current="page">Add Vehicle</li>
	    </ul>
    </nav>

    <?php if ($this->session->flashdata('success')): ?>
        <p style="color: green;"><?= $this->session->flashdata('success'); ?></p>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <!-- About -->
    <div class="card">
        <div class="card-body px-6 pt-6 pb-1">
          <h3 class="h4 mb-4">About</h3>
          <p class="mb-5">We are not responsible for any damages caused by the use of this website, or by posting business listings here. Please use our site at your own discretion and exercise good judgement as well as common sense when advertising business here.</p>
            
            <?= form_open_multipart('admin/add_vehicle', ['class' => 'vehicle-form', 'method' => 'post']); ?>
                <div class="row">
                    <div class="form-group col-md-6 mb-6">
                        <label class="form-label" for="type">Type</label>
                        <div class="select-default bg-white">
                            <select id="type" name="type" class="select-location">
                                <option value="car">Car</option>
                                <option value="van">Van</option>
                                <option value="motorbike">Motorbike</option>
                                <option value="caravan">Caravan</option>
                                <option value="tractor">Tractor</option>
                            </select>
                        </div>
                        <?= form_error('type'); ?>
                    </div>

                    <div class="form-group col-md-6 mb-6">
                        <label class="form-label" for="price">Price:</label>
                        <input type="number" id="price" name="price" class="form-control" value="<?= set_value('price'); ?>">
                        <span style="color: red;"><?= form_error('price'); ?></span>
                    </div>

                    <div class="form-group col-md-12 mb-6">
                        <label class="form-label" for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= set_value('name'); ?>">
                        <span style="color: red;"><?= form_error('name'); ?></span>
                    </div>

                    <div class="form-group col-md-12 mb-6">
                        <label class="form-label" for="description">Discribe the vehicle</label>
                        <textarea id="description" name="description" class="form-control" rows="6"><?= set_value('description'); ?></textarea>
                    </div>

                    <div class="form-group position-relative col-md-12 mb-6 form-group-dragable">
                        <input type="file" id="image" name="image" class="custom-file-input">
                        <label class="custom-file-label mb-0" for="image">
                            Click or Drag image here
                        </label>
                        <div id="imagePreview" style="position: absolute; top: 0; left: 0; height: 100%;"></div>
                        <?php if ($this->session->flashdata('error')): ?>
                            <span style="color: red;"><?= $this->session->flashdata('error'); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <div class="mb-6">
                            <button type="submit" class="btn btn-lg btn-primary w-100">submit</button>
                        </div>
                    </div>
                </div>
            <?= form_close(); ?>

        </div>
    </div>


  </div>
</section>

<script>
    document.getElementById('image').addEventListener('change', function (event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = ''; // Clear previous previews

        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.height = 'calc(100% - 10px)'; // Adjust size
                    img.style.margin = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
