<?php
 
/**
 
 * @file
 
 * Contains \Drupal\simple\Form\SimpleConfigForm.
	This module is used to save the configuration of the custom module 
 */
 
namespace Drupal\simple\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class SimpleConfigForm extends ConfigFormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function getFormId() {
 
    return 'simple_config_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {
 
    $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('simple.settings');
	
	// Latitude
    $form['latitude'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Latitude'),
 
      '#default_value' => $config->get('simple.latitude'),
 
      '#required' => TRUE,
 
    );
	
	// Longtutide
	 $form['longtutide'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Longtutide'),
 
      '#default_value' => $config->get('simple.longtutide'),
 
      '#required' => TRUE,
 
    );
	
	// Height
		
	$form['height'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Height'),
 
      '#default_value' => $config->get('simple.height'),
 
      '#required' => TRUE,
 
    );
	
	// width
	$form['width'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Width'),
 
      '#default_value' => $config->get('simple.width'),
 
      '#required' => TRUE,
 
    );
	
    return $form;
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    $config = $this->config('simple.settings');
 
    $config->set('simple.latitude', $form_state->getValue('latitude'));
	
	$config->set('simple.longtutide', $form_state->getValue('longtutide'));
	
	$config->set('simple.height', $form_state->getValue('height'));
	
	$config->set('simple.width', $form_state->getValue('width'));
      
    $config->save();
	
	//$conn = Database::getConnection();
	
	
	/*$query = \Drupal::database()->select('gmap_config', 'gc');
	$query->addField('gc', 'id');
	$query->condition('gc.id', '1');
	$query->range(0, 1);
	$gc = $query->execute()->fetchField();
	
	echo "<pre>";
	print_r($gc);
	echo "</pre>";
	
	die();
	if(isset($gc) && $gc != ''){
		
		
	}else{

		db_insert('gmap_config')->fields(
		  array(
			'latitude' => $form_state->getValue('latitude'),
			'longtutide' => $form_state->getValue('longtutide'),
			'height' => $form_state->getValue('height'),
			'width' => $form_state->getValue('width'),
		  )
		)->execute();
	}*/
	
	drupal_set_message("Successfully saved Map Settings"); 
 
   // return parent::submitForm($form, $form_state);
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  protected function getEditableConfigNames() {
 
    return [
 
      'simple.settings',
 
    ];
 
  }
 
}