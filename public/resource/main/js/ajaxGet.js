function ajaxGet(url)
{
    return $.ajax({
        
        beforeSend: function(){
            
            $('.data-get').prop('disabled', true);
        
            $('.loader').css("opacity", '1');
        
        },
        
        type: 'GET',
        
        url: url,
        
        complete: function(){

            setTimeout(function(){

                $('.data-get').prop('disabled', false);
                
            }, 1000);
            
            $('.loader').css("opacity", '0');

        }
    });
}

$('body').on('click', '.data-get', function(e) {

    arg = this;

    get = $(arg).attr("data-get");

    ajaxGet(get).done(function(data){

        // console.log(data);
        
        var json = $.parseJSON(data);

        if(json.code == 200)
        {
            window[json.data.render](json.data, arg, json.code);
        }
    });

});

