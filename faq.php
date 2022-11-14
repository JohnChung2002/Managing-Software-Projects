<!DOCTYPE html>
<head>
    <?php include "page_head.php"; ?>

    <!--for ajax requests-->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- javascript for the calendar (date picker)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--css for the calendar (date picker)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include 'header.php'; ?>

<h1 class="text-center mt-5">FREQUENTLY ASKED QUESTIONS</h1>

<div class="container border border-success rounded my-5  py-5" >

<div class="accordion" >
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <h5>What is the purpose of Cacti Succulent plant?</h5>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <ul>
       <li> Cacti-Succulent Kuching is a local homegrown business specialized in selling various types and size of succulent plants and its utilities.</li>
      <ul>
        </div>
    </div>
  </div>
</div>

<div class="accordion my-3">
<div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <h5>Why am I not able to log into my account?</h5>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
     
        <li>Please make sure that your account is first verified. Do check your junks inyour email as the email might end up there.<li>
        <li> You may reset your password <a href="https://cactisucculentkuching.cf/resetpassword.php" class="link-primary">here</a> if you have forgotten your password.</li>
    
      </div>
    </div>
  </div>
</div>

<div class="accordion my-3" >
<div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <h5>How do I change my booking time?</h5>
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <li>After logged into your account, click booking at the top on the navigation bar, and choose the <strong>Update Booking</strong> option.</li>
      </div>
    </div>
  </div>
</div>

<div class="accordion my-3" >
<div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        <h5>Will the admin be able to look at my acoount details like password?</h5>
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <li> Every account's password will be encrypted and the admins will not be able to look at the user's personal information.</li>
      </div>
    </div>
  </div>
</div>

<div class="accordion my-3">
<div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        <h5>How do I make a booking appointment if I do not have an account?</h5>
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <li> You may contact the admin to help you create an appointment if you do not have an account.</li>
      </div>
    </div>
  </div>
</div>

<div class="accordion my-3">
<div class="accordion-item">
    <h2 class="accordion-header" id="headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        <h5>How do I reset my password?</h5>
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <li>You may reset your password <a href="https://cactisucculentkuching.cf/resetpassword.php" class="link-primary">here</a> if you have forgotten your password.</li>
      </div>
    </div>
  </div>
</div>

</div>


<?php include 'footer.php'; ?>


</body>
</html>