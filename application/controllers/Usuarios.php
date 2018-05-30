<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('usuariosModel');
        $this->load->helper('modulo');
		$this->load->library(array('form_validation'));
		if(!$this->session->userdata('id_usuario')){
		    $this->session->sess_destroy();
			redirect('login');
		}
    }

	public function index()
	{
        $resultado = $this->usuariosModel->listarusuarios();
		$data = array("content"=>'admin/usuarios',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);

	}

	public function anadirUsuario(){
		$this->load->view('admin/modales/musuarios');
	}

	public function borrar() // borrar
	{
		$id = $this->input->post('idusuario');
		$result = $this->usuariosModel->borrarusuario($id);
		if($result == "success"){
			redirect("usuarios");
		}
		else {
			header('Content-Type: application/json');
			echo json_encode(array("result"=>$result));
		}
	}

	public function recibirdatos()
	{
		$this->form_validation->set_rules("rol", "Rol", "required");
		$this->form_validation->set_rules("nombres", "Nombres", "required");
		$this->form_validation->set_rules("apellidos", "Apellidos", "required");
		$this->form_validation->set_rules("pass", "Contraseña", "trim|required");
		$this->form_validation->set_rules("correo", "Correo", "trim|required|valid_email");

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('admin/modales/musuarios');
        }
        else
        {
			$data = array(
				'id_rol'=>$this->input->post('rol'),
				'nombres'=>$this->input->post('nombres'),
				'apellidos'=>$this->input->post('apellidos'),
				'pass'=>$this->input->post('pass'),
				'correo'=>$this->input->post('correo')
			  );

			$this->usuariosModel->registrarUsuario($data);
			header('Content-Type: application/json');
			echo json_encode(array("result"=>"success"));
        }
	}

	public function busqueda()
	{
		$txt = $this->input->post('texto');
		$resultado = $this->usuariosModel->busqueda($txt);
		echo json_encode($resultado);
	}
}
