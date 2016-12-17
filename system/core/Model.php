<?php  if ( ! defined('BASE')) exit('Access forbidden');

class Model{
    /**
     * $db
     * @access    public
     */
    public $db = null;
    /**
     * class constructor
     * @access    public
     */
    function __construct($poolname) {
        $connect = new Load();
        $this->db= $connect->database($poolname);
    }

}
