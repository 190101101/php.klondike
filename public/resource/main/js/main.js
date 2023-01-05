$(function() {

    var forEach = function(t, o, r) {

        if ("[object Object]" === Object.prototype.toString.call(t))

            for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);

        else

            for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t)

    };

    var hamburgers = document.querySelectorAll(".hamburger");

    if (hamburgers.length > 0) {

        forEach(hamburgers, function(hamburger) {

            hamburger.addEventListener("click", function() {

                this.classList.toggle("is-active");

            }, false);

        });

    }

});


/*sign*/
$(function() {

    $('body').on('click', '#signin', function() {

        $('.signinform').show();

    });

});

$(function() {

    $('.content').on('click', function() {

        $('.signinform').hide();

    });

});


$('#autoresizing').keypress(function(){
    if(this.scrollHeight < 200){

        this.style.height = 'auto';

        this.style.height = this.scrollHeight + 'px';
    }

});


$(function() {

    var all = $('.story-content-menu .nav li a');

    $('.story-content-menu .nav li a').on('click', function() {

        $(all).removeClass('nav-active');

        $(this).toggleClass('nav-active');

    });

});

$(function() {

    $('.toggle-btn').on('click', function() {

        $('.nav-logo').toggleClass('nav-logo-img-content');

        $('.sidebar').toggleClass('active');

        $('.footer').toggleClass('hiddenfooter');

        $("body").toggleClass('no-scroll');

    });

});

function chat_scroll() {

    var scroll = $('.chat-content-box');

    scroll.scrollTop(scroll.prop('scrollHeight'));

}

chat_scroll();

function downloadprogress() {

    $('#down').hide();

    $('.downloadtimer').show();

    $('.timer_box').css('display','flex');

    let oCount = document.querySelector("div[countdown]");

    oCount.innerText = oCount.countValue = +oCount.getAttribute("countdown");

    oCount.countRatio = 360 / oCount.countValue;

    oCount.countColor = 100 / oCount.countValue;

    oCount.countLight = oCount.countValue / 20;

    oCount.countTimer = setInterval(fCountdown.bind(oCount), 1000);
    // oCount.countTimer = setInterval(fCountdown.bind(oCount), 10);

    function fCountdown() {

        focused = document.hasFocus();

        if(focused)
        {
            let nCount = this.countValue;

            if (nCount > 0) {

                nCount--;

                this.innerText = this.countValue = nCount;

                this.style.setProperty("--deg", 361 - nCount * this.countRatio);

                this.style.setProperty("--col", `hsla(${nCount * this.countColor}, 100%, ${50 - nCount / this.countLight}%, 1)`);

            } else {

                clearInterval(this.countTimer);

                console.log("Complete " + this.getAttribute('countdown'));

            }
            
            console.log(nCount);

            if(nCount == 0)
            {
                var download_url = $('.downloadtimer').attr("data-download");
                
                $(location).attr('href', download_url);

                $('.downloadtimer').hide();

                $('.timer_box').hide()

                $('#down').show();
            }
        }

    }
}
