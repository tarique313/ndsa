<?php
/**
 * @version    1.1
 * @package    Corsa
 * @author     WooRockets Team <support@woorockets.com>
 * @copyright  Copyright (C) 2014 WooRockets.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

if ( function_exists( 'register_field_group' ) ) {
	register_field_group(
		array(
			'id'     => 'layout-options',
			'title'  => 'Layout Options',
			'fields' => array(
				array(
					'key'          => 'field_549b74c3ad94f',
					'label'        => 'Select a specific layout for this page ',
					'name'         => 'acf_page_layout',
					'type'         => 'select',
					'instructions' => 'Default layout: <strong>Global Layout On Customizer</strong>',
					'choices' => array(
						'default'         => 'Default',
						'main'            => 'Full Width',
						'left-main'       => 'Left Sidebar',
						'main-right'      => 'Right Sidebar',
						'left-main-right' => 'Left - Main Content - Right',
						'left-right-main' => 'Left - Right - Main Content',
						'main-left-right' => 'Main Content - Left - Right'
					),
					'default_value' => 'default',
					'allow_null'    => 0,
					'multiple'      => 0,
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'page'
					),
				),
			),
			'options' => array(
				'position'       => 'side',
				'layout'         => 'default',
				'hide_on_screen' => array(
				),
			),
			'menu_order' => 0,
		)
	);
}
