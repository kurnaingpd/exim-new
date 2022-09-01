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

        public function readDatabyID($table, $params)
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

        public function query($id)
        {
            $query = $this->db->query("CALL gpd_mlbc_process_invoice_iface(".$id.")");
            return $query -> result();
        }

        public function assignmodule($table, $params = NULL)
        {
            $result = array();
            $this -> db -> from($table);
			if($params) {
				foreach($params as $conditions => $val) {
					$this -> db -> where($conditions, $val);
				}
			}

			$query = $this -> db -> get();
            

            if($query -> num_rows() > 0)
			{
				foreach($query -> result_array() as $rows)
				{
					$result[$rows['menu_module_id']] = $rows;
				}
			}
			
			return $result;
        }

        public function assigngroup($table, $params = NULL)
        {
            $result = array();
            $this -> db -> from($table);
			if($params) {
				foreach($params as $conditions => $val) {
					$this -> db -> where($conditions, $val);
				}
			}

			$query = $this -> db -> get();
            

            if($query -> num_rows() > 0)
			{
				foreach($query -> result_array() as $rows)
				{
					$result[$rows['menu_group_id']] = $rows;
				}
			}
			
			return $result;
        }

        public function assignmenu($table, $params = NULL)
        {
            $result = array();
            $this -> db -> from($table);
			if($params) {
				foreach($params as $conditions => $val) {
					$this -> db -> where($conditions, $val);
				}
			}
			
			$query = $this -> db -> get();

            if($query -> num_rows() > 0)
			{
				foreach($query -> result_array() as $rows)
				{
					$result[$rows['menu_group_id']][$rows['menu_sub_id']] = $rows;
				}
			}
			
			return $result;
        }

		public function autoNumber($table, $column, $prefix, $country, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = $prefix.$country.str_pad($code, $run_number, 0, STR_PAD_LEFT);

			return $code;
		}

		public function autoNumberPI($table, $column, $date, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			// $code = $prefix.$country.str_pad($code, $run_number, 0, STR_PAD_LEFT);
			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).'/SKP-EXP/PI/'.$date;

			return $code;
		}
    }

?>