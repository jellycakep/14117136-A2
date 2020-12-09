<?php
class Model extends CI_model{
    public function getUsername($username){
        return $this->db->get_where('user',['username'=>$username])->row_array();
    }
    public function isLoginSessionExpired(){
        $login_session_duration = 500;
        $current_time = time();
        if(isset($_SESSION['loggedin_time']) and isset($_SESSION['username'])){
            if((time()-$this->session->userdata('loggedin_time')) > $login_session_duration){
                return true;
            }
        }
        return false;
    }
    public function new_artikel($data){
        return $this->db->insert('konten',$data);
    }
    public function getartikel(){
        return $this->db->get('konten');
    }
    public function get_artikelAdmin($where, $table){
        return $this->db->get_where($table, $where);
    }
    public function ubahArtikel($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function deleteArtikel($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getArtikelUser($id)
    {
        return $this->db->get_where('konten', ['id_pengarang' => $id]);
    }
}
?>