<?php
	class User extends CI_Controller{

		public function login(){

			$data['error'] = '';

			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('logNumber', 'Student Number', 'required');
			$this->form_validation->set_rules('logPassword', 'Password', 'required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/login', $data);
				$this->load->view('templates/footer-user');
			} else {
				$result = $this->Student_model->checkCredentials();
				if($result == 0){
					$data['error'] = 'Student Number and Password combination not recognized.';
					$this->load->view('templates/header');
					$this->load->view('pages/login', $data);
					$this->load->view('templates/footer-user');
				}else{
					$this->session->studentNumber = $result->studentNumber;
					$this->session->studentName = $result->firstName . ' ' . $result->lastName;
					$this->session->section = $result->section;
					$this->session->isAdmin = $result->isAdmin;
					if($this->session->isAdmin == 1)
						redirect('admin');
					else
						redirect('student');
				}	
			}
		}

		public function student(){
			$this->_checkSubmitted();
			$data = $this->session;
			
			$this->load->view('templates/header');
			$this->load->view('pages/student', $data);
			$this->load->view('templates/footer-user');
		}

		private function _checkSubmitted(){
			$result = $this->Student_model->checkSubmission($this->session->studentNumber);
			if($result != 1){
				$this->session->image = $result['image'];
				$this->session->time = date('h:i:s A', strtotime($result['postTime']));
			}
			return;
		}

		public function submitAttendance(){

			$src = $_FILES['a_Proof']['name'];
			$fileExt = explode(".", $src); 
			$fileActualExt = strtolower(end($fileExt)); 

			$config['upload_path'] = './uploads';
			$config['file_name'] = uniqid('', TRUE). '.' . $fileActualExt;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('a_Proof')){
				$errors =array('error' => $this->upload->display_errors('<div>', '</div>'));
				$this->session->upload_error = $errors;
			}else{
				$image = $this->upload->data('file_name');
				$this->session->unset_userdata('upload_error');
				$this->Student_model->submitProof($image);
			}

			redirect('student');

		}

		public function signup(){

			$this->load->library('form_validation');

			$this->form_validation->set_rules('sNumber', 'Student Number', 'required|min_length[10]|max_length[10]|is_unique[student.studentNumber]');
			$this->form_validation->set_rules('sPassword', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('sFirstName', 'First Name', 'required');
			$this->form_validation->set_rules('sLastName', 'Last Name', 'required');
			$this->form_validation->set_rules('sPassword2', 'Confirm Password', 'matches[sPassword]');

			$this->form_validation->set_message('is_unique', 'Student Number is already registered.');
			$this->form_validation->set_message('matches', "Passwords doesn't match.");

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			
			if ($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/signup');
				$this->load->view('templates/footer-user');
			} else {
				$this->Student_model->signUp();
				$this->session->set_flashdata('user_registered', 'Neat! You are now registered.');
				redirect('');
			}
			
		}

		public function logout(){
			$this->session->unset_userdata('studentNumber', 'studentName', 'isAdmin');
			$this->session->sess_destroy();
			header('location: ' . base_url());
		}
	}

?>