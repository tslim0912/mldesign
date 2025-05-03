$(document).ready(function() {
    if( archive.total_works ) {
        $('.archive-title').append('<sup>'+archive.total_works+'</sup>');
    }

    $(document).on('click', '.filter-list.filter-works .btn.btn-box', function(e) {
        e.preventDefault();
        var $this = $(this),
            $parent = $this.parents('.listing-inner'),
            $loading = $parent.find('.loading'),
            $filter = $this.attr('data-filter'),
            $paged = 1;
        
        $('.filter-list.filter-works .btn.btn-box').removeClass('active');
        $this.addClass('active');
        $.ajax({
            type: "POST",
            url: archive.ajax_url,
            data: {
                action: "mldesign_filtering_works",
                nonce: archive.nonce,
                filter: $filter,
            },
            beforeSend: function() {
                $loading.fadeIn();
            },
            success: function(data) {
                $loading.fadeOut();
                var $response = JSON.parse(data);
                if( $response.status == 1000 || $response.status == 2000 ) {
                    if( $response.status == 1000 ) {
                        $('.listing-body-inner').html($response.html);
                        $('.listing-pagination').html($response.pagination);
                    }
                    else if ( $response.status == 2000 ) {
                        $('.listing-body-inner').html($response.html);
                        $('.listing-pagination').html('');
                    }

                    const params = new URLSearchParams(window.location.search);
                    params.delete('paged');
                    if($filter=='all') {
                        params.delete('type');
                        var newURL = window.location.pathname;
                    }
                    else {
                        params.set('type', $filter);
                        var newURL = window.location.pathname + '?' + params.toString();
                    }
                    history.pushState({ filter: $filter }, '', newURL);
                }
                else {

                }
            },
            error: function(xhr) {
                $loading.fadeOut();
            }
        });
    });
    
    $(document).on('click', '.listing-pagination .archive-pagination .page-numbers', function(e) {
        e.preventDefault();
        var $this = $(this),
            $parent = $this.parents('.listing-inner'),
            $loading = $parent.find('.loading'),
            $filter = $('.filter-list.filter-works .btn.btn-box.active').attr('data-filter'),
            $paged = $this.attr('data-paged');

        $('.listing-pagination .archive-pagination .page-numbers').removeClass('current');
        $this.addClass('current');
        $.ajax({
            type: "POST",
            url: archive.ajax_url,
            data: {
                action: "mldesign_filtering_works",
                nonce: archive.nonce,
                filter: $filter,
                paged: $paged,
            },
            beforeSend: function() {
                $loading.fadeIn();
            },
            success: function(data) {
                $loading.fadeOut();
                var $response = JSON.parse(data);
                if( $response.status == 1000 || $response.status == 2000 ) {
                    var $filter = $response.filter;
                    if( $response.status == 1000 ) {
                        $('.listing-body-inner').html($response.html);
                        $('.listing-pagination').html($response.pagination);
                    }
                    else if ( $response.status == 2000 ) {
                        $('.listing-body-inner').html($response.html);
                        $('.listing-pagination').html('');
                    }
                    const params = new URLSearchParams(window.location.search);

                    if ($filter === 'all') {
                      params.delete('type');
                    } else {
                      params.set('type', $filter);
                    }
                    
                    if ($paged > 1) {
                      params.set('paged', $paged);
                    } else {
                      params.delete('paged');
                    }
                    
                    const newUrl = `${window.location.pathname}?${params.toString()}`;
                    window.history.pushState({}, '', newUrl);
                    
                }
                else {

                }
            },
            error: function(xhr) {
                $loading.fadeOut();
            }
        });
    });

});