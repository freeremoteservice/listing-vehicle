  // var booking = $('#booking');
  // if (booking.length !== 0) {
  //   booking.DataTable({
  //     language: {
  //       paginate: {
  //         previous: 'Prev'
  //       }
  //     },
  //     orderClasses: false,
  //     info: false,
  //     lengthChange: false,
  //     searching: false,
  //     aoColumnDefs: [{ "bSortable": false, "aTargets": [0, 3, 4, 5, 6, 7] }],
  //     responsive: true,
  //     order: [[3, 'asc']],
  //   });
  // }

  // var myBooking = $('#my-booking');
  // if (myBooking.length !== 0) {
  //   myBooking.DataTable({
  //     language: {
  //       paginate: {
  //         previous: 'Prev'
  //       }
  //     },
  //     orderClasses: false,
  //     info: false,
  //     lengthChange: false,
  //     searching: false,
  //     aoColumnDefs: [{ "bSortable": false, "aTargets": [0, -1, -2] }],
  //     responsive: true,
  //     order: [[3, 'asc']],
  //   });
  // }


  // // Table My Reviews
  // var bookingRequestMini = $('#my-reviews-lg');
  // if (bookingRequestMini.length !== 0) {
  //   bookingRequestMini.DataTable({
  //     bPaginate: false,
  //     orderClasses: false,
  //     info: false,
  //     lengthChange: false,
  //     searching: false,
  //     aoColumnDefs: [{ "bSortable": false, "aTargets": [0, -1] }],
  //     responsive: true,
  //     order: [[1, 'asc']],
  //   });
  // }

  // // Table Reviews
  // var tableReviews = $('#table-reviews');
  // if (tableReviews.length !== 0) {
  //   tableReviews.DataTable({
  //     language: {
  //       paginate: {
  //         previous: 'Prev'
  //       }
  //     },
  //     orderClasses: false,
  //     info: false,
  //     lengthChange: false,
  //     searching: false,
  //     aoColumnDefs: [{ "bSortable": false, "aTargets": [3, 4, -1] }],
  //     responsive: true,
  //     order: [[2, 'asc']],
  //   });

  // }


  // // Admin Listing
  // var adminListing = $('#admin-listing');
  // if (adminListing.length !== 0) {
  //   adminListing.DataTable({
  //     language: {
  //       paginate: {
  //         previous: 'Prev'
  //       }
  //     },
  //     orderClasses: false,
  //     info: false,
  //     lengthChange: false,
  //     searching: false,
  //     aoColumnDefs: [{ "bSortable": false, "aTargets": [1, 2, 3, 5, 6, -1] }],
  //     responsive: true,
  //     order: [[5, 'asc']],
  //   });
  // }

  // // My favourites
  // var adminListing = $('#my-favourites');
  // if (adminListing.length !== 0) {
  //   adminListing.DataTable({
  //     language: {
  //       paginate: {
  //         previous: 'Prev'
  //       }
  //     },
  //     orderClasses: false,
  //     info: false,
  //     lengthChange: false,
  //     searching: false,
  //     aoColumnDefs: [{ "bSortable": false, "aTargets": [0, 1, -1] }],
  //     responsive: true,
  //     order: [[2, 'asc']],
  //   });
  // }



  // // My Listing
  // var tableReviews = $('#my-listing');
  // if (tableReviews.length !== 0) {
  //   tableReviews.DataTable({
  //     language: {
  //       paginate: {
  //         previous: 'Prev'
  //       }
  //     },
  //     orderClasses: false,
  //     info: false,
  //     lengthChange: false,
  //     searching: false,
  //     aoColumnDefs: [{ "bSortable": false, "aTargets": [1, 2, 3, 5, -1] }],
  //     responsive: true,
  //     order: [[4, 'asc']],
  //   });

  // }

  // // Table List owner
  // var tableListOwner = $('#table-list-owner');
  // if (tableListOwner.length !== 0) {
  //   tableListOwner.DataTable({
  //     language: {
  //       paginate: {
  //         previous: 'Prev'
  //       }
  //     },
  //     orderClasses: false,
  //     info: false,
  //     lengthChange: false,
  //     searching: false,
  //     aoColumnDefs: [{ "bSortable": false, "aTargets": [-2, -1] }],
  //     responsive: true,
  //     order: [2, 'asc'],
  //   });
  // }

  // // Table General User
  // var tableGeneralUser = $('#table-general-user');
  // if (tableGeneralUser.length !== 0) {
  //   tableGeneralUser.DataTable({
  //     language: {
  //       paginate: {
  //         previous: 'Prev'
  //       }
  //     },
  //     orderClasses: false,
  //     info: false,
  //     lengthChange: false,
  //     searching: false,
  //     aoColumnDefs: [{ "bSortable": false, "aTargets": [-2, -1] }],
  //     responsive: true,
  //     order: [1, 'asc'],
  //   });
  // }

// Table List order
var tableGeneralUser = $('#table-list-order');
if (tableGeneralUser.length !== 0) {
    tableGeneralUser.DataTable({
        language: {
        paginate: {
            previous: 'Prev'
        }
        },
        orderClasses: false,
        info: false,
        lengthChange: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        searching: false,
        aoColumnDefs: [{ "bSortable": false, "aTargets": [-2, -1] }],
        responsive: true,
        order: [1, 'asc'],
    });
}

// Table List vehicle
var tableGeneralUser = $('#table-list-vehicle');
if (tableGeneralUser.length !== 0) {
    tableGeneralUser.DataTable({
        language: {
        paginate: {
            previous: 'Prev'
        }
        },
        orderClasses: false,
        info: false,
        lengthChange: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        searching: false,
        aoColumnDefs: [{ "bSortable": false, "aTargets": [-2, -1] }],
        responsive: true,
        order: [1, 'asc'],
    });
}

// Table List vehicle
var tableGeneralUser = $('#table-list-users');
if (tableGeneralUser.length !== 0) {
    tableGeneralUser.DataTable({
        language: {
        paginate: {
            previous: 'Prev'
        }
        },
        orderClasses: false,
        info: false,
        lengthChange: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        searching: false,
        aoColumnDefs: [{ "bSortable": false, "aTargets": [-2, -1] }],
        responsive: true,
        order: [1, 'asc'],
    });
}
