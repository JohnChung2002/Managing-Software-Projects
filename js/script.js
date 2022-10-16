function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  for (var i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  document.getElementById("prevBtn").style.display = (n == 0) ? "none" : "inline";
  document.getElementById("nextBtn").innerHTML = (n == (x.length - 1)) ? "Submit" : "Next";
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var errorBox = document.getElementsByClassName("invalid-feedback");
  if (currentTab >= 0 && currentTab <= form_fields.length) {
    console.log(form_fields[currentTab].value)
    if (form_fields[currentTab].value == ""){
      errorBox[currentTab].style = "display: block";
    } else {
      errorBox[currentTab].style = "display: none";
      return true;
    }
  }
  return false;
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

function chckpostcode(){
  var num = document.getElementById("bookingid").value;
  var postcodeOk = true;
  if (num =="") {
    gErrorMsg = gErrorMsg + "Your bookingid cannot be blank\n"
    postcodeOk = false;
  }

  else{
    if (isNaN(num)) {
      gErrorMsg =  gErrorMsg + "Your bookingid must be numbers only\n"
      postcodeOk = false;
    }
  }
  if (!postcodeOk){
    document.getElementById("bookingid").style.borderColor = "red";
  }
  else{
    if (postcodeOk){
      document.getElementById("bookingid").style.borderColor = "black";
    }
  }
  return postcodeOk;
}




