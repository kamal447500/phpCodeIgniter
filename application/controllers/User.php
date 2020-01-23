<?php

class User extends CI_Controller
{	
	public $url = 'test';

	public function profile()
	{
	    $this->load->model('Auth_model');
	    $userData = $_SESSION['userData'];
	    $records = $this->Auth_model->getRecords();
	    $this->load->view('profile', ['records'=>$records]);
	}

	public function create()
	{
	    $this->load->view('create');
	}

	public function test(){
		print_r('expression');exit;
	}

	public function save(){

		//	echo "hello";exit;
		$this->form_validation->set_rules('customerName','CustomerName', 'required');
		$this->form_validation->set_rules('phone','Phone', 'required');
		$this->form_validation->set_rules('address','Address', 'required');
		$this->form_validation->set_rules('city','City', 'required');
		$this->form_validation->set_rules('country','Country', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if( $this->form_validation->run() )
		{
			$data = $this->input->post();
			$this->load->model('Auth_model');
			if( $this->Auth_model->saveRecord( $data ) ){
				$this->session->set_flashdata('response','Record Saved Successfully.');
			}			
			else
			{
				$this->session->set_flashdata('response','Record Not Saved.');
			}
			return redirect('user/profile');
		} 
		else
		{
			$this->load->view('create');
		}
	}

	public function edit( $record_id ){
		$this->load->model('Auth_model');
		$record = $this->Auth_model->getAllRecords( $record_id );
		$this->load->view('update', ['record'=>$record]);
	}    

	public function update( $record_id ){
		$this->form_validation->set_rules('customerName','CustomerName', 'required');
		$this->form_validation->set_rules('phone','Phone', 'required');
		$this->form_validation->set_rules('address','Address', 'required');
		$this->form_validation->set_rules('city','City', 'required');
		$this->form_validation->set_rules('country','Country', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if( $this->form_validation->run() )
		{
			$data = $this->input->post();
			$this->load->model('Auth_model');
			if( $this->Auth_model->updateRecords( $record_id, $data ) ){
				$this->session->set_flashdata('response','Record Updated Successfully.');
			}			
			else
			{
				$this->session->set_flashdata('response','Record Not update.');
			}
			return redirect('user/profile');
		} 
		else
		{
			$this->load->view('update');
		}
	}

	public function delete( $record_id ){
		$this->load->model('Auth_model');
		if( $this->Auth_model->deleteRecords( $record_id ) ){
			$_SESSION['delete_user_id'] = $record_id;
			$this->session->set_flashdata('response','Record Deleted Successfully.');
		}
		else{
			$this->session->set_flashdata('response','Failed to Delete Record.');				
		}
		return redirect('user/profile');	
	}

	public function undo(){
		$delete_user_id = $_SESSION['delete_user_id'];

		$this->load->model('Auth_model');
		if( $this->Auth_model->undoRecord($delete_user_id) ){
			$this->session->set_flashdata('response','Record Retrived Successfully.');
		}
		else{
			$this->session->set_flashdata('response','Failed to Retrive Record.');				
		}
		$_SESSION['delete_user_id'] = "";
		return redirect('user/profile');
	}

}