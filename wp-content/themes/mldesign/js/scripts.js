$(document).ready(function() {
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
});