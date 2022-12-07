<?php

    Class M_CRUD_Exp extends CI_Model
    {
        private $db2;
        public function __construct()
        {
            parent::__construct();
            $this->db2 = $this->load->database('export', TRUE);
        }

        public function readData($table, $params = NULL)
        {
            $this -> db2 -> from($table);
			if($params) {
				foreach($params as $conditions => $val) {
					$this -> db2 -> where($conditions, $val);
				}
			}
			
			$query = $this -> db2 -> get();
			
			return $query -> result();
        }

		public function readDataIn($table, $params = NULL)
        {
            $this -> db2 -> from($table);
			if($params) {
				foreach($params as $conditions => $val) {
					$this -> db2 -> where_in($conditions, $val);
				}
			}
			
			$query = $this -> db2 -> get();
			
			return $query -> result();
        }

        public function readDatabyID($table, $params = NULL)
        {
            $this -> db2 -> from($table);
			if($params) {
				foreach($params as $conditions => $val) {
					$this -> db2 -> where($conditions, $val);
				}
			}
			
			$query = $this -> db2 -> get();
			
			return $query -> row();
        }

		public function insertData($table, $data)
        {
            $this -> db2 -> insert($table, $data);
			if($this -> db2 -> affected_rows() > 0){
				Return $this -> db2 -> insert_id();
			}
        }

        public function updateData($table, $data, $where)
        {
            $this -> db2 -> update($table, $data, $where);
			return $this -> db2 -> affected_rows();

        }

        public function deleteData($table, $where)
        {
            $this -> db2 -> update($table, ['is_deleted' => '1'], $where);
			return $this -> db2 -> affected_rows();
        }

        public function deletePermanent($table, $where)
        {
            $this -> db2 -> delete($table, $where);
            return $this -> db2 -> affected_rows();
        }
    }

?>