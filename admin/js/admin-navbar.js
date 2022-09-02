// Script for menu-bar tab selection
$(document).ready(function() {
    if ((document.URL.indexOf('admin.php') != -1)) {
        $('#adminhome').css('color', 'white')
    } else if ((document.URL.indexOf('quiz.php') != -1) || (document.URL.indexOf('question.php') != -1) || (document.URL.indexOf('sport.php') != -1)) {
        $('#quizmgt').css('color', 'white')
    } else if ((document.URL.indexOf('sponsor.php') != -1) || (document.URL.indexOf('sponsordisplay.php') != -1)) {
        $('#sponsormgt').css('color', 'white')
    } else if ((document.URL.indexOf('prize.php') != -1) || (document.URL.indexOf('prizesdisplay.php') != -1)) {
      $('#prizemgt').css('color', 'white')
    } else if ((document.URL.indexOf('winner.php') != -1) || (document.URL.indexOf('winnersdisplay.php') != -1)) {
      $('#winnermgt').css('color', 'white')
    }
})
