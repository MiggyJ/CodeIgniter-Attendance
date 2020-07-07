<?php 

	class Monitor_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function getAttendance($section, $date){
			header("Access-Control-Allow-Origin: *");
			header('Content-Type: application/json');

			$this->db->order_by('postTime', 'ASC');
			$this->db->join('student', 'student.studentNumber = monitor.studentNumber');
			$query = $this->db->get_where('monitor', array('postDate' => $date, 'section' => $section));
			return $query->result();
		}

		public function getAll($date){
			$sql = "SELECT * FROM monitor WHERE postDate = ?";
			$params = [$date];
			$query = $this->db->query($sql, $params);
			return count($query->result());
		}
	}

?>