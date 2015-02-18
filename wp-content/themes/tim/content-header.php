<?php
/**
 * The template used for displaying header in pages.
 *
 * @package tim
 */
?>

<?php
	$titleBG = get_field('title_bg');
	$defBG = get_field('default_title_bg','option');
	// thumbnail
	$titleSize = 'title-bg';
	$titleThumb = $titleBG['sizes'][ $titleSize ];
	$defThumb = $defBG['sizes'][ $titleSize ];

	$oTitle = get_field('offer_title','option');
	$oText = get_field('offer_text','option');
	$oForm = get_field('offer_form','option');
?>
	<div class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div id="offerHead">
			<h1 class="offerTitle"><?php echo $oTitle; ?></h1>
			<span class="offerText"><?php echo $oText; ?></span>
			<div class="formWrap">
				<?php echo do_shortcode($oForm); ?>
			</div>
		</div>
	</div><!-- .entry-header -->