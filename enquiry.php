<!DOCTYPE html>
<head>
    <?php include "page_head.php"; ?>
    <!-- javascript for the calendar (date picker)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--css for the calendar (date picker)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include 'header.php';  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require "booking/enquiry_functions.php";
        newenquiry();} ?>

<h1 class="text-center mt-5">ENQUIRY</h1>

<h6 class="text-center mt-5"><em> Feel free to contact us if you need any assistance, any help or another question.</em></h6>


<div class="container p-5 my-5 border" >

    <form method="post" class="row g-3 needs-validation" novalidate>

        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" pattern="^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-zA-Z0-9]+(?:-+[a-zA-Z0-9]+)*\.){1,126}){1,}(?:(?:[a-zA-Z][a-zA-Z0-9]*)|(?:(?:xn--)[a-zA-Z0-9]+))(?:-+[a-zA-Z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){7})|(?:(?!(?:.*[a-fA-F0-9][:\]]){7,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){5}:)|(?:(?!(?:.*[a-fA-F0-9]:){5,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$" class="form-control input-sm" placeholder="JohnPie@email.com" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please enter a valid email.</div>
        </div>

        <div class="col-12">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" pattern="^[a-zA-Z][a-zA-Z ]+$" class="form-control" placeholder="John Pie" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Only letters and white space allowed.</div>
        </div>

        <div class='col-12'>
            <label for='inputSubject' class='form-label'>Subject of Enquiry</label>
            <input type='text' class='form-control' id='inputSubject' name='inputSubject' required>
            <div class='valid-feedback'>Looks good!</div>
            <div class='invalid-feedback'>Please provide a subject. </div>
        </div>

        <div class='col-12'>
            <label for='inputComment' class='form-label'>Comment</label>
            <input type='text' class='form-control' id='inputComment' name='inputComment' placeholder="Subject have to be filled first" disabled required>
            <div class='valid-feedback'>Looks good!</div>
            <div class='invalid-feedback'>Please provide comments.</div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Book Now</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>

    </form>

    <script src="script/booking_validation.js"></script>
    
    <script>
        $('input[name="inputSubject"]').change(function(){
        if($(this) !=="") {
            $('input[name="inputComment"]').prop('disabled',false);} 
            
        else {
            $('input[name="inputComment"]').prop('disabled',true);}
        });
    </script>

</div>


<?php include 'footer.php'; ?>


</body>
</html>