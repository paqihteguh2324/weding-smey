<?php

namespace Config;

use CodeIgniter\Routing\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman utama ("/")
$routes->get('/(:segment)', 'InvitationController::index/$1');

// RSVP (chat)
$routes->post('/rsvp/save', 'InvitationController::saveRsvp');
$routes->get('rsvp/list', 'InvitationController::getRsvpList');

 
?>