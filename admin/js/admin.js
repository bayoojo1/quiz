// Login function
function login() {
    var e = $('#usrname').val()
    var p = $('#psw').val()
    if (e == '' || p == '') {
        $('#loginstatus').html('<span style="color:red;"><b>Fill out all of the form data</b></span>').fadeOut(20000);
        return false;
    } else {
        $('#logbtn').css('display','none');
            //$("#loginstatus").html('please wait ...');
        $('#loginstatus').html('<span style="color:#004080;">Please wait...</span><img src="../images/loading2.gif" height="30", width="30">');
        var xhttp
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest()
        } else {
            // code for IE6, IE5
            xhttp = new ActiveXObject('Microsoft.XMLHTTP')
        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'login_failed') {
                    $('#loginstatus').html('<span style="color:red;"><b>You did not provide either email or password!</b></span>').fadeOut(20000);
                    $('#logbtn').css('display','block');
                    return false;
                } else if(this.responseText == 'invalid') {
                  $('#loginstatus').html('<span style="color:red;"><b>You are yet to activate your account, or you provided a wrong password!</b></span>').fadeOut(20000);
                  $('#logbtn').css('display','block');
                  return false;
                } else {
                    window.location = 'admin.php?u=' + this.responseText
                }
            }
        }
        xhttp.open('POST', 'index.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send('e=' + e + '&p=' + p)
    }
}

// To bring up the registration modal
$(document).ready(function(){
  $("#regbtn").click(function(){
    $("#regModal").modal();
  });
});

// To bring up the login modal
$(document).ready(function(){
  $("#loginbtn").click(function(){
    $("#myModal").modal();
  });
});

// Function for user registration
function signup(){
    var e = $("#signupusrname").val();
    var p1 = $("#signuppsw").val();
    var p2 = $("#signuppsw1").val();
    var status = $("#regstatus");
    if(e == "" || p1 == "" || p2 == ""){
        status.html('<span style="color:red;"><b>Fill out all of the form data</b></span>').fadeOut(20000);
        return false;
    } else if(p1 != p2){
        status.html('<span style="color:red;"><b>Your password fields do not match</b></span>').fadeOut(20000);
        return false;
    } else {
        $("#signupbtn").css('display','none');
        status.html('Please wait...<img src="../images/loading2.gif" height="30", width="30">');
        var xhttp
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest()
        } else {
            // code for IE6, IE5
            xhttp = new ActiveXObject('Microsoft.XMLHTTP')
        }
        xhttp.onreadystatechange = function() {
            //if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != 'signup_success') {
                    status.html(ajax.responseText).fadeOut(20000);
                    $("#signupbtn").css('display', 'block');
                    return false;
                } else {
                    $("#signupbtn").css('display', 'none');
                    //window.scrollTo(0,0);
                    status.html("<h3>OK, you have successfully registered. Wait for your new account to be activated by the Admin.</h3>");
                }
            //}
        }
        xhttp.open('POST', 'signup.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send('e=' + e + '&p=' + p1)
    }
}
