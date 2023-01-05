function dataCreate(form, route)
{    
    var formData = new FormData($(form)[0]);

    return $.ajax({
        
        beforeSend: function(){

            $(form).find('button').prop('disabled', true);

            $('.form_box button').prop('disabled', true);

            $('.loader').css("opacity", '1');


        },
        
        complete: function(){

            empty_progress();
            
            $(form).trigger('reset');

            setTimeout(function(){

                $(form).find('button').prop('disabled', false);

            }, 1000);
        
            $('.loader').css("opacity", '0');

            $('.form_box button').prop('disabled', false)
        
        },
        
        type: "POST",
        
        url: route,
        
        data: formData,
        
        processData: false,
        
        contentType: false,

    });

}

$('body').on('submit', '.data_form', function(e) {

    e.preventDefault();
    
    action = $(this).attr("data-action");

    dataCreate(this, action).done(function(data){

        console.log(data);

        var json = $.parseJSON(data);

        if(json.code == 200){
          
            window[json.data.render](json.data);
        }
        else
        {
            messageManagement(json);
        }

    });

});

$('body').on('submit', '.data_post', function(e) {

    e.preventDefault();
    
    post = $(this).attr("data-post");

    dataCreate(this, post).done(function(data){

        var json = $.parseJSON(data);

        if(json.code == 200){
          
            window[json.data.render](json.data);
        }
        else
        {
            messageManagement(json);
        }
    });

});

