<?php
defined('BASEPATH') OR exit('No direct script acess allowed');
class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Model','model_model');
    }
    public function index(){
        if($this->session->userdata('email')){
            redirect('user');
        }
        $this->load->view('login/index');
    }
    public function ceklogin(){
        $username=$this->input->post('user_name');
        $password=$this->input->post('password');

        $getUser=$this->model_model->getUsername($username);

        if($getUser){
            if($getUser["id"]==1){
                $data=[
                    'username'=>$username,
                    'id'=>$getUser["id"],
                    'loggedin_time'=>time()
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            }else{
                $data=[
                    'username'=>$username,
                    'id'=>$getUser["id"],
                    'loggedin_time'=>time()
                ];
                $this->session->set_userdata($data);
                redirect('user');
            }
        }else{
            $this->session->set_flashdata('message','<p>User Tidak terdaftar</p>');
            redirect('login');
        }
    }
}
?>