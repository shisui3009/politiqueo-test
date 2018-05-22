<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class UsuariosModel extends CI_Model{

        public function listarusuarios(){
            $this->db->select('*');
            $this->db->from('usuarios');
            $query = $this->db->get();
            $result = $query->result_array();
            if(count($result)>0){
                return $result;
            }
        }

        public function usuarioporid($id){ //editarborrar
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('id_usuario='.$id);
            $query = $this->db->get();
            $result = $query->result_array();
            if(count($result)>0){
                return $result;
            }
        }

        public function registrarUsuario($data){
           $this->db->insert('usuarios',
           array('id_usuario'=>$data['id_usuario'],
                    'id_rol'=>$data['id_rol'],
                    'nombres'=>$data['nombres'],
                    'apellidos'=>$data['apellidos'],
                    'pass'=>$data['pass'],
                    'correo'=>$data['correo'])
          );

        }

}
