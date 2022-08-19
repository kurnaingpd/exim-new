<?php

    Class MUserImport extends CI_Model
    {
        public function list()
        {
            $this -> db -> from('gimp_user');
            $query = $this -> db -> get();
			return $query -> result_array();

        }

        Public Function save($data)
		{
			$this -> db -> insert('gimp_user', $data);
			if($this -> db -> affected_rows() > 0){
				Return $this -> db -> insert_id();
			}
		}

        public function getUserByUsername($where)
        {
            $this -> db -> from('gimp_user');
            $this -> db -> where('user_username', $where);
            $query = $this -> db -> get();
			return $query -> result_array();

        }

        public function getUserByID($where)
        {
            $this -> db -> from('gimp_user');
            $this -> db -> where('user_id', $where);
            $query = $this -> db -> get();
			return $query -> row();

        }

        Public Function update($data = NULL, $where = NULL)
		{
			$this -> db -> update('gimp_user', $data, $where);
			return $this -> db -> affected_rows();
		}
    }

?>