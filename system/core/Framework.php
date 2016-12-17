<?php  if ( ! defined('BASE')) exit('Access forbidden');

require_once BASE . 'core/Routing.php';
require_once BASE . 'core/Model.php';
require_once BASE . 'core/Load.php';
require_once BASE . 'core/Controller.php';

// Start routing
require_once APPLICATION . 'config/routing.php';

Routing::start($routing);
