<nav class="navbar fixed-bottom navbar-expand-md navbar-bg-dark navbar-dark">
    <a class="navbar-brand toggle-btn">
        <img src="<?php echo IMAGE; ?>logo.jpg" class="nav-logo" id="logo">
    </a> 
    <a 
    <?php if(user_level() >= 99): ?>
        href="/panel/admin" 
    <?php endif; ?>
        class="navbar-brand logonone">
        <img src="<?php echo IMAGE; ?>wlogo.jpg" class="nav-logo" id="logo">
    </a> 
    <div class="site-head">
        <span>KLONDIKE PROGRAMMER</span>  
        <span>PIRATE COVE FOR DEVELOPERS</span>  
    </div>

    <form action="/search" method="POST" class="search-box">
        <input type="text" name="search" class="search-txt" placeholder="Что ищем?...вкладки, chrome,psd" title="Разрешено использовать только латинские буквы и цифры" minlength="3" maxlength="20">
        <button class="search-btn">
            <img src="<?php echo SVG1; ?>search.svg" class="nav-search-icon">
        </button>
    </form>

    <button class="hamburger hamburger--elastic" id="hamburger" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <div class="hamburger-box ">
            <div class="hamburger-inner"></div>
        </div>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
            <li> 
                <a href="/"> 
                    <img src="<?php echo SVG1; ?>react.svg">
                </a>
            </li>
            <li> 
                <a href="/about"> 
                    <img src="<?php echo SVG1; ?>github.svg">
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    $(function (){
        $('#search_input').keyup(function(e){
           var url = $('#search_input').val();

           if(url.length > 3) {
               $("#search_href").attr("href",  "/search/" + url + '/page/1');
           }
    
           if(e.which == 13 && url.length > 3) {
              $(location).attr('href', "/search/" + url + '/page/1');
           }
        });
    });
</script>
