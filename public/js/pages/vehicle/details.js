document.getElementById('id_back_img').addEventListener('change', function (event) {
  const files = event.target.files;
  const previewContainer = document.getElementById('id_back_img_preview');
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

document.getElementById('id_front_img').addEventListener('change', function (event) {
  const files = event.target.files;
  const previewContainer = document.getElementById('id_front_img_preview');
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

document.getElementById('user_photo').addEventListener('change', function (event) {
  const files = event.target.files;
  const previewContainer = document.getElementById('user_photo_preview');
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

document.getElementById('company_document').addEventListener('change', function(e) {
  var fileName = e.target.files[0] ? e.target.files[0].name : "Click or Drag file here";
  var label = document.querySelector('label[for="company_document"].custom-file-label');
  if (label) {
      label.textContent = fileName;
  }
});

$(document).ready(function() {
    $('#login-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "../auth/do_login",
            type: "post",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response?.status == "success") {
                    location.reload();
                } else {
                    toastr.error(response.message);
                }
            }
        });
    
        return false;
    });

    var $carousel = $('.listing-details-carousel');
    if ($carousel.hasClass('owl-loaded')) {
      $carousel.trigger('destroy.owl.carousel').removeClass('owl-loaded');
      $carousel.find('.owl-stage-outer').children().unwrap();
    }
    $carousel.owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      dots: true
    });

    $(".next-step").click(function () {
      let currentStep = $(".form-step.active");
      let nextStep = currentStep.next(".form-step");
      
      // Validate delivery address if we're on step 1
      if (currentStep.attr('id') === 'step-1') {
        let deliveryAddress = $('#delivery_address').val().trim();
        if (!deliveryAddress) {
          $('#delivery_address_error').show();
          $('#delivery_address').focus();
          return;
        } else {
          $('#delivery_address_error').hide();
        }
      }
      
      currentStep.removeClass("active");
      nextStep.addClass("active");

      // Update progress bar
      let stepIndex = $(".form-step").index(nextStep) + 1;
      $(".progress-bar li").removeClass("active");
      $(".progress-bar li").slice(0, stepIndex).addClass("active");
    });

    $("#booking-form").submit(function(e) {
        e.preventDefault();

        if (!checkValidation()) {
            return false;
        }

        // Create a FormData object from the form
        let formData = new FormData(this);

        $.ajax({
            url: "order_vehicle",
            type: "post",
            data: formData,
            processData: false, // Prevent jQuery from processing data
            contentType: false, // Prevent jQuery from setting the content type
            dataType: "json",
            success: function(response) {
                if (response?.status == "success") {
                    toastr.success(response.message);

                    // Hide the modal
                    $("#bookNowModal").hide();
                    // Remove the backdrop
                    $(".modal-backdrop").remove();
                    // Remove the 'modal-open' class
                    $("body").removeClass("modal-open");
                    $("body").css("overflow", ""); // Reset overflow style
                    $("body").css("padding-right", ""); // Reset padding added for scrollbar
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });

    function checkValidation() {
        let result = true;
        
        // Check if user is private (show ID fields) or company (show company fields)
        let isPrivateUser = $('#id-container').is(':visible');
        let isCompanyUser = $('#company-doc-container').is(':visible');
        
        if (isPrivateUser) {
          // Validate ID fields for private users
          let idFrontImg = $('#id_front_img')[0].files.length;
          let idBackImg = $('#id_back_img')[0].files.length;
          
          if (!idFrontImg) {
            $('#id_front_img_error').show();
            result = false;
          } else {
            $('#id_front_img_error').hide();
          }
          
          if (!idBackImg) {
            $('#id_back_img_error').show();
            result = false;
          } else {
            $('#id_back_img_error').hide();
          }
        }
        
        if (isCompanyUser) {
          // Validate company fields for company users
          let userPhoto = $('#user_photo')[0].files.length;
          let companyDoc = $('#company_document')[0].files.length;
          
          if (!userPhoto) {
            $('#user_photo_error').show();
            result = false;
          } else {
            $('#user_photo_error').hide();
          }
          
          if (!companyDoc) {
            $('#company_document_error').show();
            result = false;
          } else {
            $('#company_document_error').hide();
          }
        }

        return result;
    }

    $(".prev-step").click(function () {
      let currentStep = $(".form-step.active");
      let prevStep = currentStep.prev(".form-step");
      currentStep.removeClass("active");
      prevStep.addClass("active");
      // Update progress bar
      let stepIndex = $(".form-step").index(prevStep) + 1;
      $(".progress-bar li").removeClass("active");
      $(".progress-bar li").slice(0, stepIndex).addClass("active");
    })
});