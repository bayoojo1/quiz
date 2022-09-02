// Script to upload sponsor banner
$(document).ready(function() {
    $('#uploadsponsorbtn').click(function(event) {
        // stop submit the form, we will post it manually.
        event.preventDefault()
            // Get form
        var form = $('#uploadSponsor')[0]
            // Create an FormData object
        var data = new FormData(form)
            // disabled the submit button
        $('#uploadsponsorbtn').prop('disabled', true)
          $('#uploadsponsorstatus').html('Please wait...<img src="../images/loading2.gif" height="30", width="30">');
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: 'functions/uploadsponsor.php',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#uploadsponsorstatus').html(data)
                $('#uploadsponsorbtn').prop('disabled', false)
            },
            error: function(e) {
                $('#uploadsponsorstatus').text(e.responseText)
                    // console.log("ERROR : ", e);
                $('#uploadsponsorbtn').prop('disabled', false)
            }
        })
        var form = document.getElementById('uploadSponsor')
        form.reset()
    })
})
// Script to upload prize banner
$(document).ready(function() {
    $('#uploadprizesbtn').click(function(event) {
        // stop submit the form, we will post it manually.
        event.preventDefault()
            // Get form
        var form = $('#uploadPrizes')[0]
            // Create an FormData object
        var data = new FormData(form)
            // disabled the submit button
        $('#uploadprizesbtn').prop('disabled', true)
          $('#uploadprizesstatus').html('Please wait...<img src="../images/loading2.gif" height="30", width="30">');
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: 'functions/uploadprizes.php',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#uploadprizesstatus').html(data)
                $('#uploadprizesbtn').prop('disabled', false)
            },
            error: function(e) {
                $('#uploadprizesstatus').text(e.responseText)
                    // console.log("ERROR : ", e);
                $('#uploadprizesbtn').prop('disabled', false)
            }
        })
        var form = document.getElementById('uploadPrizes')
        form.reset()
    })
})
// Script to upload winner banner
$(document).ready(function() {
    $('#uploadwinnersbtn').click(function(event) {
        // stop submit the form, we will post it manually.
        event.preventDefault()
            // Get form
        var form = $('#uploadWinners')[0]
            // Create an FormData object
        var data = new FormData(form)
            // disabled the submit button
        $('#uploadwinnersbtn').prop('disabled', true)
          $('#uploadwinnersstatus').html('Please wait...<img src="../images/loading2.gif" height="30", width="30">');
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: 'functions/uploadwinners.php',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#uploadwinnersstatus').html(data)
                $('#uploadwinnersbtn').prop('disabled', false)
            },
            error: function(e) {
                $('#uploadwinnersstatus').text(e.responseText)
                    // console.log("ERROR : ", e);
                $('#uploadwinnersbtn').prop('disabled', false)
            }
        })
        var form = document.getElementById('uploadWinners')
        form.reset()
    })
})
