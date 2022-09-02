function edit(but) {
  // get parent and then first child <div>
  var div0 = but.previousSibling
  var ih = div0.innerHTML // record the text of div
  //alert(ih)

  div0.innerHTML = "<input type='text' />" // insert an input
  div0.firstElementChild.value = ih // set input value

  // now get buttons and change visibility
  but.style.visibility = 'hidden' // edit button
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'hidden'
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
}

function save(but) {
    // get parent and then first child <div>
    var div0 = but.parentNode.firstChild.nextSibling

    update_value(div0.id, div0.firstElementChild.value) // send id and new text to ajax function

    // now Restore back to normal mode
    div0.innerHTML = div0.firstElementChild.value
    but.parentNode.firstChild.nextSibling.nextSibling.style.visibility = 'visible'
    but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
    but.style.visibility = 'hidden'
}

function update_value(id, value) {
    var xhttp
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest()
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject('Microsoft.XMLHTTP')
    }
    xhttp.open('GET', 'functions/editvalue.php?id=' + id + '&value=' + value + '&status=Save', true)
    xhttp.send(null)
        // console.log(status);
}

function delete_question(but) {
  var conf = confirm('Are you sure you want to delete this question?')
  if (conf != true) {
      return false;
  }
  id = but.parentNode.firstChild.nextSibling.id
  realID = id.split('_')[1]
  $.ajax({
      url: 'functions/deletevalue.php',
      type: 'POST',
      data: { realID: realID },
  })
}

$(document).ready(function() {
  if ((document.URL.indexOf('question.php') != -1)) {
      $('#quizmgt').css('color', 'white')
  }
})

/*===Functions for editing sport questions and answers starts here.*/
function editsport(but) {
  // get parent and then first child <div>
  var div0 = but.previousSibling
  var ih = div0.innerHTML // record the text of div
  //alert(ih)


  div0.innerHTML = "<input type='text' />" // insert an input
  div0.firstElementChild.value = ih // set input value

  // now get buttons and change visibility
  but.style.visibility = 'hidden' // edit button
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'hidden'
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
}

function savesport(but) {
    // get parent and then first child <div>
    var div0 = but.parentNode.firstChild.nextSibling

    update_sport_value(div0.id, div0.firstElementChild.value) // send id and new text to ajax function

    // now Restore back to normal mode
    div0.innerHTML = div0.firstElementChild.value
    but.parentNode.firstChild.nextSibling.nextSibling.style.visibility = 'visible'
    but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
    but.style.visibility = 'hidden'
}

function update_sport_value(id, value) {
    var xhttp
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest()
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject('Microsoft.XMLHTTP')
    }
    xhttp.open('GET', 'functions/editsportvalue.php?id=' + id + '&value=' + value + '&status=Save', true)
    xhttp.send(null)
        // console.log(status);
}

function delete_sport_question(but) {
  var conf = confirm('Are you sure you want to delete this question?')
  if (conf != true) {
      return false;
  }
  id = but.parentNode.firstChild.nextSibling.id
  realID = id.split('_')[1]
  $.ajax({
      url: 'functions/deletesportvalue.php',
      type: 'POST',
      data: { realID: realID },
  })
}
/*=========== Ends Here==========*/

/*===Functions for editing science questions and answers starts here.*/
function editsciences(but) {
  // get parent and then first child <div>
  var div0 = but.previousSibling
  var ih = div0.innerHTML // record the text of div
  //alert(ih)


  div0.innerHTML = "<input type='text' />" // insert an input
  div0.firstElementChild.value = ih // set input value

  // now get buttons and change visibility
  but.style.visibility = 'hidden' // edit button
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'hidden'
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
}

function savesciences(but) {
    // get parent and then first child <div>
    var div0 = but.parentNode.firstChild.nextSibling

    update_science_value(div0.id, div0.firstElementChild.value) // send id and new text to ajax function

    // now Restore back to normal mode
    div0.innerHTML = div0.firstElementChild.value
    but.parentNode.firstChild.nextSibling.nextSibling.style.visibility = 'visible'
    but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
    but.style.visibility = 'hidden'
}

