<div class="me-blog-item-tag">
	<span>
<?php
	$posttags = get_the_tags();
	if($posttags) :
		foreach( $posttags as $key => $tag) :
    		echo $key ? ', ' : '';
    		echo $tag->name;
		endforeach;
	endif;
?>
	</span>
</div>