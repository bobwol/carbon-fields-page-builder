<?php
function cfpb_carbon_parse_shortcodes($meta_string){//for use of shortcodes in rich text
	return apply_filters('the_content', $meta_string);
}
function cfpb_bg_image($bg){ //background image function
	if ($bg){
		$background_image = "background:url('".$bg."');background-size:cover;background-repeat:no-repeat;background-position: center center;";
    	return $background_image;
	}else{
		return '';
	}
}
function cfpb_gform_options($field){
	if ($field === 'yes'){
		return 'true';
	} else{
		return 'false';
	}
}
function carbon_display_page_builder() {//call function in pages that will use this
	if ( function_exists( 'carbon_get_the_post_meta' ) ) {
		$layouts = carbon_get_the_post_meta( 'crb_layouts', 'complex' );
	}
	if (!empty($layouts)){
		foreach ( $layouts as $layout ) {
			$function_name = 'carbon_print_layout';
			if ( function_exists( $function_name ) ) {
				call_user_func( $function_name, $layout );
			}
		}
	}
}