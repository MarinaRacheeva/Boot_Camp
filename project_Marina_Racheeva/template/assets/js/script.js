'use strict';

jQuery(function () {

    $('.buy__quantity-btn-minus').click(function () {
        let $input = $(this).parent().find('input');
        let count = parseInt($input.val()) - 1;
        if (count < 1) {
            count = 1;
        }
        $input.val(count);
        $input.change();
        return false;
    });

    $('.buy__quantity-btn-plus').click(function () {
        let $input = $(this).parent().find('input');
        let count = parseInt($input.val()) + 1;
        $input.val(count);
        $input.change();
        return false;
    });


 
     
});


