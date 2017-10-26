jQuery(document).ready(function($){
	$.fn.zeroComment = function() {

        return $(this).each(function() {
        	var $elem = $(this),
        		load_more_button = $elem.find('#zero_load_comment'),
        		post_id = load_more_button.data('post-id');
        		max = load_more_button.data('max');
        		$next_page = 2;

        	var load_more = function() {
        		$.ajax({
        			type: 'post',
                    url: me_globals.ajaxurl,
                    data: {
                        action: 'load_more_comment',
                        post_id: post_id,
                        max: max,
                        paged: $next_page,
                    },
                    beforeSend: function() {
                    	console.log("TODO: loading effect");
                    },
                    success: function(res) {
                    	console.log(res);
                    	$elem.find('.comment-list').append(res.comments);
                		$next_page = res.paged;
                    	if(res.remove) {
                    		load_more_button.remove();
                    	}
                    },
        		});
        	}

        	load_more_button.click(function(e) {
        		e.preventDefault();
        		load_more();
        	});
        });
	}

	$('#comment-container').zeroComment();
});