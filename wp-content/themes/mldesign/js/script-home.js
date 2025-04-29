$(document).ready(function () {
    mld_global_map_initialize();
    $(window).on('resize', function() {
        mld_global_map_initialize();

    });

    function mld_global_map_initialize() {
        const isMobile = window.matchMedia('(max-width: 1199px) and (orientation: portrait)').matches;
        const svgFile = isMobile ? home.options.globalMapMobile : home.options.globalMap;
        
        $('#global-map').load(svgFile, function () {
            // Bind click events AFTER SVG is loaded
            $('#global-map').find('g[id^="Country_"]').on('click', function () {
                const dataName = $(this).attr('data-name');
                if (dataName) {
                    var $name = dataName.replace('Country ', '');
                    console.log($name);
                }
            });
        });
    }
})