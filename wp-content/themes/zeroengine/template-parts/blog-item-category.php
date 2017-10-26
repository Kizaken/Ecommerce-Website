<?php
$single_class = '';
if( !is_single() ){
	$single_class = 'item-';
}
?>
<div class="me-blog-<?php echo $single_class; ?>category">
<?php
	$categories = get_the_category();
	if($categories) :
		foreach ($categories as $key => $category) :
			if( $category->parent != 0 ) continue;
?>
	<?php echo $key ? '/' : ''; ?>
	<a href="<?php echo get_term_link($category->term_id); ?>"><?php echo $category->name; ?></a>

<?php
		endforeach;
	endif;
?>
</div>