<?php

namespace Drupal\hsbxl_gate\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\hsbxl_gate\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Qr.
   *
   * @return string
   */
  public function qr() {

    try {

      $client = \Drupal::httpClient();
      $client->post('http://hal9000.space.hackerspace.be/cgi-bin/sounds.sh', [
        'form_params' => [
          'SPEAK' => 'Someone is outside at the gate. Please help this poor soul.'
        ]
      ]);

    }
    catch (RequestException $e) {
      watchdog_exception('hsbxl_gate', $e);
    }

    return [
      '#type' => 'markup',
      '#markup' => $this->t('SkyNet has been notified.')
    ];
  }

}
