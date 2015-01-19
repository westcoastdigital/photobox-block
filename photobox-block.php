<?php







/* This class must be included in another file and included later so we don't get an error about HeadwayBlockAPI class not existing. */















class HeadwayPhotoboxBlock extends HeadwayBlockAPI {







    







    







    public $id = 'photobox-block';







    







    public $name = 'Photobox';







    







	public $options_class = 'HeadwayPhotoboxBlockOptions';







			







			function init_action($block_id) {



				/* CODE FOR OPTIONAL METHOD */



				return;



			}



			















			function enqueue_action($block_id, $block) {



				$photoboxfocus = parent::get_setting($block, 'hover-focus', '');



						



				



				wp_enqueue_script('jquery');



				



				wp_enqueue_script('photobox', plugins_url('/photobox/photobox/jquery.photobox.js' , __FILE__),'','',false);



				



				wp_enqueue_style('photobox-block', plugins_url('/photobox/photobox/photobox.css' , __FILE__),'','',false); 



				



			    	wp_enqueue_script('photobox-block-ready', plugins_url('/photobox_ready.js' , __FILE__),'','',false);



				



				//if ($photoboxfocus == true)	{



				wp_enqueue_script('hover-focus', plugins_url('/hover.js' , __FILE__),'','',false);



				



			//	}



			}





public static function dynamic_css($block_id, $block = false) {







    	if ( !$block )



			$block = HeadwayBlocksData::get_block($block_id);







		$photoboxmargin = parent::get_setting($block, 'image-margin', '');



		$css = '';







    $css .= '



           



               #block-' . $block_id . ' .photobox_thumb {



                   margin: ' . $photoboxmargin . ';



               }



           ';



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



    /** 



	 * Anything in here will be displayed when the block is being displayed.



	 **/



	function content($block) {



				



		$images = parent::get_setting($block, 'images', array());



		$photoboxheight = parent::get_setting($block, 'image-height', null);



        



        		



		$block_width = HeadwayBlocksData::get_block_width($block);



		$block_height = HeadwayBlocksData::get_block_height($block);



			



		$has_images = false;







		foreach ( $images as $image )



			if ( $image['gallery-image'] ) {



				$has_images = true;



				break;



			}







		if ( !$has_images ) {







			echo '<div class="alert alert-yellow"><p>There are no images to display.</p></div>';



			



			return;







		}



		



		







		echo '<div class="gallery">';







			







			  	foreach ( $images as $image ) {







			  		if ( !$image['gallery-image'] )



			  			continue;







			  		$output = array(



			  			'image' => array(



			  		'src' => headway_fix_data_type(headway_get('gallery-image', $image)),



			  				'title' => headway_fix_data_type(headway_get('image-title', $image)),



			  			),







			  		);











        



			  			



			  			

						echo '<div class="gallery-img" style="display: inline;">';

			  			echo '<a href="' . $output['image']['src'] . '">';







			  			/* Display the image */



			  			echo '<img src="' . $output['image']['src'] .'" title="'. $output['image']['title'].'" class="photobox_thumb float-shadow" height="'.$photoboxheight.'"   />';







			  			echo '</a>';

						echo '</div>';

			  		



			  			







			  		



			  	}



		  



			



			



		  echo '</div>';







	}



		}
