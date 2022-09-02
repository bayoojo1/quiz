$(document).ready(function() {
    $('#uploadbtn').click(function(event) {
        // stop submit the form, we will post it manually.
        event.preventDefault()
            // Get form
        var form = $('#uploadquestion')[0]
            // Create an FormData object
        var data = new FormData(form)
            // disabled the submit button
        $('#uploadbtn').prop('disabled', true)
          $('#uploadstatus').html('Please wait...<img src="../images/loading2.gif" height="30", width="30">');
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: 'functions/uploadquestions.php',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#uploadstatus').html(data)
                $('#uploadbtn').prop('disabled', false)
            },
            error: function(e) {
                $('#uploadstatus').text(e.responseText)
                    // console.log("ERROR : ", e);
                $('#uploadbtn').prop('disabled', false)
            }
        })
        var form = document.getElementById('uploadquestion')
        form.reset()
    })
})

$(document).ready(function() {
    $('#uploadsportbtn').click(function(event) {
        // stop submit the form, we will post it manually.
        event.preventDefault()
            // Get form
        var form = $('#uploadsportqtn')[0]
            // Create an FormData object
        var data = new FormData(form)
            // disabled the submit button
        $('#uploadsportbtn').prop('disabled', true)
          $('#uploadsportstatus').html('Please wait...<img src="../images/loading2.gif" height="30", width="30">');
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: 'functions/uploadsportquestions.php',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#uploadsportstatus').html(data)
                $('#uploadsportbtn').prop('disabled', false)
            },
            error: function(e) {
                $('#uploadsportstatus').text(e.responseText)
                    // console.log("ERROR : ", e);
                $('#uploadsportbtn').prop('disabled', false)
            }
        })
        var form = document.getElementById('uploadsportqtn')
        form.reset()
    })
})

$(document).ready(function() {
    $('#uploadsciencesbtn').click(function(event) {
        // stop submit the form, we will post it manually.
        event.preventDefault()
            // Get form
        var form = $('#uploadsciencesqtn')[0]
            // Create an FormData object
        var data = new FormData(form)
            // disabled the submit button
        $('#uploadsciencesbtn').prop('disabled', true)
          $('#uploadsciencesstatus').html('Please wait...<img src="../images/loading2.gif" height="30", width="30">');
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: 'functions/uploadsciencequestions.php',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#uploadsciencesstatus').html(data)
                $('#uploadsciencesbtn').prop('disabled', false)
            },
            error: function(e) {
                $('#uploadsciencesstatus').text(e.responseText)
                    // console.log("ERROR : ", e);
                $('#uploadsciencesbtn').prop('disabled', false)
            }
        })
        var form = document.getElementById('uploadsciencesqtn')
        form.reset()
    })
})

$(document).ready(function() {
    $('#uploadsocialtbtn').click(function(event) {
        // stop submit the form, we will post it manually.
        event.preventDefault()
            // Get form
        var form = $('#uploadsocialqtn')[0]
            // Create an FormData object
        var data = new FormData(form)
            // disabled the submit button
        $('#uploadsocialbtn').prop('disabled', true)
          $('#uploadsocialstatus').html('Please wait...<img src="../images/loading2.gif" height="30", width="30">');
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: 'functions/uploadsocialquestions.php',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#uploadsocialstatus').html(data)
                $('#uploadsocialbtn').prop('disabled', false)
            },
            error: function(e) {
                $('#uploadsocialstatus').text(e.responseText)
                    // console.log("ERROR : ", e);
                $('#uploadsocialbtn').prop('disabled', false)
            }
        })
        var form = document.getElementById('uploadsocialqtn')
        form.reset()
    })
})

$(document).ready(function() {
    $('#uploadcommercialbtn').click(function(event) {
        // stop submit the form, we will post it manually.
        event.preventDefault()
            // Get form
        var form = $('#uploadcommercialqtn')[0]
            // Create an FormData object
        var data = new FormData(form)
            // disabled the submit button
        $('#uploadcommercialbtn').prop('disabled', true)
          $('#uploadcommercialstatus').html('Please wait...<img src="../images/loading2.gif" height="30", width="30">');
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: 'functions/uploadcommercialquestions.php',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#uploadcommercialstatus').html(data)
                $('#uploadcommercialbtn').prop('disabled', false)
            },
            error: function(e) {
                $('#uploadcommercialstatus').text(e.responseText)
                    // console.log("ERROR : ", e);
                $('#uploadcommercialbtn').prop('disabled', false)
            }
        })
        var form = document.getElementById('uploadcommercialqtn')
        form.reset()
    })
})
