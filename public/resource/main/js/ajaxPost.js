function ajaxPost(form, route)
{    
    var formData = new FormData($(form)[0]);

    return $.ajax({
        
        beforeSend: function(){
        
            $('.loader').css("opacity", '1');

            $(form).find('button').prop('disabled', true);

        },
        
        complete: function(){

            setTimeout(function(){

                $(form).find('button').prop('disabled', false);

            }, 1000);

            $(form).trigger('reset');
        
            $('.loader').css("opacity", '0');
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

    ajaxPost(this, action).done(function(data){

        var json = $.parseJSON(data);
  
        if(json.code == 200) {
            
            window[json.data.render](json.data);
        }
    });

});