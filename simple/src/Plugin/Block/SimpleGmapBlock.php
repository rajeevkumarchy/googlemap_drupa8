<?php

/* This is custom block used to create custom google maps */
namespace Drupal\simple\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SimpleGmapBlock' block.
 *
 * @Block(
 *   id = "SimpleGmapBlock",
 *   admin_label = @Translation("SimpleGmapBlock")
 * )
 */
class SimpleGmapBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
   	
	//Currently we are fetching it from  "Simple Setting Custom Modules " But we can extend it use 
	
   $latitude = \Drupal::config('simple.settings')->get('simple.latitude');
   $longtutide = \Drupal::config('simple.settings')->get('simple.longtutide');
   $height = \Drupal::config('simple.settings')->get('simple.height');
   $width = \Drupal::config('simple.settings')->get('simple.width');
  // $my_config2 = \Drupal::config('system.site')->get('name');
   
   //$html = '<iframe src="http://maps.google.com/maps?q='.$latitude.','.$longtutide.'&z=15&output=embed"></iframe>';
   $html = '<iframe height='.$height.' width= '.$width.'  src="http://maps.google.com/maps?q='.$latitude.','.$longtutide.'&z=15&output=embed"></iframe>';
  
	
	
	return array (
            '#type' => 'markup',
            '#markup' => \Drupal\Core\Render\Markup::create($html),
        );
  }

}
