<?php 

	class Student_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function checkCredentials(){
			$number = $this->input->post('logNumber');
			$password = $this->input->post('logPassword');

			$query = $this->db->get_where('student', array('studentNumber' => $number));

			if(!$query->row()){
				return 0;
			}else{
				if(password_verify($password, $query->row()->password))
					return $query->row();
				else
					return 0;
			}
		}

		public function checkSubmission($studentNumber){
			$sql = "SELECT * FROM monitor WHERE studentNumber = ? and postDate = CURDATE()";
			$params = [$studentNumber];
			$result = $this->db->query($sql, $params);
			return $result->row_array() != null ? $result->row_array() : 1;
		}

		public function submitProof($image){
			$sql = "INSERT INTO monitor VALUES (NULL, ?, ?, CURRENT_TIME(), CURDATE(), CASE WHEN TIMEDIFF(CURRENT_TIME(), '08:00:00') < 0 THEN 0 ELSE 1 END)";
			$params = [$this->session->studentNumber, $image];
			$this->db->query($sql, $params);
			return;
		}

		public function signUp(){
			header("Access-Control-Allow-Origin: *");
			$data = array(
				'id' => NULL,
				'studentNumber' => $this->input->post('sNumber'),
				'firstName' => $this->input->post('sFirstName'),
				'lastName' => $this->input->post('sLastName'),
				'section' => $this->input->post('sSection'),
				'password' => password_hash($this->input->post('sPassword'), PASSWORD_DEFAULT),
				'isAdmin' => 0
			);

			return $this->db->insert('student', $data);
		}
	}

?>