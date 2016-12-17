<?php  if ( ! defined('BASE')) exit('Access forbidden');

class Controller {
    public $load;

    function __construct(){
        $this->load = new Load();
    }
}
