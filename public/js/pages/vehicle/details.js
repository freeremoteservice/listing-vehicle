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

document.getElementById('company_document').addEventListener('change', function (event) {
  const files = event.target.files;
  const previewContainer = document.getElementById('company_document_preview');
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

$(document).ready(function(){
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
      
      // Validate step 2 (Finish button) - image uploads based on user role
      if (currentStep.attr('id') === 'step-2') {
        let isValid = true;
        
        // Check if user is private (show ID fields) or company (show company fields)
        let isPrivateUser = $('#id-container').is(':visible');
        let isCompanyUser = $('#company-doc-container').is(':visible');
        
        if (isPrivateUser) {
          // Validate ID fields for private users
          let idFrontImg = $('#id_front_img')[0].files.length;
          let idBackImg = $('#id_back_img')[0].files.length;
          
          if (!idFrontImg) {
            $('#id_front_img_error').show();
            isValid = false;
          } else {
            $('#id_front_img_error').hide();
          }
          
          if (!idBackImg) {
            $('#id_back_img_error').show();
            isValid = false;
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
            isValid = false;
          } else {
            $('#user_photo_error').hide();
          }
          
          if (!companyDoc) {
            $('#company_document_error').show();
            isValid = false;
          } else {
            $('#company_document_error').hide();
          }
        }
        
        if (!isValid) {
          return; // Don't submit if validation fails
        }
        
        // If validation passes, submit the form
        $('#register-form').submit();
        return;
      }
      
      currentStep.removeClass("active");
      nextStep.addClass("active");

      // Update progress bar
      let stepIndex = $(".form-step").index(nextStep) + 1;
      $(".progress-bar li").removeClass("active");
      $(".progress-bar li").slice(0, stepIndex).addClass("active");
    });

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