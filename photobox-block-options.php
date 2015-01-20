<?php

class HeadwayPhotoboxBlockOptions extends HeadwayBlockOptionsAPI {

    public $tabs = array(

        'content-tab' => 'Content',

	);

	public $inputs = array(

		'content-tab' => array(
            
            'content-types-text' => array(

    				'type' => 'notice',

					'name' => 'content-types-text',

					'notice' => 'Watch a intro video on my <a href="http://youtu.be/HtHBWBOOT90" target="_blank">YouTube Channel</a></ br>Enjoy my first plugin, if you have any questions email me at <a href="mailto:support@carassiusproductions.com.au?Subject=Photobox" target="_blank">support@carassiusproductions.com.au</a>.'

				),

            'photobox-shortcode' => array(

				'type' => 'text',

				'name' => 'photobox-shortcode',
                
                'label' => 'WordPress Gallery Shortcode',
				
				'default' => ' ',

				'tooltip' => 'Paste your WordPress Gallery shortcode here.<br />Leave blank if using the shortcode within a page or post.'

			),

		),

	);

}
