var amountNeed = 0;
var months = 0;
var monthlyAmount = 0;
var userItem = "";





//------------------------------------------------------------------------------------------------//
//                     Calculator

function calculateMonthlyAmount() {
    monthlyAmount =  amountNeed / months 
    monthlyAmount = monthlyAmount.toFixed(2);
}


$("#calculate-btn").click(function() {


    amountNeed = parseFloat($("#target-amount").val());
    months = parseInt($("#timeframe").val());
    userItem = $("#goal").val(); 

    if (isNaN(amountNeed) || isNaN(months) || amountNeed === 0 || months === 0) {
        alert("Please enter valid amount and months.");
    } else {
        calculateMonthlyAmount();
        $(".output-img").hide();
        $("#target-amount-output").text(monthlyAmount);
        $("#item").text(userItem);
        $(".text-output").show();
    }
});




//--------------------------------------------------------------------------------------------------------------//
//                                                      Login                        


function login(form,url) {
    var formData = form.serialize();
  
    $.ajax({
      type: 'POST',
      url: url,
      data: formData,
      dataType: 'json',
      success: function(response) {
          if (response.status === 'success') {
            $('.message').html('<p class="message_php">' + response.message + '</p>').css("color", "green");

            setTimeout(function() {
                window.location.href = response.redirect;
            }, 1000);
  
          } else {
            $('.message').html('<p class="message_php">' + response.message + '</p>').css("color", "red");
          }
      },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error);
          alert('An error occurred. Please try again.');
      }
  });
}


$("#login-btn").click(function(e) {

    e.preventDefault();
    var form = $("#login");    
    login(form,"../php/login.php");
     
});

$("#navbar-login-btn").click(function() {
    $(".login-form").show();
});

$("#close-login").click(function(){
    $(".login-form").hide();

});


$("#id01").click(function(event) {

    if ($(event.target).is(".modal")) {
        $(".login-form").hide();
    }
});


//------------------------------------------------------------------------------------------------------------------------------------------------//
//                                                        Register User


function register(form,url) {
    var formData = form.serialize();
  
    $.ajax({
      type: 'POST',
      url: url,
      data: formData,
      dataType: 'json',
      success: function(response) {
          if (response.status === 'success') {
            $('.message').html('<p class="message_php">' + response.message + '</p>').css("color", "green");

            setTimeout(function() {
                window.location.href = "http://localhost/Aplikacje/main/";
            }, 1000);
  
          } else {
            $('.message').html('<p class="message_php">' + response.message + '</p>').css("color", "red");
          }
      },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error);
          alert('An error occurred. Please try again.');
      }
  });
}


$("#create-newaccount-btn").click(function(e) {
    e.preventDefault();
    var form = $("#register-form");
    register(form,"../php/register.php")

});
















//-------------------------------------------------------------------------------------------------------------------------------------------------------------//
//                                                                  Open/Close




$("#close-signup").click(function(){
    $(".signup-form").hide();
});

$("#oper-form-newaccount").click(function(){
    $(".login-form").hide();
    $(".signup-form").show();
});

$("#id02").click(function(event) {

    if ($(event.target).is(".modal")) {
        $(".signup-form").hide();
    } 
});




$("#register-btn").click(function(event) {
    $(".signup-form").addClass("animate")
    $(".signup-form").show();
});

$("#cancel").click(function(){
    $(".signup-form").hide();
});

