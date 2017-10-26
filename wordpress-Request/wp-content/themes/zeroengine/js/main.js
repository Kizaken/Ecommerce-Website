jQuery(document).ready(function($){
	$('.me-chosen-select, .me-sub-category').chosen({
		disable_search: true,
	});

	$('#listing-type-select').on('change', function() {
		$(this).trigger('chosen:updated');
	});

	$('.me-parent-category').on('change', function(event) {
		$(".me-sub-category").prop('disabled', true).trigger('chosen:updated');
		setTimeout(function() {
			$('.me-sub-category').trigger('chosen:updated');
			if(! $('.me-sub-category-empty').length) {
				$('.me-sub-category').prop('disabled', false).trigger('chosen:updated');
			}
		}, 1000);
	});

	$('#post-listing-form .me-parent-category').on('loaded_field_form', function() {
        $('.me-chosen-select').chosen({
            disable_search: true,
        });
    });

	$('#search-btn').click(function( e ) {
		$(this).parents('form').submit();
	});

	$('#mobile-search-btn').click(function( e ) {
		$(this).parents('form').submit();
	});

	$('.me-has-category').find('.me-menu-category').each(function(index) {
        var mega_ul         = $(this);
        var mega_length     = $(this).children().length;
        var mega_menu       = $(this).children();
        if(mega_length > 0 ) {
            $(mega_ul).wrapAll('<div class="mega-wrapper"></div>').wrapAll('<div class="mega-menu"></div>');
            var loop = Math.ceil(mega_length/6);
            for (var i = 0; i < loop; i++) {
                $(mega_menu).slice(i*6 , (i+1)*6).wrapAll('<ul class="mega-list"></ul>').parent().insertBefore(mega_ul);
            };
            $(mega_ul)
        }
        $(this).remove();
    });

    //=== Action show/hide menu account
    //
    $('.me-my-account').on('click', function(event) {
    	var target = event.currentTarget;
    	var parent = $(target).parent('.me-menu-account').toggleClass('select-menu-account');
    });

    //=== Action show/hide menu account mobile
    //
    $('.me-humberger-mobile-btn').on('click', function() {
        var target = event.currentTarget;
        $(target).toggleClass('selected');
        $('.marketengine-header-mobile').toggleClass('active');
        $('.me-search-mobile-btn').removeClass('selected');
        $('.me-search-mobile').removeClass('active');
    });
    $('.me-select-cate-mobile, .me-select-account-mobile').on('click', function(event) {
        var target = event.currentTarget;
        $(target).parent().toggleClass('active');
        $(target).parents('.me-menu-mobile').toggleClass('selected');
    });

    $('.me-search-mobile-btn').on('click', function() {
        var target = event.currentTarget;
        $(target).toggleClass('selected');
        $('.me-search-mobile').toggleClass('active');
        $('.me-humberger-mobile-btn').removeClass('selected');
        $('.marketengine-header-mobile').removeClass('active');
    });
    $('.me-filter-cate-mobile').on('keyup', function() {
        $('.me-menu-category-mobile').find('li').hide().filter(':insensitive_contains('+ $(this).val() +')').show();
         
    });
    $(document.body).on('click', function(event) {
        if(!$(event.target).closest('.select-menu-account').length) {
            $('.me-menu-account').removeClass('select-menu-account');
            // $('.me-account-list').fadeOut(500);
        }
    });

});

jQuery.expr[':'].insensitive_contains = function(a, i, m){
    return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
};