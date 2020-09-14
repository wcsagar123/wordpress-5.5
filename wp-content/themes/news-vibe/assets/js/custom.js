jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader                  = $('#loader');
    var loader_container        = $('#preloader');
    var scroll                  = $(window).scrollTop();  
    var scrollup                = $('.backtotop');
    var primary_menu_toggle     = $('#masthead .menu-toggle');
    var top_menu_toggle         = $('#top-navigation .menu-toggle');
    var dropdown_toggle         = $('button.dropdown-toggle');
    var primary_nav_menu        = $('#masthead .main-navigation');
    var top_nav_menu            = $('#top-navigation .main-navigation');
    var breaking_news_slider    = $('.breaking-news-slider');
    var featured_slider         = $('.featured-slider');
    var posts_slider            = $('.posts-slider');
    var recipe_slider           = $('.recipe-slider');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");
    
/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    primary_menu_toggle.click(function(){
        primary_nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('#masthead .main-navigation').toggleClass('menu-open');
    });

    top_menu_toggle.click(function(){
        top_nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('#top-navigation .main-navigation').toggleClass('menu-open');
        $('#top-navigation').css({ 'z-index' : '30000' });

        if( $('#masthead .menu-toggle').hasClass('active') ) {
            primary_nav_menu.slideUp();
            $('#masthead .main-navigation').removeClass('menu-open');
            $('#masthead .menu-toggle').removeClass('active');
            $('.menu-overlay').toggleClass('active');
        }
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 210) {
            $('#masthead').addClass('nav-shrink');
        } 
        else {
            $('#masthead').removeClass('nav-shrink');
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead, #top-navigation");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            primary_nav_menu.slideUp();
            $(this).removeClass('active');
            $('.menu-overlay').removeClass('active');
            $('#masthead .main-navigation').removeClass('menu-open');
            $('.menu-toggle').removeClass('active');

            top_nav_menu.slideUp();
            $(this).removeClass('active');
            $('.menu-overlay').removeClass('active');
            $('#top-navigation .main-navigation').removeClass('menu-open');
        }
    });

/*------------------------------------------------
            Keyboard Navigation
------------------------------------------------*/
    if( $(window).width() < 1024 ) {
        $('#masthead .nav-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('button.menu-toggle').focus();
            }
        });
    }
    else {
        $('#masthead .nav-menu li').last().unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $('#masthead .nav-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('button.menu-toggle').focus();
                }
            });
        }
        else {
            $('#masthead .nav-menu li').last().unbind('keydown');
        }
    });




/*------------------------------------------------
            Sliders
------------------------------------------------*/

breaking_news_slider.slick({
    responsive: [
    {
        breakpoint: 1200,
        settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 900,
        settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

featured_slider.slick();

posts_slider.slick();

recipe_slider.slick();


/*------------------------------------------------
            Sticky Sidebar
------------------------------------------------*/

$('#secondary, #secondary-sidebar').theiaStickySidebar({
    additionalMarginTop: 30
});

/*------------------------------------------------
            Tab Filter
------------------------------------------------*/

$('.widget_posts_filter .widget-title span').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('.widget_posts_filter .widget-title span').removeClass('active');           
    $(this).addClass('active');

    $('.tab-content').hide();
    $( "#"+tab_id ).fadeIn('slow');
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});


