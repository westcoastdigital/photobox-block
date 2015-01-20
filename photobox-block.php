<?php

class HeadwayPhotoboxBlock extends HeadwayBlockAPI {

    public $id = 'photobox-block';

    public $name = 'Photobox';

    public $options_class = 'HeadwayPhotoboxBlockOptions';


			function enqueue_action($block_id, $block) {

				wp_enqueue_script('jquery');

				wp_enqueue_script('photobox', plugins_url('/photobox/photobox/jquery.photobox.js' , __FILE__),'','',false);

				wp_enqueue_style('photobox-block', plugins_url('/photobox/photobox/photobox.css' , __FILE__),'','',false); 

			    wp_enqueue_script('photobox-block-ready', plugins_url('/photobox_ready.js' , __FILE__),'','',false);

				wp_enqueue_script('hover-focus', plugins_url('/hover.js' , __FILE__),'','',false);

			}


		public static function dynamic_css($block_id, $block = false) {
        $photoboxshortcode = parent::get_setting($block, 'photobox-shortcode', array());
    	if ( !$block )

			$block = HeadwayBlocksData::get_block($block_id);

		$css = '';
        
        if ( $photoboxshortcode == false) {
        
        $css .= '
            #block-' .$block_id . '{
    		    display: none;
			}
        ';
        }
		$css .= '
			
			#block-' .$block_id . ' .hover-parent:hover .child {
			    opacity: .25;
				-moz-transition: all 0.5s;
				-webkit-transition: all 0.5s;
			}
			
			';
		$css .= '
			
			#block-' .$block_id . ' .hover-child:hover {
			    opacity: 1;
				-moz-transition: all 0.5s;
				-webkit-transition: all 0.5s;
			}

			';

		return $css;

		}


	function content($block) {
		
		$photoboxshortcode = parent::get_setting($block, 'photobox-shortcode', array());
		
		$block_width = HeadwayBlocksData::get_block_width($block);

		$block_height = HeadwayBlocksData::get_block_height($block);
		
        if ( $photoboxshortcode == false)
        
        echo '<div class="photobox-display"> </div>';
		
        else
        
echo '<div class="gallery">';

			echo '<div class="gallery-img" style="display: inline;">';

				echo do_shortcode(''.$photoboxshortcode.''); 

			echo '</div>';
			  		
		echo '</div>';

	}

}
