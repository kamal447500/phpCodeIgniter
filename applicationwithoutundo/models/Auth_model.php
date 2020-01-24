<?php

	class Auth_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getRecords()
	    {
	        $query = $this->db->get_where('customer', ['status' => 1]);
	        return $query->result();
	    }

	    public function saveRecord( $data )
	    {
	        return $this->db->insert('customer', $data);
	    }

	    public function getAllRecords( $record_id ){
	       	$query = $this->db->get_where('customer', array('id' => $record_id, 'status' => 1));
	        if( $query->num_rows() > 0 ){
	            return $query->row();
	        }
	    }

	    public function updateRecords( $record_id, $data ){
	        return $this->db->where('id', $record_id)
	                ->update('customer', $data);    
	    }

	    public function deleteRecords( $record_id ){
	    	//	HARD DELETE
	        //	return $this->db->delete('customer', array('id' => $record_id ));

	        //	SOFT DELETE
	     	return $this->db->where('id', $record_id)
	     	->set('status',2)
	     	->update('customer');       
	    }
	 
	}
?>