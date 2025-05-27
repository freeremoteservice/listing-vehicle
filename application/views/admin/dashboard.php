<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav class="navbar navbar-expand-md navbar-dark">
  <div class="container">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link " href="dashboard-stie-admin.html">
            <i class="fas fa-tachometer-alt" aria-hidden="true"></i> Dashboard <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="admin-listings.html">
            <i class="fa fa-list-ul" aria-hidden="true"></i> Listings </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="user-list-owners.html">
            <i class="fa fa-users" aria-hidden="true"></i> List Owners </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="user-generals.html">
            <i class="fas fa-user-circle" aria-hidden="true"></i> General Users </a>
        </li>

      </ul>

      <form class="d-none d-md-block">
        <div class="input-group input-group-sm">
          <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." required="">
          <button type="submit" class="input-group-text">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</nav>



<!-- ====================================
——— LISTINGS
===================================== -->
<section class="bg-light pb-8 pt-5 height100vh">
  <div class="container">
    <!-- Breadcrumb -->
    <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-5" aria-label="breadcrumb">
      <h2 class="fw-normal mb-4 mb-md-0">All Listings</h2>
      <ul class="list-unstyled d-flex p-0 m-0">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="dashboard-stie-admin.html">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Listings</li>
      </ul>
    </nav>

    <table id="admin-listing" class="display nowrap table-data-default" style="width:100%">
      <thead>
        <tr class="table-row-bg-white">
          <th>Listing</th>
          <th>List Ower</th>
          <th>Featured</th>
          <th>Views</th>
          <th>Reviews</th>
          <th>Posted on</th>
          <th>Status</th>
          <th data-priority="2"></th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-row-bg-white">
          <td class="td-media">
            <div class="media media-table">
              <a class="media-img" href="listing-reservation.html">
                <img class="img-fluid rounded me-2 lazyestload" data-src="assets/img/listing/listing-4.jpg" src="assets/img/listing/listing-4.jpg" alt="listing.jpg">
              </a>
              <div class="media-body">
                <h3 class="media-title">
                  <a href="listing-reservation.html">Think Coffee
                    <i class="fa fa-check-circle" aria-hidden="true"></i></a>
                </h3>
                <p class="mb-1">215 Terry Lane, New York </p>
                <span class="text-primary text-capitalize d-inline-block mb-1">eat & drink</span>
                <p class="text-dark">From $50.00 /Night
                  <span class="text-muted ms-2">
                    <i class="far fa-heart text-primary me-1" aria-hidden="true"></i>10k
                  </span>
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="media media-xs align-items-center">
              <img class="rounded-circle me-3 lazyestload" data-src="assets/img/user/user-xs-2.jpg" src="assets/img/user/user-xs-2.jpg" alt="Image">
              <div class="media-body">
                <a class="text-muted font-weight-bold text-hover-primary" href="user-profile.html">Abby</a>
              </div>
            </div>
          </td>
          <td>
            <i class="fa fa-check text-primary" aria-hidden="true"></i>
          </td>
          <td>784</td>
          <td>
            <ul class="list-inline list-inline-rating">
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="far fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item text-muted">(7)</li>
            </ul>
          </td>
          <td>
            <span class="d-block">01 Aug 19</span>
            <span class="d-block">07.00 PM</span>
          </td>
          <td>
            <span class="badge badge-warning px-2 py-1 text-white">Pending</span>
          </td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-bs-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="javascript:void(0)">Approve</a>
                <a class="dropdown-item" href="javascript:void(0)">Cancel</a>
              </div>
            </div>
          </td>
        </tr>

        <tr class="table-row-bg-white">
          <td class="td-media">
            <div class="media media-table">
              <a class="media-img" href="listing-reservation.html">
                <img class="img-fluid rounded me-2 lazyestload" data-src="./assets/img/listing/listing-5.jpg" src="./assets/img/listing/listing-5.jpg" alt="listing.jpg">
              </a>
              <div class="media-body">
                <h3 class="media-title">
                  <a href="listing-reservation.html"> Burger House <i class="fa fa-check-circle" aria-hidden="true"></i> </a>
                </h3>
                <p class="mb-1">2726 Shinn Street, New York </p>
                <span class="text-primary text-capitalize d-inline-block mb-1">eat & drink</span>
                <p class="text-dark">From $50.00 /Night
                  <span class="text-muted ms-2">
                    <i class="far fa-heart text-primary me-1" aria-hidden="true"></i>9.2k
                  </span>
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="media media-xs align-items-center">
              <img class="rounded-circle me-3 lazyestload" data-src="assets/img/user/user-xs-5.jpg" src="assets/img/user/user-xs-5.jpg" alt="Image">
              <div class="media-body">
                <a class="text-muted font-weight-bold text-hover-primary" href="user-profile.html">Daniel</a>
              </div>
            </div>
          </td>
          <td>
            <i class="fa fa-check text-primary" aria-hidden="true"></i>
          </td>
          <td>452</td>
          <td>
            <ul class="list-inline list-inline-rating">
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item text-muted">(3)</li>
            </ul>
          </td>
          <td>
            <span class="d-block">02 Aug 19</span>
            <span class="d-block">11.00 PM</span>
          </td>
          <td>
            <span class="badge badge-warning px-2 py-1 text-white">Pending</span>
          </td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-bs-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="javascript:void(0)">Approve</a>
                <a class="dropdown-item" href="javascript:void(0)">Cancel</a>
              </div>
            </div>
          </td>
        </tr>

        <tr class="table-row-bg-white">
          <td class="td-media">
            <div class="media media-table">
              <a class="media-img" href="listing-reservation.html">
                <img class="img-fluid rounded me-2 lazyestload" data-src="./assets/img/listing/listing-10.jpg" src="./assets/img/listing/listing-10.jpg" alt="listing.jpg">
              </a>
              <div class="media-body">
                <h3 class="media-title">
                  <a href="listing-reservation.html">Tom's Restaurant
                    <i class="fa fa-check-circle" aria-hidden="true"></i></a>
                </h3>
                <p class="mb-1">964 School Street, New York </p>
                <span class="text-primary text-capitalize d-inline-block mb-1">eat & drink</span>
                <p class="text-dark">From $50.00 /Night
                  <span class="text-muted ms-2">
                    <i class="far fa-heart text-primary me-1" aria-hidden="true"></i>9.5k
                  </span>
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="media media-xs align-items-center">
              <img class="rounded-circle me-3 lazyestload" data-src="assets/img/user/user-xs-4.jpg" src="assets/img/user/user-xs-4.jpg" alt="Image">
              <div class="media-body">
                <a class="text-muted font-weight-bold text-hover-primary" href="user-profile.html">Adam Smith</a>
              </div>
            </div>
          </td>
          <td>
            <i class="fa fa-check text-primary" aria-hidden="true"></i>
          </td>
          <td>729</td>
          <td>
            <ul class="list-inline list-inline-rating">
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="far fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item text-muted">(8)</li>
            </ul>
          </td>
          <td>
            <span class="d-block">05 Aug 19</span>
            <span class="d-block">11.00 PM</span>
          </td>
          <td>
            <span class="badge badge-success px-2 py-1 text-white">Approved</span>
          </td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-bs-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="javascript:void(0)">Cancel</a>
              </div>
            </div>
          </td>
        </tr>

        <tr class="table-row-bg-white">
          <td class="td-media">
            <div class="media media-table">
              <a class="media-img" href="listing-event.html">
                <img class="img-fluid rounded me-2 lazyestload" data-src="./assets/img/listing/listing-1.jpg" src="./assets/img/listing/listing-1.jpg" alt="listing.jpg">
              </a>
              <div class="media-body">
                <h3 class="media-title">
                  <a href="listing-event.html">The City Theater</a>
                </h3>
                <p class="mb-1">155 1st Avenue, New York </p>
                <span class="text-primary text-capitalize d-inline-block mb-1">Other's</span>
                <p class="text-dark">From $50.00 /Night
                  <span class="text-muted ms-2">
                    <i class="far fa-heart text-primary me-1" aria-hidden="true"></i>9.5k
                  </span>
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="media media-xs align-items-center">
              <img class="rounded-circle me-3 lazyestload" data-src="assets/img/user/user-xs-1.jpg" src="assets/img/user/user-xs-1.jpg" alt="Image">
              <div class="media-body">
                <a class="text-muted font-weight-bold text-hover-primary" href="user-profile.html">Aaren</a>
              </div>
            </div>
          </td>
          <td>
            <i class="fa fa-check text-primary" aria-hidden="true"></i>
          </td>
          <td>694</td>
          <td>
            <ul class="list-inline list-inline-rating">
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item text-muted">(5)</li>
            </ul>
          </td>
          <td>
            <span class="d-block">06 Aug 19</span>
            <span class="d-block">10.13 PM</span>
          </td>
          <td>
            <span class="badge badge-success px-2 py-1 text-white">Approved</span>
          </td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-bs-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="javascript:void(0)">Approve</a>
                <a class="dropdown-item" href="javascript:void(0)">Cancel</a>
              </div>
            </div>
          </td>
        </tr>

        <tr class="table-row-bg-white">
          <td class="td-media">
            <div class="media media-table">
              <a class="media-img" href="listing-event.html">
                <img class="img-fluid rounded me-2 lazyestload" data-src="./assets/img/listing/listing-7.jpg" src="./assets/img/listing/listing-7.jpg" alt="listing.jpg">
              </a>
              <div class="media-body">
                <h3 class="media-title">
                  <a href="listing-event.html">Sticky Band
                    <i class="fa fa-check-circle" aria-hidden="true"></i></a>
                </h3>
                <p class="mb-1">Bishop Avenue, New York </p>
                <span class="text-primary text-capitalize d-inline-block mb-1">events</span>
                <p class="text-dark">From $50.00 /Night
                  <span class="text-muted ms-2">
                    <i class="far fa-heart text-primary me-1" aria-hidden="true"></i>5.9k
                  </span>
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="media media-xs align-items-center">
              <img class="rounded-circle me-3 lazyestload" data-src="assets/img/user/user-xs-3.jpg" src="assets/img/user/user-xs-3.jpg" alt="Image">
              <div class="media-body">
                <a class="text-muted font-weight-bold text-hover-primary" href="user-profile.html">Abriel</a>
              </div>
            </div>
          </td>
          <td>
            <i class="fa fa-check text-primary" aria-hidden="true"></i>
          </td>
          <td>543</td>
          <td>
            <ul class="list-inline list-inline-rating">
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="far fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item text-muted">(9)</li>
            </ul>
          </td>
          <td>
            <span class="d-block">07 Aug 19</span>
            <span class="d-block">12.14 PM</span>
          </td>
          <td>
            <span class="badge badge-danger px-2 py-1 text-white">Canceled</span>
          </td>
          <td>

          </td>
        </tr>

        <tr class="table-row-bg-white">
          <td class="td-media">
            <div class="media media-table">
              <a class="media-img" href="listing-rental.html">
                <img class="img-fluid rounded me-2 lazyestload" data-src="./assets/img/listing/listing-8.jpg" src="./assets/img/listing/listing-8.jpg" alt="listing.jpg">
              </a>
              <div class="media-body">
                <h3 class="media-title">
                  <a href="listing-rental.html">Hotel Govendor
                    <i class="fa fa-check-circle" aria-hidden="true"></i></a>
                </h3>
                <p class="mb-1">78 Country Street, New York </p>
                <span class="text-primary text-capitalize d-inline-block mb-1">events</span>
                <p class="text-dark">From $50.00 /Night
                  <span class="text-muted ms-2">
                    <i class="far fa-heart text-primary me-1" aria-hidden="true"></i>5k
                  </span>
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="media media-xs align-items-center">
              <img class="rounded-circle me-3 lazyestload" data-src="assets/img/user/user-xs-5.jpg" src="assets/img/user/user-xs-5.jpg" alt="Image">
              <div class="media-body">
                <a class="text-muted font-weight-bold text-hover-primary" href="user-profile.html">Dainel</a>
              </div>
            </div>
          </td>
          <td>
            <i class="fa fa-check text-primary" aria-hidden="true"></i>
          </td>
          <td>461</td>
          <td>
            <ul class="list-inline list-inline-rating">
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
              <li class="list-inline-item text-muted">(6)</li>
            </ul>
          </td>
          <td>
            <span class="d-block">10 Aug 19</span>
            <span class="d-block">01.30 PM</span>
          </td>
          <td>
            <span class="badge badge-success px-2 py-1 text-white">Approved</span>
          </td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-bs-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="javascript:void(0)">Cancel</a>
              </div>
            </div>
          </td>
        </tr>


      </tbody>
    </table>

  </div>
</section>
