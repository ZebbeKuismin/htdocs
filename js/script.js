$(document).ready(function(){
    $(".dropdown-button").dropdown();
    $(".thread-col").click(function() {
            window.document.location = $(this).data("href");
            console.log('click');
    });
    $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 1000, // Creates a dropdown of 15 years to control year
            min: new Date(1900,0,1),
            max: new Date()
    });
    $('#login-button').click(function(){
        var dataArray = $('#login-form').serializeArray(),
        len = dataArray.length,
        dataObj = {};
        for(i=0; i<len; i++) {
            dataObj[dataArray[i].name] = dataArray[i].value;
        }
        $.ajax({
            url: "/php/login.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: { username:dataObj['username'],password:dataObj['password']}, // data sent to php file
            //data: {pass:"passwordText",oldPass:"oldPass"}
            success: function(data)   // A function to be called if request succeeds
            {
                if(data=='success')
                {
                    location.reload();
                }
            }
        });
    });
    $('#signup-button').click(function(){
        console.log('sign up');
        var dataArray = $('#signup-form').serializeArray(),
        len = dataArray.length,
        dataObj = {};
        for(i=0; i<len; i++) {
            dataObj[dataArray[i].name] = dataArray[i].value;
        }
        $.ajax({
            url: "/php/signup.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: { username:dataObj['username'],password:dataObj['password'],email:dataObj['email'],confirm_password:dataObj['confirm_password'],birthday:dataObj['birthday']}, // data sent to php file
            //data: {pass:"passwordText",oldPass:"oldPass"}
            success: function(data)   // A function to be called if request succeeds
            {
                if(data=='success')
                {
                    location.reload();
                }
            }
        });
    });
    $(".button-collapse").sideNav();
    $('.logout').click(function(){
        $.ajax({
            url: "/php/logout.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: {}, // data sent to php file
            success: function(data)   // A function to be called if request succeeds
            {
                location.reload();
            }
        });
    });
    $('#user-search-button').click(function(){
        if($('#user-search-bar').val()!="")
        {
            location.search="username="+$('#user-search-bar').val();
        }
    });
    $('#user-search-bar').keydown(function (e) {
        if (e.keyCode == 13) {
            if($('#user-search-bar').val()!="")
            {
                location.search="username="+$('#user-search-bar').val();
            }
        }
    });
    $('#status').keydown(function (e) {
        if (e.keyCode == 13) {
            if($('#status').val()!="")
            {
                $.ajax({
                    url: "/php/setstatus.php", // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: { status:$('#status').val()
                    }, // data sent to php file
                    //data: {pass:"passwordText",oldPass:"oldPass"}
                    success: function(data)   // A function to be called if request succeeds
                    {
                        if(data=='success')
                        {
                            //location.reload();
                        }
                    }
                });
            }
        }
    });
    $(document).on("click", ".logout", function(){
        $.ajax({
            url: "/php/logout.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: {}, // data sent to php file
            success: function(data)   // A function to be called if request succeeds
            {
                location.reload();
            }
        });
    });
});
