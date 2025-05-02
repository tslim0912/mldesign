$(document).ready(function() {
    mldesign_body_scrolled();
    $(window).bind('scroll', function() {
        mldesign_body_scrolled();
    });
    $('.parallax-image').each(function () {
        new simpleParallax(this, {
            scale: 1.5,
            orientation: 'up',
            delay: 0.2,
            transition: 'cubic-bezier(0,0,0,1)'
        });
    });

    $('a.fancybox').fancybox();

    $(document).on('click', '#masthead .navbar-toggler', function(e) {
        e.preventDefault();
        var $this = $(this);
        if( $this.hasClass('is-active') ) {
            $this.removeClass('is-active');
        }
        else {
            $this.addClass('is-active');
        }
    });

    var $featureProject;
    if( $('#featured-project-swiper')[0] ) {
        $featureProject = new Swiper('#featured-project-swiper', {
            slidesPerView: 1,
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            loop: true,
            autoplay: {
                delay: 9000,
                disableOnInteraction: false,
            },
            speed: 750,
            pagination: {
                el: '.feature-project-pagination',
                clickable: true,
            }
        });
    }
    
    $('#copyright_year').each(function() {
        var $this = $(this),
            $default = $this.text();
        if( global.copyright_year !== null ) {
            var $current = global.copyright_year;
            if( $current !== $default ) {
                $this.text($current);
            }
        }
    });

    function mldesign_body_scrolled() {
        var scrollTop = $(window).scrollTop();
        if( scrollTop >  70 ) {
            $('body').addClass('scrolled');
        }
        else {
            $('body').removeClass('scrolled');
        }
    }
});