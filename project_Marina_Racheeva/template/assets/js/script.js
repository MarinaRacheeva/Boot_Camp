'use strict';
jQuery(function () {

    $('.buy__quantity-btn-minus').click(function () {
        let $input = $(this).parent().find('input');
        let $count = parseInt($input.val()) - 1;
        if ($count < 1) {
            $count = 1;
        }
        $input.val($count);
        $input.change();
        return false;
    });

    $('.buy__quantity-btn-plus').click(function () {
        let $input = $(this).parent().find('input');
        let $count = parseInt($input.val()) + 1;
        $input.val($count);
        $input.change();
        return false;
    });

    $('.buy__quantity-count').blur(function(){
        let $input = $(this);
        let $count = $(this).val();
        if (!$count) {
            $count = 0;
        }
        $input.val($count);
        $input.change();
    });  
    
    if ('devicePixelRatio' in window && window.devicePixelRatio == 2){
        let $lowresImages = $('img.car__photo-img');
        images.each(function(i) {
            let $lowres = $(this).find('img').attr('src');
            let $highres = $lowres.replace(".", "2x.");
            $(this).attr('src', $highres);
        });
    }
    
});


