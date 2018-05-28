<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('rolModel');
        $this->load->helper('Modulo');

		if(!$this->session->userdata('id_usuario')){
		    $this->session->sess_destroy();
			redirect('login');
		}
    }

	public function index()
	{
        $resultado = $this->rolModel->getRoles();
		$data = array("content"=>'admin/roles',"dataView"=>array('resultado' => $resultado));
		$this->load->view('layoutInicio',$data);
	}

	public function recibirdatos() // cambia
	{
		$data_rol = array('descripcion'=>$this->input->post('descripcion'));
		$this->rolModel->registrarrol($data_rol);

		$data_modulos = array('modulos' => $this->input->post('modulos'));
	  	$this->rolModel->modulosasignados($data_modulos);
		redirect('rol');
	}

	public function borrar()
    {
        $id = $this->input->post('idrol');echo $id;
        $this->rolModel->borrarrol($id);
    }
}
