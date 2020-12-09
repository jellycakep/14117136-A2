<?php
defined('BASEPATH') OR exit('No direct script acess allowed');
class Admin extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Model','model_model');
    }
    public function index(){
        if($this->session->userdata('username')==NULL){
            $this->session->set_flashdata('message','<p>Login dulu');
            redirect('login');
        }
        if($this->session->userdata('username') != NULL){
            if($this->model_model->isLoginSessionExpired()){
                $this->session->set_flashdata('message','<p>login sesi telah habis, silahkan login kembali</p>');
                redirect('admin/logout');
            }
        }
        $sessionUser=$this->session->userdata('username');
        $data['user']=$this->model_model->getUsername($sessionUser);
        $data['artikel']=$this->model_model->getartikel()->result();
        $this->load->view('admin/index',$data);
    }
    
    public function logout(){
        if($this->session->flashdata('message') != NULL){
            $this->session->set_flashdata('message','<p>login sesi telah habis, silahkan login kembali</p>');
            $this->session->unset_userdata('username');
            redirect('login');
        }else{
            $this->session->set_flashdata('message','<p>sukses logout</p>');
            $this->session->unset_userdata('username');
            redirect('login');
        }
    }
    public function get_artikel(){
        $this->load->view('artikel/admin');
    }
    public function input_artikel(){
        $this->form_validation->set_rules('judul','Judul','required');
        $this->form_validation->set_rules('konten','Konten','required');
        if ($this->form_validation->run() == true) {
            $data = array(
                'id_pengarang' => $this->session->userdata('id'),
                'judul_artikel' => $this->input->post('judul'),
                'isi_artikel' => $this->input->post('konten')
            );
            $this->model_model->new_artikel($data);
            redirect('admin');
        } else {
            redirect('admin/artikel');
        }
    }
    public function update($id){
        $where = array('id_konten' => $id);
        $data['user'] = $this->model_model->get_artikelAdmin($where, 'konten')->result();
        $this->load->view('edit/admin', $data);
    }
    public function save_update(){
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $konten = $this->input->post('konten');

        $data = array(
            'judul_artikel' => $judul,
            'isi_artikel' => $konten
        );

        $where = array(
            'id_konten' => $id
        );

        $this->model_model->ubahArtikel($where, $data, 'konten');
        redirect('admin');
    }
    public function delete($id){
        $where = array(
            'id_konten' => $id
        );
        $this->model_model->deleteArtikel($where, 'konten');
        redirect('admin');
    }
}