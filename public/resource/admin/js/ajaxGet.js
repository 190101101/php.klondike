function ajaxGet(url)
{
    return $.ajax({
        
        beforeSend: function(){
        
            $('.loader').css("opacity", '1');
        
        },
        
        type: 'GET',
        
        url: url,
        
        complete: function(){
            
            $('.loader').css("opacity", '0');

        }
    });
}

$('body').on('click', '.this-del', function() {

    $(this).parents('.table-media tr').hide();

    url = $(this).attr("data-del");

    ajaxGet(url).done(function(data){

        console.log(data);

        messageManagement(JSON.parse(data));

    });

});

$('body').on('click', '.this-delete', function() {

    hide = $(this).parents('.table-media tr');

    url = $(this).attr("data-del");

    alertify.confirm('вы уверены что хотите удалить???', function(){ 

        hide.hide();

        ajaxGet(url).done(function(data){

            console.log(data);

            messageManagement(JSON.parse(data));

            $('#history_html').html();
            
            close_history();

        });
    });

});

$('body').on('click', '.data-get', function(e) {

    arg = this;

    get = $(arg).attr("data-get");

    ajaxGet(get).done(function(data){

        console.log(data);
        
        var json = $.parseJSON(data);

        if(json.code == 200)
        {
            window[json.data.render](json.data, arg);
        }
    });
});