function update_science_value(id, value) {
    var xhttp
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest()
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject('Microsoft.XMLHTTP')
    }
    xhttp.open('GET', 'functions/editsciencesvalue.php?id=' + id + '&value=' + value + '&status=Save', true)
    xhttp.send(null)
        // console.log(status);
}

function delete_science_question(but) {
  var conf = confirm('Are you sure you want to delete this question?')
  if (conf != true) {
      return false;
  }
  id = but.parentNode.firstChild.nextSibling.id
  realID = id.split('_')[1]
  $.ajax({
      url: 'functions/deletesciencevalue.php',
      type: 'POST',
      data: { realID: realID },
  })
}
/*=========== Ends Here==========*/

/*===Functions for editing social science or arts questions and answers starts here.*/
function editsocial(but) {
  // get parent and then first child <div>  var div0 = but.previousSibling
  var div0 = but.previousSibling
  var ih = div0.innerHTML // record the text of div
  //alert(ih)


  div0.innerHTML = "<input type='text' />" // insert an input
  div0.firstElementChild.value = ih // set input value

  // now get buttons and change visibility
  but.style.visibility = 'hidden' // edit button
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'hidden'
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
}

function savesocial(but) {
    // get parent and then first child <div>
    var div0 = but.parentNode.firstChild.nextSibling

    update_social_value(div0.id, div0.firstElementChild.value) // send id and new text to ajax function

    // now Restore back to normal mode
    div0.innerHTML = div0.firstElementChild.value
    but.parentNode.firstChild.nextSibling.nextSibling.style.visibility = 'visible'
    but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
    but.style.visibility = 'hidden'
}

function update_social_value(id, value) {
    var xhttp
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest()
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject('Microsoft.XMLHTTP')
    }
    xhttp.open('GET', 'functions/editsocialvalue.php?id=' + id + '&value=' + value + '&status=Save', true)
    xhttp.send(null)
        // console.log(status);
}

function delete_social_question(but) {
  var conf = confirm('Are you sure you want to delete this question?')
  if (conf != true) {
      return false;
  }
  id = but.parentNode.firstChild.nextSibling.id
  realID = id.split('_')[1]
  $.ajax({
      url: 'functions/deletesocialvalue.php',
      type: 'POST',
      data: { realID: realID },
  })
}
/*=========== Ends Here==========*/

/*===Functions for editing commercial questions and answers starts here.*/
function editcommercial(but) {
  // get parent and then first child <div>  var div0 = but.previousSibling
  var div0 = but.previousSibling
  var ih = div0.innerHTML // record the text of div
  //alert(ih)


  div0.innerHTML = "<input type='text' />" // insert an input
  div0.firstElementChild.value = ih // set input value

  // now get buttons and change visibility
  but.style.visibility = 'hidden' // edit button
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'hidden'
  but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
}

function savecommercial(but) {
    // get parent and then first child <div>
    var div0 = but.parentNode.firstChild.nextSibling

    update_commercial_value(div0.id, div0.firstElementChild.value) // send id and new text to ajax function

    // now Restore back to normal mode
    div0.innerHTML = div0.firstElementChild.value
    but.parentNode.firstChild.nextSibling.nextSibling.style.visibility = 'visible'
    but.parentNode.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
    but.style.visibility = 'hidden'
}

function update_commercial_value(id, value) {
    var xhttp
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest()
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject('Microsoft.XMLHTTP')
    }
    xhttp.open('GET', 'functions/editcommercialvalue.php?id=' + id + '&value=' + value + '&status=Save', true)
    xhttp.send(null)
        // console.log(status);
}

function delete_commercial_question(but) {
  var conf = confirm('Are you sure you want to delete this question?')
  if (conf != true) {
      return false;
  }
  id = but.parentNode.firstChild.nextSibling.id
  realID = id.split('_')[1]
  $.ajax({
      url: 'functions/deletecommercialvalue.php',
      type: 'POST',
      data: { realID: realID },
  })
}
/*=========== Ends Here==========*/
