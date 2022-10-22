const emailRegex = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

function checkUserExist(input_email) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/get_user_info.php",
            data: {
                email: input_email,
            },
            success: function (result) {
                resolve(jQuery.parseJSON(result));
            },
            error: function (result) {
                reject(result);
            }
        });
    })
}

function checkBookingExist(input_booking_id) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/get_booking_info.php",
            data: {
                booking_id: input_booking_id,
            },
            success: function (result) {
                resolve(jQuery.parseJSON(result));
            },
            error: function (result) {
                reject(result);
            }
        });
    })
}

function loadUser() {
    var user_validate = document.getElementById("check-user");
    user_validate.removeAttribute('class');
    user_validate.style.marginTop = "-8px";
    var email = $('#email').val();
    if (emailRegex.test(email)) {
        checkUserExist(email).then(function(data) {
            $('#name').val(data.name);
            $('#gender').val(data.gender);
            $('#phone').val(data.phone_number);
            user_validate.innerText = "User found!";
            user_validate.classList.add("valid-feedback");
            user_validate.style.display = "block";
        }).catch(function () {
            user_validate.innerText = "User not found! Please fill in the details below.";
            user_validate.classList.add("invalid-feedback");
            user_validate.style.display = "block";
        });
    } else {
        user_validate.innerText = "Invalid email!";
        user_validate.classList.add("invalid-feedback");
        user_validate.style.display = "block";
    }
}

function loadBooking() {
    var booking_validate = document.getElementById("check-booking");
    booking_validate.removeAttribute('class');
    booking_validate.style.marginTop = "-8px";
    var booking_id = $('#booking-id').val();
    if (booking_id.length == 11) {
        checkBookingExist(booking_id).then(function(data) {
            var info = document.getElementById("booking-info");
            info.innerHTML = `<p>Booking ID: ${booking_id}<br/>
            Booking Date: ${data.appointment_date}<br/>
            Booking Time: ${data.appointment_timeslot}<br/>
            Number of Attendees: ${data.number_of_attendees}</p>`
            booking_validate.innerText = "Booking ID found!";
            booking_validate.classList.add("valid-feedback");
            booking_validate.style.display = "block";

        }).catch(function () {
            booking_validate.innerText = "Booking ID not found!";
            booking_validate.classList.add("invalid-feedback");
            booking_validate.style.display = "block";
        });
    } else {
        booking_validate.innerText = "Invalid booking ID!";
        booking_validate.classList.add("invalid-feedback");
        booking_validate.style.display = "block";
    }
}
