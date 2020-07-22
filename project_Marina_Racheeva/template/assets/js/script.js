'use strict';
jQuery(function () {

    $('.buy__quantity-btn').click(function (){
        let $input = $(this).parent().find('input');
        let sign = $(this).attr('data-name');
        let count = parseInt($input.val().replace(/[^\d]/g, ''));
        switch (sign) {
            case 'minus': {
                count = (count < 1) ? 1 : count--;
                break;
            }
            case 'plus': { 
                count++;
                break;
            }
        }
        $input.val(count);
        return false;
    });

    $('.buy__quantity-count').blur(function(){
        let $input = $(this);
        let count = $(this).val();
        if (!count || (count < 0)) {
            count = 0;
        }
        $input.val(count);    
    });  
    
});


