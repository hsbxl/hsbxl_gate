<?php

/**
 * @file
 * Contains \Drupal\hsbxl_gate\Routing\DynamicRoutes.
 */

namespace Drupal\hsbxl_gate\Routing;

use Symfony\Component\Routing\Route;

/**
 * Defines dynamic routes.
 */
class DynamicRoutes {

  /**
   * {@inheritdoc}
   */
  public function routes() {

    $routes = array();
    $rnd_code = \Drupal::state()->get('hsbxl_gate_rnd_code') ? : 'gate';

    $routes['hsbxl.gate'] = new Route(
      '/' . $rnd_code . '/qr',
      array(
        '_controller' => '\Drupal\hsbxl_gate\Controller\DefaultController::qr',
        '_title' => 'HSBXL::DingDong',
      ),
      array(
        '_permission'  => 'access content',
      )
    );

    return $routes;
  }

}