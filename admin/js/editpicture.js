function editwinner(but) {
  div0 = but.parentNode.previousSibling.previousSibling
  ih = div0.innerHTML // The text of the div

  div0.innerHTML = "<input style='color:black' type='text' />" // insert an input
  div0.firstElementChild.value = ih // set input value

  // now get buttons and change visibility
  but.style.visibility = 'hidden' // edit button
  but.parentNode.firstElementChild.nextSibling.nextSibling.style.visibility = 'visible'
  but.parentNode.firstElementChild.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'hidden'
}

function editsponsor(but) {
  div0 = but.parentNode.previousSibling.previousSibling
  ih = div0.innerHTML // The text of the div

  div0.innerHTML = "<input style='color:black' type='text' />" // insert an input
  div0.firstElementChild.value = ih // set input value

  // now get buttons and change visibility
  but.style.visibility = 'hidden' // edit button
  but.parentNode.firstElementChild.nextSibling.nextSibling.style.visibility = 'visible'
  but.parentNode.firstElementChild.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'hidden'
}

function editprize(but) {
  div0 = but.parentNode.previousSibling.previousSibling
  ih = div0.innerHTML // The text of the div

  div0.innerHTML = "<input style='color:black' type='text' />" // insert an input
  div0.firstElementChild.value = ih // set input value

  // now get buttons and change visibility
  but.style.visibility = 'hidden' // edit button
  but.parentNode.firstElementChild.nextSibling.nextSibling.style.visibility = 'visible'
  but.parentNode.firstElementChild.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'hidden'
}

function save(but) {
  var div0 = but.parentNode.previousSibling.previousSibling
  //alert(div0.firstElementChild.value)

  update_value(div0.id, div0.firstElementChild.value) // send id and new text to ajax function

  // now Restore back to normal mode
  div0.innerHTML = div0.firstElementChild.value
  but.parentNode.firstElementChild.style.visibility = 'visible'
  but.parentNode.firstElementChild.nextSibling.nextSibling.nextSibling.nextSibling.style.visibility = 'visible'
  but.parentNode.firstElementChild.nextSibling.nextSibling.style.visibility = 'hidden'
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
    xhttp.open('GET', 'functions/editpixdesc.php?id=' + id + '&value=' + value + '&status=Save', true)
    xhttp.send(null)
        // console.log(status);
}

function deleteBanner(but) {
  var conf = confirm('Are you sure you want to delete this banner?')
  if (conf != true) {
      return false;
  }
  id = but.parentNode.previousSibling.previousSibling.id
  $.ajax({
      url: 'functions/deletebanners.php',
      type: 'POST',
      data: { id: id },
  })

}
