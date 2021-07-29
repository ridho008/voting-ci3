<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
   public function cekLogin($username)
   {
      if($username == null) {
         $this->db->get_where('petugas', ['username' => $username]);
         return redirect('masuk');
      }
   }

}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */