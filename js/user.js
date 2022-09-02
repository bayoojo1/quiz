$(document).ready(function(){
  $('.demo').slick({
    dots: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
  });
});
$(document).ready(function(){
  $('.single-item').slick({
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 6000,
  });
});
$(document).ready(function(){
  $('.one-time').slick({
    dots: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    touchMove: false
});
});
$(document).on("click", '#myScrollspy li', function(){
$('#myScrollspy li').removeClass('active');
$(this).addClass('active');
});

// Function to load general knowledge monthly top scorers
$(document).ready(function() {
  $('.topScorers').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'userFunctions/topscorers.php',
        success: function(response) {
          if(response != '') {
            $('.topScorers').html(response)
          } else if(response == '') {
            $('.topScorers').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})
// Function to load general knowledge weekly top scorers
$(document).ready(function() {
  $('.generalWeeklyTopScorers').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'userFunctions/generalWeeklytopscorers.php',
        success: function(response) {
          if(response != '') {
            $('.generalWeeklyTopScorers').html(response)
          } else if(response == '') {
            $('.generalWeeklyTopScorers').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})
// Function to load sport monthly top scorers
$(document).ready(function() {
  $('.sportMonthlyTopScorers').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'userFunctions/sportMonthlyTopscorers.php',
        success: function(response) {
          if(response != '') {
            $('.sportMonthlyTopScorers').html(response)
          } else if(response == '') {
            $('.sportMonthlyTopScorers').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})
// Function to load sport weekly top scorers
$(document).ready(function() {
  $('.sportWeeklyTopScorers').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'userFunctions/sportWeeklyTopScorers.php',
        success: function(response) {
          if(response != '') {
            $('.sportWeeklyTopScorers').html(response)
          } else if(response == '') {
            $('.sportWeeklyTopScorers').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})

// Function for general knowledge monthly score search
$(document).ready(function() {
  $('#monthlyscorebtn').click(function(event) {
    event.preventDefault()
    var mobile = $('#monthlyscore').val()
    if(mobile == '') {
      alert('Please provide your mobile number')
      return false;
    }
    $.ajax({
        url: 'userFunctions/g_knowledge_quiz.php',
        type: 'POST',
        data: { mobile: mobile },
        success: function(response) {
          if(response != '') {
            $('#monthlyResult').html('<span style="font-weight:bold; color:white; background-color:black;">'+ response +'</span>');
            $('#monthlyscore').val('')
          } else if(response == '') {
            $('#monthlyResult').html('<span style="font-weight:bold; color:white; background-color:black;">No record of this mobile!</span>');
            $('#monthlyscore').val('')
          }
        }
    })
  })
});

// Function for general knowledge weekly score search
$(document).ready(function() {
  $('#weeklyscorebtn').click(function(event) {
    event.preventDefault()
    var mobile = $('#weeklyscore').val()
    if(mobile == '') {
      alert('Please provide your mobile number')
      return false;
    }
    $.ajax({
        url: 'userFunctions/g_weekly_knowledge_quiz.php',
        type: 'POST',
        data: { mobile: mobile },
        success: function(response) {
          if(response != '') {
            $('#weeklyResult').html('<span style="font-weight:bold; color:white; background-color:black;">'+ response +'</span>');
            $('#weeklyscore').val('')
          } else if(response == '') {
            $('#weeklyResult').html('<span style="font-weight:bold; color:white; background-color:black;">No record of this mobile!</span>');
            $('#weeklyscore').val('')
          }
        }
    })
  })
});
// Function for sport monthly score search
$(document).ready(function() {
  $('#monthlySportscorebtn').click(function(event) {
    event.preventDefault()
    var mobile = $('#monthlySportscore').val()
    if(mobile == '') {
      alert('Please provide your mobile number')
      return false;
    }
    $.ajax({
        url: 'userFunctions/sport_monthly_quiz.php',
        type: 'POST',
        data: { mobile: mobile },
        success: function(response) {
          if(response != '') {
            $('#monthlySportResult').html('<span style="font-weight:bold; color:white; background-color:black;">'+ response +'</span>');
            $('#monthlySportscore').val('')
          } else if(response == '') {
            $('#monthlySportResult').html('<span style="font-weight:bold; color:white; background-color:black;">No record of this mobile!</span>');
            $('#monthlySportscore').val('')
          }
        }
    })
  })
});
// Function for sport weekly score search
$(document).ready(function() {
  $('#weeklySportscorebtn').click(function(event) {
    event.preventDefault()
    var mobile = $('#weeklySportscore').val()
    if(mobile == '') {
      alert('Please provide your mobile number')
      return false;
    }
    $.ajax({
        url: 'userFunctions/sport_weekly_quiz.php',
        type: 'POST',
        data: { mobile: mobile },
        success: function(response) {
          if(response != '') {
            $('#weeklySportResult').html('<span style="font-weight:bold; color:white; background-color:black;">'+ response +'</span>');
            $('#weeklySportscore').val('')
          } else if(response == '') {
            $('#weeklySportResult').html('<span style="font-weight:bold; color:white; background-color:black;">No record of this mobile!</span>');
            $('#weeklySportscore').val('')
          }
        }
    })
  })
});

// Function for score search
$(document).ready(function() {
  $('#scorebtn').click(function(event) {
    event.preventDefault()
    var mobile = $('#mobile').val()
    var category = $('#category').val()
    if(mobile == '') {
      alert('Please provide your mobile number')
      return false;
    }
    $.ajax({
        url: 'userFunctions/score_search.php',
        type: 'POST',
        data: { mobile: mobile, category: category },
        success: function(response) {
          if(response != '') {
            $('#Result').html('<span style="font-weight:bold; color:white; background-color:black;">'+ response +'</span>');
            $('#mobile').val('')
          } else if(response == '') {
            $('#Result').html('<span style="font-weight:bold; color:white; background-color:black;">No record of this mobile!</span>');
            $('#mobile').val('')
          }
        }
    })
  })
});

// Script to display winners
$(document).ready(function() {
  $('.gklmwinner').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'userFunctions/generalKnowledgeLastMonthWinner.php',
        success: function(response) {
          if(response != '') {
            $('.gklmwinner').html(response)
          } else if(response == '') {
            $('.gklmwinner').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})

$(document).ready(function() {
  $('.slmwinner').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'userFunctions/sportLastMonthWinner.php',
        success: function(response) {
          if(response != '') {
            $('.slmwinner').html(response)
          } else if(response == '') {
            $('.slmwinner').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})

$(document).ready(function() {
  $('.gklwwinner').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'userFunctions/generalKnowledgeLastWeekWinner.php',
        success: function(response) {
          if(response != '') {
            $('.gklwwinner').html(response)
          } else if(response == '') {
            $('.gklwwinner').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})

$(document).ready(function() {
  $('.slwwinner').html('Please wait...<img src="images/loading2.gif" height="30", width="30">');
    $.ajax({
        type: 'POST',
        url: 'userFunctions/sportLastWeekWinner.php',
        success: function(response) {
          if(response != '') {
            $('.slwwinner').html(response)
          } else if(response == '') {
            $('.slwwinner').html('<span style="font-weight:bold; color:white; background-color:black;">No record!</span>')
          }
        }
    })
})

$(document).ready(function() {
  $(window).on('load',function(){
        $('#myModal').modal('show');
    });
})

$(document).ready(function(){
  $('.center').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
});
