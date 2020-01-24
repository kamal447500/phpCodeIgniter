<?php

class Auth extends CI_Controller
	{

		public function logout()
		{
			unset($_SESSION);
			session_destroy();
			redirect("auth/login", "refresh");
		}

		public function login()
		{

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == TRUE) 
			{
				$username = $_POST['username'];
				$password = md5($_POST['password']);

				// check user exist in db

				$this->db->select('*')->from('users');
				$this->db->where(array('username' => $username, 'password' => $password));
				$user = $this->db->get()->row();

						
				if($user->email){
					$this->session->set_flashdata("success", "You are Logged In");

					$_SESSION['user_logged'] = TRUE;
					$_SESSION['username'] = $user->username;

					//	UNSET PASSWORD FROM USER OBJ
					$userData = $user;
					unset($userData->password);
					$_SESSION['userData'] = $userData;
					redirect("user/profile", "refresh");
				}else{
					$this->session->set_flashdata("error", "No such an User Account Detected");
					redirect("auth/login", "refresh");
				}

			}

			$this->load->view('login');

		}

		public function register()
		{
			if (isset($_POST['register'])) 
			{
				echo '2';
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required|min_lenght[5]');
				$this->form_validation->set_rules('password', 'Confirm Password', 'required');
				$this->form_validation->set_rules('phone', 'Phone', 'required');

				echo '3';exit;
				if ($this->form_validation->run() == TRUE)
				{
					echo 'form validation';
					//add user in db

					$data = array(
						'username' => $_POST['username'],
						'email' => $_POST['email'],
						'password' => md5($_POST['password']),
						'gender' => $_POST['gender'],
						'created_date' => date('y-m-d'),
						'phone' => $_POST['phone']
					);
					$this->db->insert('users', $data);

					$this->session->set_flashdata("success", "your account has been registered. You can log in now");
					redirect("auth/register", "refresh");
				}
			}
			//load view
			$this->load->view('register');
		}    
	}
?>
