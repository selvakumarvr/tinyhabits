
<?php

class Tinyhabit_model extends Model {


	function getAllHabits($username){


		$data = array();

		$this->db->where('username', $username);
		$this->db->where('status', 'active');
		$Q = $this->db->get('tinyhabit');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}


	function getCurrentHabits($username){

		//$this->output->enable_profiler(TRUE);
		$data = array();
		$this->db->select( 'tinyhabit.id tinyhabitid,username,name,desc,status,isCurrent,completedTimes,trackhabits.id trackhabitid,habitid,start_date,day1,day2,day3,day4,day5');
		$this->db->where('username', $username);
		$this->db->where('status', 'active');
		$this->db->where('isCurrent', '1');


		$this->db->join("trackhabits", "trackhabits.habitid=tinyhabit.id and trackhabits.start_date = (select max(start_date) from trackhabits where trackhabits.habitid=tinyhabit.id )","left") ;
		$Q = $this->db->get('tinyhabit');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();

		log_message('debug',$data);
		return $data;

	}




	function swapCurrent($habitid){
		$data = array();
		$this->db->where('id', $habitid);

		$Q = $this->db->get('tinyhabit');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();

		print_r($data);
		if( $data[0]['isCurrent'] == 1){

			$data[0]['isCurrent'] =0;
			$this->start_track_habits($habitid);
		}else {
			$data[0]['isCurrent']=1;
			$this->start_track_habits($habitid);
				
		}


		$this->db->where('id', $habitid);
		$this->db->update('tinyhabit', $data[0]);


		return $data;
	}


	function update_habitcount($habitid,$count){

		$data = array();
		$this->db->where('id', $habitid);

		$Q = $this->db->get('tinyhabit');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();

		$data[0]['completedTimes'] = $data[0]['completedTimes']+$count;

		$this->db->where('id', $habitid);
		$this->db->update('tinyhabit', $data[0]);
	}


	function update_trackhabit($trackid,$day){
		$data = array();
		$this->db->where('id', $trackid);

		$Q = $this->db->get('trackhabits');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();


		if( $data[0][$day] == true){

			$data[0][$day] =false;
		}else {
			$data[0][$day]=true;
		}


		$this->db->where('id', $trackid);
		$this->db->update('trackhabits', $data[0]);
		log_message('debug' ,print_r($data[0]));

		if($data[0]['day1'] ==true && ($data[0]['day2']==true)  && ($data[0]['day3']==true)  && ($data[0]['day4']==true)  && ($data[0]['day5']==true)){
			$count =1;
			$this->update_habitcount( $data[0]['habitid'],$count);

		}


		return $data;
	}




	function  start_track_habits($habitid)
	{

		$new_trackhabits_insert_data = array(
				'habitid' => $habitid ,
				'start_date' => date('Y-m-d H:i:s'),
				'day1' => false,
				'day2' => false,
				'day3' => false,
					'day4' => false,
				'day5' => false
		);

		$insert = $this->db->insert('trackhabits', $new_trackhabits_insert_data);
		return $insert;
	}



	function create_habits()
	{

		$new_habit_insert_data = array(
				'name' => $this->input->post('name'),
				'username' => $this->session->userdata('username'),
				'isCurrent' => $this->input->post('isCurrent'),
				'status' => 'active',

		);

		$insert = $this->db->insert('tinyhabit', $new_habit_insert_data);
		return $insert;
	}

	function delete_habit($deleteid)
	{

		$this->db->delete('tinyhabit', array('id' => $deleteid));

	}
}