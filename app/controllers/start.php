<?php  if ( ! defined('BASE')) exit('Access forbidden');

class Start extends Controller{
    public function index(){
        $this->load->model('Test_Model','test');

//        echo '<pre>' . print_r($this->test->get_all_record(array('test'=>'value'), true) . '</pre>';
//        die();
        $data['test'] = $this->load->test->get_all_record(array('test'=>'value'));
        $this->load->view('default', $data);
    }
}
