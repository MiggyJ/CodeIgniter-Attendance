<?php

	class Admin extends CI_Controller{
		public function index() {

			if($this->session->isAdmin == 0){
				redirect('');
			}

			$data['title'] = 'Admin';
			$this->load->view('templates/header');
			$this->load->view('admin/index');
			$this->load->view('templates/footer-admin');
		}

		public function attendance($section, $date){

			$section = str_replace('%20', ' ', $section);
			$result = $this->Monitor_model->getAttendance($section, $date);

			$data = array();

			foreach($result as $row){
				$sub_array = array();
				$sub_array['studentNumber'] = $row->studentNumber;
				$sub_array['name'] = $row->firstName . ' ' . $row->lastName;
				$sub_array['image'] = $row->image;
				$sub_array['isLate'] = $row->isLate == 1 ? 'LATE' : 'GOOD';

				$data[] = $sub_array;
			}
			
			$output = array(
				"draw"            => intval($_GET['draw']),
				"recordsTotal"    => $this->Monitor_model->getAll($date),
				"recordsFiltered" => count($result),
				"data"            => $data
			);

			
			echo json_encode($output);
		}
	}

?>