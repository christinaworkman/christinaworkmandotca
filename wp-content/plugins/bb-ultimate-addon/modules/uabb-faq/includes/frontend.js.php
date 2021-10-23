<?php
/**
 *  UABB FAQ front-end JS php file
 *
 *  @package UABB FAQ
 */

?>


jQuery(document).ready(function() {
new UABBFAQModule ({
id:'<?php echo esc_attr( $id ); ?>',
close_icon:'<?php echo esc_attr( $settings->close_icon ); ?>',
open_icon:'<?php echo esc_attr( $settings->open_icon ); ?>',
enable_first: '<?php echo esc_attr( $settings->faq_enable_first ); ?>'
});
<?php // Regexp for validating user input as ID : https://regex101.com/r/KGj6I6/1. ?>
	var pattern = new RegExp('^[\\w\\-]+$');

	var hashval = window.location.hash.substring(1);

	if ( pattern.test( hashval ) ) {

		var hashval_last_index = hashval.lastIndexOf('-');

		var tab_id = hashval.slice(0,hashval_last_index);

		var dataindex = hashval.slice(hashval_last_index+1 , hashval.length);

		if( tab_id !== '' ) {

		var tab_id = "#" + tab_id;

			if( jQuery( tab_id ).length > 0 ) {
				if( jQuery(tab_id).find( '.uabb-faq__layout-accordion > .uabb-faq-item[data-index="' + dataindex + '"]' ) ) {

					jQuery('html, body').animate({
						scrollTop: jQuery( tab_id ).offset().top - 250
					}, 1000);
					var enable_first = '<?php echo esc_attr( $settings->faq_enable_first ); ?>';
					if( !( parseInt( dataindex ) === 0 && enable_first === 'yes' ) ) {
						setTimeout(function(){
							jQuery( tab_id + ' .uabb-faq-questions-button' ).eq(dataindex).trigger('click');
						}, 1000);
					}
				}
			}
		}
	}
});
