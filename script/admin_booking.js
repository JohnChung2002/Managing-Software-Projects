const emailRegex = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
const timeslots = ["00:00:00", "01:00:00", "02:00:00", "03:00:00", "04:00:00", "05:00:00", "06:00:00", "07:00:00", "08:00:00", "09:00:00", "10:00:00", "11:00:00", "12:00:00", "13:00:00", "14:00:00", "15:00:00", "16:00:00", "17:00:00", "18:00:00", "19:00:00", "20:00:00", "21:00:00", "22:00:00", "23:00:00"];
const statusName = ["Opening", "Closing"]
const divName = ["oc-1", "oc-2"];

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

function checkActiveBooking(input_booking_id) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: "GET",
            url: "api/get_active_booking.php",
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
    var info = document.getElementById("booking-info");
    info.innerHTML = "";
    booking_validate.removeAttribute('class');
    booking_validate.style.marginTop = "-8px";
    var booking_id = $('#booking-id').val();
    if (booking_id.length == 11) {
        checkBookingExist(booking_id).then(function(data) {
            info.innerHTML = `<p>Booking ID: ${booking_id}<br/>
            Booking Date: ${data.appointment_date}<br/>
            Booking Time: ${data.appointment_timeslot}<br/>
            Number of Attendees: ${data.number_of_attendees}</p>`
            booking_validate.innerText = "Booking ID found!";
            booking_validate.classList.add("valid-feedback");
            booking_validate.style.display = "block";
        }).catch(function () {
            booking_validate.innerText = "Booking ID not found or not valid (expired/cancelled)!";
            booking_validate.classList.add("invalid-feedback");
            booking_validate.style.display = "block";
        });
    } else {
        booking_validate.innerText = "Invalid booking ID!";
        booking_validate.classList.add("invalid-feedback");
        booking_validate.style.display = "block";
    }
}

function loadActiveBookingCancel() {
    var booking_validate = document.getElementById("check-booking");
    var info = document.getElementById("booking-info");
    info.innerHTML = "";
    booking_validate.removeAttribute('class');
    booking_validate.style.marginTop = "-8px";
    var booking_id = $('#booking-id').val();
    if (booking_id.length == 11) {
        checkActiveBooking(booking_id).then(function(data) {
            info.innerHTML = `<p>Booking ID: ${booking_id}<br/>
            Booking Date: ${data.appointment_date}<br/>
            Booking Time: ${data.appointment_timeslot}<br/>
            Number of Attendees: ${data.number_of_attendees}</p>`
            booking_validate.innerText = "Booking ID found!";
            booking_validate.classList.add("valid-feedback");
            booking_validate.style.display = "block";
            document.getElementById("inputReason").disabled = false;
        }).catch(function () {
            booking_validate.innerText = "Booking ID not found or not valid (expired/cancelled)!";
            booking_validate.classList.add("invalid-feedback");
            booking_validate.style.display = "block";
            document.getElementById("inputReason").disabled = true;
        });
    } else {
        booking_validate.innerText = "Invalid booking ID!";
        booking_validate.classList.add("invalid-feedback");
        booking_validate.style.display = "block";
        document.getElementById("inputReason").disabled = true;
    }
}

function loadActiveBookingUpdate() {
    var booking_validate = document.getElementById("check-booking");
    var info = document.getElementById("booking-info");
    info.innerHTML = "";
    booking_validate.removeAttribute('class');
    booking_validate.style.marginTop = "-8px";
    var booking_id = $('#booking-id').val();
    if (booking_id.length == 11) {
        checkActiveBooking(booking_id).then(function(data) {
            info.innerHTML = `<p>Booking ID: ${booking_id}<br/>
            Booking Date: ${data.appointment_date}<br/>
            Booking Time: ${data.appointment_timeslot}<br/>
            Number of Attendees: ${data.number_of_attendees}</p>`
            booking_validate.innerText = "Booking ID found!";
            booking_validate.classList.add("valid-feedback");
            booking_validate.style.display = "block";
            document.getElementById("update-section").style.display = "block";
        }).catch(function () {
            booking_validate.innerText = "Booking ID not found or not valid (expired/cancelled)!";
            booking_validate.classList.add("invalid-feedback");
            booking_validate.style.display = "block";
            document.getElementById("update-section").style.display = "none";
        });
    } else {
        booking_validate.innerText = "Invalid booking ID!";
        booking_validate.classList.add("invalid-feedback");
        booking_validate.style.display = "block";
        document.getElementById("update-section").style.display = "none";
    }
}

