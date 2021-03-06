<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		   
		    $this->load->view('header');
			$this->load->view('vlogin');
			$this->load->view('footer');

	}
	public function inicio_sesion(){

		    $this->load->view('header');
			$this->load->view('vlogin');
			$this->load->view('footer');

	}

	public function validar(){
		 
		 $this->load->model('mLogin');
		 $usuario=$this->input->post('user');
		 $pwd=$this->input->post('password');
				
		 $usuario=$this->mLogin->loggin($usuario,$pwd);
			
		//print_r($usuario);
		// echo json_encode($usuario);
		if(count($usuario)>0)
		{	
			//$this->session->set_userdata('sesion_nombre',$usuario[0]->Nombre);
			$user_data = array(
				'Persona_id' => $usuario[0]->id,			
				'Nombre' => $usuario[0]->Nombre,
				'Apat'=>$usuario[0]->Apat,
				'Amat'=>$usuario[0]->Amat,
				'email' => $usuario[0]->Email,
				'Cel' => $usuario[0]->Cel,
				'Rol' => $usuario[0] ->Tipo,
				'Persona' => $usuario[0]->TipodePersona
				);
			$this->session->set_userdata($user_data);
			//$this->session->set_userdata('sesion_nombre', $usuario[0]->Nombre);
			echo json_encode($this->session->userdata('Nombre'));
			//echo json_encode($this->session->userdata('Nombre'));
			//redirect('cMenu');

		}else{

			echo "0";
		}	
	}

	public function vregistrar(){
		    $this->load->view('header');
			$this->load->view('body/vRegistro');
			$this->load->view('footer');
	}
	
	public function cerrar_sesion(){
		$this->session->sess_destroy();
		redirect('Welcome/index');
	}
}
