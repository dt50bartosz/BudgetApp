var newDate1;
var newDate2;



//--------------------------------------------------------------------------------------------------------------------------//
//                                                Display Transaction



function submitForm(form, url) {
  var formData = $(form).serialize();

  $.ajax({
      type: 'POST',
      url: url,
      data: formData,
      dataType: 'json',
      success: function(response) {
          if (response.status === 'success') {
              updateTransactionTable(response.data.transactions);
              displayTotals(response.data.totals);       
              createPieChart(response.data.chartData); 
          } else {
              alert('No transactions found for the selected criteria.');
          }
      },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error);
          alert('An error occurred. Please try again.');
      }
  });
}


$("#update-table").on('submit', function(e) {
  e.preventDefault();
  submitForm(this,'../php/balance.php');
});


//-----------------------------------------------------------------------------------------------------------------------------------------------------//

//                                                            Delete Transaction                                                                      //



function deleteTransaction(form,url) {
  var formData = form.serialize();

  $.ajax({
    type: 'POST',
    url: url,
    data: formData,
    dataType: 'json',
    success: function(response) {
        if (response.status === 'success') {
          $('#delete-message').html('<p class="message_php">' + response.message + '</p>').css("color", "green");

        } else {
          $('#delete-message').html('<p class="message_php">' + response.message + '</p>').css("color", "red");
        }
    },
    error: function(xhr, status, error) {
        console.error('AJAX error:', status, error);
        alert('An error occurred. Please try again.');
    }
});

}

$("#transactionsTable").on('click', '#delete', function() {

  $("#id03").show();

  let transactionId = $(this).closest('.action').attr('id');
  let transactionType = $(this).closest('.action').attr('type');

  if(transactionType === "expense") {
    transactionType = "expenses"
  }

  $("#delete-form").append(`
    <input type="hidden" name="transaction_id" value="${transactionId}">
    <input type="hidden" name="transaction_type" value="${transactionType}">
  `);
});

$("#delete-btn").click(function(e) {
  e.preventDefault();
  var form = $("#delete-form");
  var update_table = $("#update-table");
  
  deleteTransaction(form,"../php/delete.php");

  //update table
  submitForm(update_table,'../php/balance.php');
  

})

//---------------------------------------------------------------------------------------------------------------------------------------------------//
//                                                      Update Transaction 

function submitEditForm(form, url) {
    var formData = $(form).serialize();


  $.ajax({
    type: 'POST',
    url: url,
    data: formData,
    dataType: 'json',
    success: function(response) { 
      if (response.status === 'success') {
        $('#edit-message').html('<p class="message_php">' + response.message + '</p>').css("color", "green");
      } else {
        $('#edit-message').html('<p class="message_php" id="form-message">' + response.message + '</p>').css("color", "red");
      }                    
    },
    error: function(xhr, status, error) {
      console.error('AJAX error:', status, error);
      $('#edit-message').text('An error occurred.').css('color', 'red');
    }
  });
}

function updateTransactionTable(transactions) {
  $("#transactionsTable").find("tr:gt(0)").remove();

  transactions.forEach(function(transaction) {
      $("#transactionsTable").append(
          `<tr>
              <td>${transaction.type}</td>
              <td>${transaction.method}</td>
              <td>${transaction.date}</td>
              <td>${transaction.amount}</td>
              <td>${transaction.category}</td>
              <td>${transaction.comment}</td>
              <td><p class="action"  id ="${transaction.idTransaction}" type="${transaction.type}" style="cursor: pointer; display: inline-flex; align-items: center;">
        <span><i id = "edit" class="fa-solid fa-pen"></i></span><i id = "delete" class="fa-solid fa-trash"></i></p></td>
          </tr>`
      );
      
  });
}

function displayTotals(totals) {
  $('#totalIncome').text(totals.totalIncome); 
  $('#totalExpenses').text(totals.totalExpenses);

}


$("#transactionsTable").on('click', '#edit', function() {

  $("#id02").show();

  let transactionId = $(this).closest('.action').attr('id'); 
  let transactionType = $(this).closest('.action').attr('type');

  if(transactionType === "expense") {
    transactionType = "expenses"
  }

  $("#edit-form").append(`
    <input type="hidden" name="transaction_id" value="${transactionId}">
    <input type="hidden" name="transaction_type" value="${transactionType}">
  `);
});

$("#save-changes-btn").click( function(e) {

  var form = $("#edit-form");
  var update_form = $("#update-table");

  e.preventDefault();
  
  submitEditForm(form, "../php/update_transaction.php");
  // update transaction table //
  submitForm(update_form,'../php/balance.php');
});



$("#cancel-btn").click(function(e){
  e.preventDefault();
  $("#edit-form")[0].reset();
  $(".modal").hide();
});


$(".edit").click(function(){
  $("#edit-form")[0].reset();

});



// --------------------------------------------------------------------------------------------------------------------// 
//                                   Document Ready 


$(document).ready(function() {
  var currentDate = new Date();
  var year = currentDate.getFullYear();
  var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
  var day = ("0" + currentDate.getDate()).slice(-2);
  var dayOne = "01";
  var formattedDate = year + '-' + month + '-' + day;
  var formattedDate2 = year + '-' + month + '-' + dayOne;

  $('#current-date').val(formattedDate);
  $('#first-day').val(formattedDate2);

  newDate1 = formattedDate2; 
  newDate2 = formattedDate;
  
  
 
});

$(document).ready(function() {
var form = $("#update-table");
submitForm(form,"../php/balance.php")
});


//------------------------------------------------------------------------------------------------------------------------------------//
//                                          Pie-Chart

function generateCategoryColors(categories) {
  var predefinedColors = {
      'Incomes': 'green',  
      'Expenses': 'red'
  };

  var colors = categories.map(function(category) {
      
      if (predefinedColors[category]) {
          return predefinedColors[category];
      }
     
      return '#' + ('000000' + Math.floor(Math.random() * 16777215).toString(16)).slice(-6);
  });

  return colors;
}

function createPieChart(chartData) {
  const categories = Object.keys(chartData);  
  const amounts = Object.values(chartData);   

  var ctx = document.getElementById('myChart').getContext('2d');

  var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: categories,  
          datasets: [{
              data: amounts,  
              backgroundColor: generateCategoryColors(categories) 
          }]
      },
      options: {
          responsive: true,
          title: {
              display: true,
              text: 'Transaction Categories Breakdown'
          }
      }
  });
}

$("#display-piechart").click(function() {
  $("#id01").show();
});


//---------------------------------------------------------------------------------------------------------------------//
//                                Open/Close



$("#open-navbar-menu").click(function(){
  $(".menu-components").show();

});


$("#close-menu-drop").click(function() {
  $(".menu-components").hide();
});





$("#current-date").on('change', function(){
 
newDate1 = $(this).val();

});


$("#first-day").on('change',function(){
newDate2 = $(this).val(); 

});


$(".close-modal").click(function(e){
e.preventDefault();
$(".modal").hide();
$(".message").html(" "); 

});


//-----------------------------------------------------------------------------------------------------------------//
//                                             Links                                                               // 

$(".main-menu").click(function(event) {
 
event.preventDefault(); 

window.location.href = "http://localhost/Aplikacje/main/";

});


$(".add-income").click(function(e) {
  e.preventDefault();
  window.location.href = "http://localhost/Aplikacje/Add-Balance/";

});

$(".add-expense").click(function(e) {
  e.preventDefault();
  window.location.href = "http://localhost/Aplikacje/Add-Expense/";

});

