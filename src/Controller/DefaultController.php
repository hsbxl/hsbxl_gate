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
          'SPEAK' => 'Someone is waiting outside. Skynet cant be stopped but is unable to open this gate. Please help.'
        ]
      ]);
    }
    catch (RequestException $e) {
      watchdog_exception('hsbxl_gate', $e);
    }

    $output[] = [
      '#type' => 'markup',
      '#markup' => $this->t('SkyNet has been notified.')
    ];
    
    $output[] = [
      '#type' => 'markup',
      '#markup' => '<br /><img src="https://chart.googleapis.com/chart?cht=qr&amp;chs=148x148&amp;chl=http://local.dashboard.hsbxl.be/gate/qr"><br />',
    ];

    return $output;
  }
}
