<?php 
include "auth/is_loggedin.php";
?>
<!DOCTYPE html>
<head>
    <?php include "page_head.php"; ?>
    <title>Create Booking</title>
    <!-- javascript for the calendar (date picker)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--css for the calendar (date picker)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
<body>
<?php include 'header.php'; 
    if ($_SESSION["user_role"] == "Admin" || $_SESSION["user_role"] == "Super Admin") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include "booking/booking_functions.php";
            adminCreateBooking();
        } 
        echo '
            <h1 class="text-center mt-5">APPOINTMENT REQUEST</h1>
            <div class="container p-5 my-5 border">
                <form method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-10">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" pattern="^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-zA-Z0-9]+(?:-+[a-zA-Z0-9]+)*\.){1,126}){1,}(?:(?:[a-zA-Z][a-zA-Z0-9]*)|(?:(?:xn--)[a-zA-Z0-9]+))(?:-+[a-zA-Z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){7})|(?:(?!(?:.*[a-fA-F0-9][:\]]){7,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){5}:)|(?:(?!(?:.*[a-fA-F0-9]:){5,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$" class="form-control input-sm" placeholder="JohnPie@email.com" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                    <div class="col-2 d-flex flex-column">
                        <label class="form-label" style="visibility:hidden;">Check User</label>
                        <button type="button" class="btn btn-primary" onclick="loadUser()">Check if user exists</button>
                    </div>
                    <div class="col-12">
                        <div id="check-user"></div>
                    </div>
                    <div class="col-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" pattern="^[a-zA-Z][a-zA-Z ]+$" class="form-control" placeholder="John Pie" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Only letters and white space allowed.</div>
                    </div>
                    <div class="col-4">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default selected example" name="gender" id="gender" required>
                        <option disabled selected value=""> -- select an option -- </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please select your gender.</div>
                    </div>
                    <div class="col-4">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" pattern="^[0-9]{10}$" class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="0123456789" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                    </div>
                    <div id="datepicker-container"></div>
                    <input type="text" class="form-control" name="date" id="date" hidden required>
                    <div class="mb-3">
                        <label for="time" class="form-label">Available Time</label>
                        <select class="form-select form-select-lg" name="time" id="time" required></select>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please select a time slot.</div>
                    </div>
                    <div class="col-12">
                        <label for="inputPpl" class="form-label">How many people will be joining?</label>
                        <input type="text" pattern="^[1-9]\d*(?:\.\d+)?$" maxlength="2" class="form-control" id="inputPpl" name="inputPpl" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter the number of people joining.</div>
                    </div>  
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Book Now</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </form>
            <script src="script/datepicker.js"></script>
            <script>
                var disabledDates;
                $(document).ready(function() {
                var start_date = getToday();
                updateDisabled(start_date).then(function(data) {
                    disabledDates = disablePrevNextMonthDates(data, start_date);
                    loadDatePicker();
                    $("#datepicker-container").datepicker("hide");
                    hideNextPrevMonthDates();
                }).catch(err => console.log(err));
                });
            </script>
            <script src="script/booking_validation.js"></script>
            <script src="script/admin_booking.js"></script>
        </div>';
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include "booking/booking_functions.php";
            createUserBooking();
        } 
        echo '
        <h1 class="text-center mt-5">APPOINTMENT REQUEST</h1>
        <div class="container p-5 my-5 border">
        <form method="post" class="row g-3 needs-validation" novalidate>
            <div id="datepicker-container"></div>
                <input type="text" class="form-control" name="date" id="date" hidden>
                <div class="mb-3">
                    <label for="time" class="form-label">Available Time</label>
                    <select class="form-select form-select-lg" name="time" id="time" required></select>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please select a time slot.</div>
                </div>
            <div class="col-12">
                <label for="inputPpl" class="form-label">How many people will be joining?</label>
                <input type="text" pattern="^[1-9]\d*(?:\.\d+)?$" maxlength="2" class="form-control" id="inputPpl" name="inputPpl" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter the number of people joining.</div>
            </div>  
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Book Now</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </form>
        <script src="script/datepicker.js"></script>
        <script>
        var disabledDates;
        $(document).ready(function() {
            var start_date = getToday();
            updateDisabled(start_date).then(function(data) {
                disabledDates = disablePrevNextMonthDates(data, start_date);
                loadDatePicker();
                $("#datepicker-container").datepicker("hide");
                hideNextPrevMonthDates();
            }).catch(err => console.log(err));
        });
        </script>
        <script src="script/booking_validation.js"></script>
        </div>';
    }
    include "footer.php";
    ?>
</body>
</html>