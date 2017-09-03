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
    $gate_rnd_uri_part = $config->get('gate_rnd_uri_part') ? : 'gate';

    $form['gate_rnd_uri_part'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Random QR code uri part'),
      '#default_value' => $gate_rnd_uri_part,
      '#description' => $this->t('Part of the gate URL. Ex.: https://dashboard.hsbxl.be/gate/qr. The \'gate\' part in this case. Used to change the final URL and stop trolls. Temporary...')
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $this->config('hsbxl_gate.settings')
      ->set('gate_rnd_uri_part', $form_state->getValue('gate_rnd_uri_part'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}