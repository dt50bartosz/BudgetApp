$("#open-navbar-menu").click(function(){
    $(".menu-components").show();

});


$("#close-menu-drop").click(function() {
    $(".menu-components").hide();
});





$('input[name="addComment"]').change(function() {
    if ($('#commentYes').is(':checked')) {
        $('#comment-section').css('display', 'flex');
        
    } else {
        $('#comment-section').css('display', 'none');
    }

});


$("#food").click(function() {
    $(".modal").show();
    $("#income-type").text("Food");
});

$("#rent").click(function() {
    $(".modal").show();
    $("#income-type").text("Rent");
});

$("#transport").click(function() {
    $(".modal").show();
    $("#income-type").text("Transport");
});

$("#telephone").click(function() {
    $(".modal").show();
    $("#income-type").text("Telephone");
});

$("#health-care").click(function() {
    $(".modal").show();
    $("#income-type").text("Health Care");
});

$("#clothes").click(function() {
    $(".modal").show();
    $("#income-type").text("Clothes");
});

$("#hygiene").click(function() {
    $(".modal").show();
    $("#income-type").text("Hygiene");
});

$("#family").click(function() {
    $(".modal").show();
    $("#income-type").text("Family");
});

$("#entertainment").click(function() {
    $(".modal").show();
    $("#income-type").text("Entertainment");
});

$("#vacation").click(function() {
    $(".modal").show();
    $("#income-type").text("Vacation");
});

$("#books").click(function() {
    $(".modal").show();
    $("#income-type").text("Books");
});

$("#savings").click(function() {
    $(".modal").show();
    $("#income-type").text("Savings");
});

$("#retirement-plan").click(function() {
    $(".modal").show();
    $("#income-type").text("Retirement Plan");
});

$("#debts").click(function() {
    $(".modal").show();
    $("#income-type").text("Debts");
});

$("#charity").click(function() {
    $(".modal").show();
    $("#income-type").text("Charity");
});

$("#other").click(function() {
    $(".modal").show();
    $("#income-type").text("Other");
});



$(".balance").click(function(event) {
   
    event.preventDefault(); 
  
    window.location.href = "http://localhost/Aplikacje/Balance/";
  
});

$(".main-menu").click(function(event) {
 
    event.preventDefault(); 
    
    window.location.href = "http://localhost/Aplikacje/main/";
    
});
    
    
$(".add-income").click(function(event) {
    
    event.preventDefault(); 
    
    window.location.href = "http://localhost/Aplikacje/Add-Balance/";
    
});
    
    

    





$('.option').click(function() {
    var incomeType = $(this).find('p').text();
    $('#income-type').text(incomeType);
    $('<input>').attr({
        type: 'hidden',
        name: 'income_type',
        value: incomeType
    }).appendTo('form');
});

$('#addExpenseForm').on('submit', function(e) {
    e.preventDefault(); 
    $.ajax({
        url: '../php/addExpense.php', 
        type: 'POST',
        data: $(this).serialize(), 
        success: function(response) {
            let jsonResponse = JSON.parse(response);

            if (jsonResponse.status === 'success') {
                $('#form-message').html('<p class="message_php">' + jsonResponse.message + '</p>').css("color","green");
            } else {
                $('#form-message').html('<p class="message_php" id="form-message">' + jsonResponse.message + '</p>').css("color","red");
            }         
            
        },
        error: function(xhr, status, error) {
            console.log("error:", error);
            let errorMessage = 'Error adding expense: ' + xhr.status + ' ' + xhr.statusText;
            $('#form-message').html('<p class="message_php">' + errorMessage + '</p>').css("color", "red");
        }
    });
});


$("#close-modal-btn").click(function(e) {
    e.preventDefault();
    $(".modal").hide();
    $('#addExpenseForm')[0].reset();
    $('#form-message').html('<p class="message_php"> </p>');  
    
});
