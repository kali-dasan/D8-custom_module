<?php

namespace Drupal\first_form\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class FruitForm extends FormBase {

	public function getFormId() {
		return 'fruitform';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {
		$fruits = ['Apple', 'Banana', 'Blueberry', 'Grapes', 'Orange', 'Strawberry'];
		$form['fav_fruit'] = array(
			'#type' => 'select',
			'#title' => $this->t('Select any one fruit.'),
			'#required' => true,
			'#options' => array_combine($fruits, $fruits),
		);
		$form['submit'] = array(
			'#value' => $this->t('Submit!'),
			'#type' => 'submit',
		);
		return $form;
	}

	public function validateForm(array &$form, FormStateInterface $form_state) {

	}

	public function submitForm(array &$form, FormStateInterface $form_state) {
		drupal_set_message($this->t('@fruit! Wow sema selection.', array('@fruit' => $form_state->getValue('fav_fruit'))));
		//$form_state->setRedirect('first_module.content');
		// User below code if we use Drupal\Core\Url;
		// Else above redirect is fine.
		$url = Url::fromUserInput('/first');
		$form_state->setRedirectUrl($url);
	}

}
