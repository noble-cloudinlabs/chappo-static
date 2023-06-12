(function($){
    'use strict';

    $('.post_like' ).on( 'click', function(e) {
        e.preventDefault();
        
        var post_id = $(this).attr('href');
        var $this = $(this);
        
        $.post(
            bepro_ajax.ajaxurl, 
            {
                'action': 'post_like',
                'pid': post_id
            }, 
            function(response){
                $this.html('<i class="uiuxom-thumbs-up"></i>' + response);
            }
        );
    });
})(jQuery);