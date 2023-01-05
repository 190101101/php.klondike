function ajaxPost(url)
{
    return $.ajax({
        
        beforeSend: function(){
        
            $('.loader').css("opacity", '1');
        
        },
        
        type: 'POST',
        
        url: url,
        
        complete: function(){
            
            $('.loader').css("opacity", '0');

        }
    });
}


$('body').on('click', '.this-status', function() {

    ajaxPost($(this).attr("data-status")).done(function(data){

        messageManagement(JSON.parse(data));

    });

});

