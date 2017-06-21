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
   *   Return Hello string.
   */
  public function qr() {

    try {

      $client = \Drupal::httpClient();
      $client->post('http://hal9000.space.hackerspace.be/cgi-bin/sounds.sh', [
        'form_params' => [
          'SPEAK' => 'Attention someone at the gate'
        ]
      ]);

    }
    catch (RequestException $e) {
      watchdog_exception('hsbxl_gate', $e);
    }

    return [
      '#type' => 'markup',
      '#markup' => $this->t('The bell inside has been notified of your call.')
    ];
  }

}
