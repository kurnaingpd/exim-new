<?php

    Class M_CRUD extends CI_Model
    {
        public function readData($table, $params = NULL)
        {
            $this -> db -> from($table);
			if($params) {
				foreach($params as $conditions => $val) {
					$this -> db -> where($conditions, $val);
				}
			}
			
			$query = $this -> db -> get();
			
			return $query -> result();
        }

		public function readDataIn($table, $params = NULL)
        {
            $this -> db -> from($table);
			if($params) {
				foreach($params as $conditions => $val) {
					$this -> db -> where_in($conditions, $val);
				}
			}
			
			$query = $this -> db -> get();
			
			return $query -> result();
        }

        public function readDatabyID($table, $params = NULL)
        {
            $this -> db -> from($table);
			if($params) {
				foreach($params as $conditions => $val) {
					$this -> db -> where($conditions, $val);
				}
			}
			
			$query = $this -> db -> get();
			
			return $query -> row();
        }

		public function insertData($table, $data)
        {
            $this -> db -> insert($table, $data);
			if($this -> db -> affected_rows() > 0){
				Return $this -> db -> insert_id();
			}
        }

        public function updateData($table, $data, $where)
        {
            $this -> db -> update($table, $data, $where);
			return $this -> db -> affected_rows();

        }

        public function deleteData($table, $where)
        {
            $this -> db -> update($table, ['is_deleted' => '1'], $where);
			return $this -> db -> affected_rows();
        }

        public function deletePermanent($table, $where)
        {
            $this -> db -> delete($table, $where);
            return $this -> db -> affected_rows();
        }
    }

?>