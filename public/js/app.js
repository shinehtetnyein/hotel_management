// Start Cancel Section
// let cancelButton = document.getElementById('cancelProfile');
// let inputBox = document.querySelectorAll('.profile_inputs');
// cancelButton.addEventListener('submit',function(e){
//     console.log('hay...');
// })

document.addEventListener("DOMContentLoaded", function () {
    const checkInInput = document.getElementById("checkIn");
    const checkOutInput = document.getElementById("checkOut");

    // Initialize Flatpickr on Check-In input
    const checkInCalendar = flatpickr(checkInInput, {
        minDate: "today", // Disable past dates
        onChange: function (selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                // Update the Check-Out calendar with the selected Check-In date
                checkOutCalendar.set('minDate', dateStr);
            }
        }
    });

    // Initialize Flatpickr on Check-Out input
    const checkOutCalendar = flatpickr(checkOutInput, {
        minDate: new Date(), // Disable past dates
    });
});

(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);


// Start JQuery Section

$(document).ready(function () {

    // Start Register form
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();
        console.log('connected');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            // url: "{{ route('registerPost') }}",
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',

            success: function (response) {
                console.log(response);
                if (response.success) {
                    console.log(response);
                    $('#registerSuccessful').show();
                    $('#registerFail').hide();
                    $('#registerForm')[0].reset();
                    $('.text-danger').text('');
                }
            },
            error: function (error) {
                console.log(error);
                // $('#registerFail').show();
                // $('#registerSuccessful').hide();
                let errors = error.responseJSON.errors;
                $('.text-danger').text('');

                // Display validation errors
                if (errors.firstName) {
                    $('#firstName-error').text(errors.firstName[0]);
                }
                if (errors.lastName) {
                    $('#lastName-error').text(errors.lastName[0]);
                }
                if (errors.email) {
                    $('#email-error').text(errors.email[0]);
                }
                if (errors.password) {
                    $('#password-error').text(errors.password[0]);
                }
                if (errors.password_confirmation) {
                    $('#password_confirmation-error').text(errors.password_confirmation[0]);
                }
            }
        });

    });
    // End register form

    // Start Login form

    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        console.log('connected...');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            // url: '{{ route("loginPost") }}',
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',

            success: function (response) {
                console.log(response);
                if (response.success) {
                    window.location.href = response.redirect_url;
                } else {
                    $('#email-error').text('');
                    $('#errors').text('');
                    $('#email-error').text(response.message).show();
                    $('#errors').text(response.errors).show();
                }
            },
            error: function (error) {
                console.log(error);
                let errors = error.responseJSON.errors;
                $('.text-danger').text('');
                // Display validation errors
                if (errors.email) {
                    console.log(hi);
                    // $('#email-error').text(errors).show();
                    $('#email-error').text(errors.email[0]);
                }
                if (errors.password) {
                    // $('#password-error').text(errors).show();
                    $('#password-error').text(errors.password[0]);

                }
            }
        });

    });
    // End login form

    // Start Nav
    $('.navbuttons').click(function () {
        $(".navbuttons").toggleClass("crossxs");
    });
    // End Nav

    $("#lightslider").lightSlider({
        // auto:true,
        item: 4,
        loop: true,
        slideMove: 1,
        easing: 'cubic-bezier(0.50, 0, 0.50, 1)',
        speed: 1000
    }).play();

})

const textarea = document.getElementById('scrollableTextarea');

// Scroll to the bottom
textarea.scrollTop = textarea.scrollHeight;

// Scroll to the top
textarea.scrollTop = 0;

document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('profile_photo');
    // Trigger file input click when button is clicked
    document.querySelector('.file-upload-btn').addEventListener('click', function () {
        fileInput.click();
    });

});
    // Function to preview the selected image
    function previewImage(event) {
        const input = event.target;
        const review = document.getElementById('imageReview');
        const preview = document.getElementById('imagePreview');

        // Check if a file is selected
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Show the preview image
                iconContainer.style.display = 'none';
                review.style.display = "none";
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

//Start Javascript Area
// Start Admin Section

let dotBtn = document.getElementById('dotBtn');
let dropDown = document.querySelector('.more-dropdown-contents');
// let AdminBooking = document.getElementById('admin_booking');
dotBtn.addEventListener('click',function(e){
    e.preventDefault();
    // console.log('hay i am working');
    if(dropDown.style.display === "none"){
        dropDown.style.display = 'block';
    }else{
        dropDown.style.display = 'none';
    }
})

AdminBooking.addEventListener('click',function(e){
    e.preventDefault();
    console.log('hi');
    if(dropDown.style.display === 'block'){
        dropDown.style.display = 'none';
    }
})




// Start Header

//Start Navbar
function dropbtn(e) {
    // console.log("hi");
    //   document.getElementById('mydropdown').classList.toggle('show');
    // console.log(e.target.nextElementSibling.classList);
    e.target.nextElementSibling.classList.toggle('show');
}

function dropfilter() {
    // console.log('hay')
    var getsearch, filter, getdropdiv, getlinks, linkvalue;
    getsearch = document.getElementById('search');
    filter = getsearch.value.toUpperCase();
    // getdropdiv = document.getElementById('mydropdown');
    // getlinks = getdropdiv.getElementsByTagName('a');

    getlinks = document.querySelectorAll(".mydropdown a");
    // console.log(getlinks);

    for (var x = 0; x < getlinks.length; x++) {
        linkvalue = getlinks[x].textContent || getlinks[x].innerText;
        // console.log(linkvalue);

        if (linkvalue.toUpperCase().indexOf(filter) > -1) {
            getlinks[x].style.display = "";
        } else {
            getlinks[x].style.display = "none";
        }
    }
}

//End Navbar

//Start Banner
//Start Auto Background
function* genfun() {
    var index = 1;
    while (true) {
        yield index++;
        if (index > 3) {
            index = 1;
        }
    }
};
var getgen = genfun();

var getheader = document.querySelector('header');

getheader.style.backgroundImage = `url(./images/banner/banner${getgen.next().value}.jpg)`;

function autoload() {
    getheader.style.backgroundImage = `url(./images/banner/banner${getgen.next().value}.jpg)`;
}

setInterval(autoload, 5000);


let cancelBtn = document.getElementById('cancelProfile');
let profileInfo = document.querySelectorAll('.form-control');
cancelBtn.addEventListener('click',function(e){
e.preventDefault();
profileInfo.textContent = "";
});


    document.addEventListener('DOMContentLoaded', function () {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const container = document.querySelector('.container-fluid');

        sidebarToggle.addEventListener('click', function () {
            container.classList.toggle('sidebar-expanded');
            container.classList.toggle('sidebar-collapsed');
        });
    });


