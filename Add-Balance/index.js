$("#open-navbar-menu").click(function(){
    $(".menu-components").show();

});


$("#close-menu-drop").click(function() {
    $(".menu-components").hide();
});






$("#other").click(function() {
    $(".modal").show();
    $("#income-type").text("Other");

});


$("#bank").click(function() {
    $(".modal").show();
    $("#income-type").text("Bank Interest");

});


$("#ebay").click(function() {
    $(".modal").show();
    $("#income-type").text("Ebay");

});


$("#salary").click(function() {
    $(".modal").show();
    $("#income-type").text("Salary");

});



$('input[name="addComment"]').change(function() {
    if ($('#commentYes').is(':checked')) {
        $('#comment-section').css('display', 'flex');
        
    } else {
        $('#comment-section').css('display', 'none');
    }

});


$(".balance").click(function(event) {
   
    event.preventDefault(); 
  
    window.location.href = "http://localhost/Aplikacje/Balance/";
  
});



$(".main-menu").click(function(event) {
   
    event.preventDefault(); 
  
    window.location.href = "http://localhost/Aplikacje/main/";
  
});


$(".add-expenses").click(function(event) {
   
    event.preventDefault(); 
  
    window.location.href = "http://localhost/Aplikacje/Add-Expense/";
  
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


$('#addIncomeForm').on('submit', function(e) {
    e.preventDefault(); 

    $.ajax({
        url: '../php/addIncome.php', 
        type: 'POST',
        data: $(this).serialize(), 
        success: function(response) {
            let jsonResponse = JSON.parse(response);

            if (jsonResponse.status === 'success') {
                console.log("Success:", jsonResponse.message);
                $('#form-message').html('<p class="message_php">' + jsonResponse.message + '</p>').css("color","green");
            } else {
                console.log("Error:", jsonResponse.message);
                $('#form-message').html('<p class="message_php id = "form-message">' + jsonResponse.message + '</p>').css("color","red");
            }       
        },
        error: function(xhr, status, error) {
            let errorMessage = 'Error adding income: ' + xhr.status + ' ' + xhr.statusText;
            $('#form-message').html('<p class="message_php">' + errorMessage + '</p>').css("color", "red");
        }
    });
});

    

$("#close-modal-btn").click(function(e) {
    e.preventDefault();
    $(".modal").hide();
    $('#addIncomeForm')[0].reset();
    $('#form-message').html('');  
});
