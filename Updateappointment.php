<!DOCTYPE html>
<html lang="en">
<!-- Description :  Home Page -->
<!-- Author   : Chow Zi Xiang -->

<head>
    <title>Updating Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'/>
    <!-- from bootstrap -->
    <script src="js/script.js"></script>
    <link rel=”stylesheet” href=”https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css”rel=”nofollow” integrity=”sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I” crossorigin=”anonymous”>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body>
  <?php include 'header.php'; ?>
  <form class="container my-3 bg-light w-50 align-items-center" id="regForm" action="">
    <h1 class="mb-3 mx-5">Updating Booking Appointment</h1>
    
    <!-- One "tab" for each step in the form: -->
    <div class="mb-3 mx-5 tab">
      <label for="booking_id" class="form-label">Booking ID:</label>
      <input type="text" class="form-in form-control" name="" id="booking_id" placeholder="Enter booking ID"/>
      <div class="invalid-feedback">Please enter a booking id!</div>
    </div>
                                
        <div class="tab">Choose new booking appointment: 

            <div id="sandbox-container" oninput="this.className = ''"></div>
                <script>
                    var disabledDates = ["2022-10-15","2022-10-14","2022-10-19"]
                    $('#sandbox-container').datepicker({
                    beforeShowDay: function(date){
                        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                        return [ disabledDates.indexOf(string) == -1 ]
                        },
                        format: "dd/mm/yyyy",
                        startDate: "now"
                        }); 
                </script>
        </div>
                                
     <div class="mb-3 mx-5 text-end">
        <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <style>
      .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
      }
      /* Mark the active step: */
      .step.active {
        opacity: 1;
      }
    </style>
    <div class="text-center pb-3">
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>
  <script>
    var currentTab = 0;
    var form_fields = [document.getElementById("booking_id"), document.getElementById("sandbox-container")];
    showTab(currentTab);
  </script>
  <?php include 'footer.php'; ?>
</body>
</html>


