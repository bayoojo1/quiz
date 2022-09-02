// Script to display winners
$(document).ready(function() {
  $('.admgklmwinner').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'functions/adm_generalKnowledgeLastMonthWinner.php',
        success: function(response) {
          if(response != '') {
            $('.admgklmwinner').html(response)
          } else if(response == '') {
            $('.admgklmwinner').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})

$(document).ready(function() {
  $('.admslmwinner').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'functions/adm_sportLastMonthWinner.php',
        success: function(response) {
          if(response != '') {
            $('.admslmwinner').html(response)
          } else if(response == '') {
            $('.admslmwinner').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})

$(document).ready(function() {
  $('.admgklwwinner').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'functions/adm_generalKnowledgeLastWeekWinner.php',
        success: function(response) {
          if(response != '') {
            $('.admgklwwinner').html(response)
          } else if(response == '') {
            $('.admgklwwinner').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})

$(document).ready(function() {
  $('.admslwwinner').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'functions/adm_sportLastWeekWinner.php',
        success: function(response) {
          if(response != '') {
            $('.admslwwinner').html(response)
          } else if(response == '') {
            $('.admslwwinner').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})
