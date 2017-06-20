<?php

namespace Drupal\hsbxl_gate\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hsbxl_gate_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'hsbxl_gate.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('hsbxl_gate.settings');

    $form['example_thing'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Things'),
      '#default_value' => $config->get('things'),
    );

    $form['other_things'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Other things'),
      '#default_value' => $config->get('other_things'),
    );

    return parent::buildForm($form, $form_state);

  }

}