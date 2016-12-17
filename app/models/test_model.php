<?php  if ( ! defined('BASE')) exit('Access forbidden');

class Test_Model extends Model{
    public function get_all_record($condition = array()){
        $this->db->select('*');
        $this->db->from('block');
        $this->db->query();
        return $this->db->next();
    }
}
