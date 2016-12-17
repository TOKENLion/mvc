<?php  if ( ! defined('BASE')) exit('Access forbidden');

class Test extends Controller{

    public function index(){

        $data['class'] = __CLASS__;
        $data['method']= __METHOD__;
        $this->load->view('file', $data);
    }

    public function tet(){
        $segment = $this->load->segment(3);
        echo 'Segment 3 : ' . $segment;
    }

    public function arr(){
        echo 'here';
    }
}