function availabilityClosed() {
    for (var i = 0; i < divName.length; i++) {
        var oc = document.getElementById(divName[i]);
        oc.style.display = "none";
        oc.innerHTML = "";
    }
}

function availabilityOpenNoBreak() {
    var oc = document.getElementById("oc-1");
    oc.innerHTML = "";
    oc.style.display = "flex";
    var oc2 = document.getElementById("oc-2");
    oc2.style.display = "none";
    oc2.innerHTML = "";
    for (var y = 0; y < statusName.length; y++) { 
        var div = document.createElement("div");
        div.classList.add("col-6");
        var label = document.createElement("label");
        label.classList.add("form-label");
        label.for = statusName[y].toLowerCase();
        label.innerText = `${statusName[y]} Hour`;
        div.appendChild(label);
        var select = document.createElement("select");
        select.setAttribute("class", "form-select form-select-lg");
        select.setAttribute("id", `${statusName[y].toLowerCase()}`);
        select.setAttribute("name", `${statusName[y].toLowerCase()}`);
        select.setAttribute("required", "true");
        var eoption = document.createElement("option");
        eoption.setAttribute("value", "");
        eoption.disabled = eoption.selected = true;
        select.appendChild(eoption);
        for (var i = 0; i < timeslots.length; i++) {
            var option = document.createElement("option");
            option.setAttribute("value", timeslots[i]);
            option.innerHTML = timeslots[i];
            select.appendChild(option);
        }
        div.appendChild(select);
        var div_valid = document.createElement("div");
        div_valid.classList.add("valid-feedback");
        div_valid.innerText = "Looks good!";
        div.appendChild(div_valid);
        var div_invalid = document.createElement("div");
        div_invalid.classList.add("invalid-feedback");
        div_invalid.innerText = "Please select a valid timeslot!";
        div.appendChild(div_invalid);
        oc.appendChild(div);
    }
}

function availabilityOpenBreak() {
    for (var x = 0; x < divName.length; x++) {
        var oc = document.getElementById(divName[x]);
        oc.style.display = "flex";
        oc.innerHTML = "";
        for (var y = 0; y < statusName.length; y++) { 
            var div = document.createElement("div");
            div.classList.add("col-6");
            var label = document.createElement("label");
            label.classList.add("form-label");
            label.for = `statusName[y].toLowerCase()-${x+1}`;
            label.innerText = `${statusName[y]} Hour ${x+1}`;
            div.appendChild(label);
            var select = document.createElement("select");
            select.setAttribute("class", "form-select form-select-lg");
            select.setAttribute("id", `${statusName[y].toLowerCase()}-${x+1}`);
            select.setAttribute("name", `${statusName[y].toLowerCase()}-${x+1}`);
            select.setAttribute("required", "true");
            var eoption = document.createElement("option");
            eoption.setAttribute("value", "");
            eoption.disabled = eoption.selected = true;
            select.appendChild(eoption);
            for (var i = 0; i < timeslots.length; i++) {
                var option = document.createElement("option");
                option.setAttribute("value", timeslots[i]);
                option.innerHTML = timeslots[i];
                select.appendChild(option);
            }
            div.appendChild(select);
            var div_valid = document.createElement("div");
            div_valid.classList.add("valid-feedback");
            div_valid.innerText = "Looks good!";
            div.appendChild(div_valid);
            var div_invalid = document.createElement("div");
            div_invalid.classList.add("invalid-feedback");
            div_invalid.innerText = "Please select a valid timeslot!";
            div.appendChild(div_invalid);
            oc.appendChild(div);
        }
    }
}

function checkClosing1() {
    var oc = document.getElementById("oc-1");
    var start = oc.getElementsByTagName("select")[0].value
    var end = oc.getElementsByTagName("select")[1].value
    if (start > end) {
        for (var i=0; i < divName.length; i++) {
            oc.getElementsByTagName("select")[i].value = "";
            oc.getElementsByClassName("invalid-feedback")[i].innerText = "Please select a valid timerange! (Start time must be before end time)";
        }
    }
}

function checkClosing2() {
    for (var x = 0; x < divName.length; x++) {
        var oc = document.getElementById(divName[x]);
        var start = oc.getElementsByTagName("select")[0].value
        var end = oc.getElementsByTagName("select")[1].value
        if (start > end) {
            for (var i=0; i < divName.length; i++) {
                oc.getElementsByTagName("select")[i].value = "";
                oc.getElementsByClassName("invalid-feedback")[i].innerText = "Please select a valid timerange! (Start time must be before end time)";
            }
        }
    }
}