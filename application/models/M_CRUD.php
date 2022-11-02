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

		public function autoNumberExpTerms($table, $column, $prefix, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = $prefix.str_pad($code, $run_number, 0, STR_PAD_LEFT);

			return $code;
		}

		public function autoNumberInvoice($table, $column, $prefix, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).$prefix;

			return $code;
		}

		public function autoNumberQCheck($table, $column, $prefix, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).$prefix;

			return $code;
		}

		public function autoNumberPacking($table, $column, $prefix, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).$prefix;

			return $code;
		}

		public function autoNumberCOA($table, $column, $prefix, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).$prefix;

			return $code;
		}

		public function autoNumberProdSpec($table, $column, $prefix, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).$prefix;

			return $code;
		}

		public function autoNumberQCert($table, $column, $prefix, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).$prefix;

			return $code;
		}

		public function autoNumberSPP($table, $column, $prefix, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).$prefix;

			return $code;
		}

		public function autoNumberDocImport($table, $column, $prefix, $run_number) {
			$this->db->from($table);
			$this->db->order_by($column, 'DESC');
			$query = $this -> db -> get();
			$record = $query -> row();

			if(!$record) {
				$code = 1;
			} else {
				$code = intval($record->code) + 1;
			}

			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).$prefix;

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

			$code = str_pad($code, $run_number, 0, STR_PAD_LEFT).'/SKP-EXP/PI/'.$date;

			return $code;
		}

		public function pi_category($table, $params = NULL)
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
					$result[$rows['item_category_id']] = $rows;
				}
			}
			
			return $result;
        }

		public function pi_item($table, $params = NULL)
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
					$result[$rows['pi_item_category_id']][$rows['id']] = $rows;
				}
			}
			
			return $result;
        }

		public function invoice_list($table, $params = NULL)
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
					if($rows['qcontrol_check_id']) {
						$result[$rows['pi_item_category_id']][$rows['qcontrol_check_id']] = $rows;
					} else {
						$result[$rows['pi_item_category_id']][$rows['id']] = $rows;
					}
				}
			}
			
			return $result;
        }

		public function signed_item($table, $params = NULL)
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
					$result[$rows['id']]['id'] = $rows['id'];
					$result[$rows['id']]['item'] = $rows['item'];
					$result[$rows['id']]['option_id'] = $rows['option_id'];
					$result[$rows['id']]['name'] = $rows['name'];
				}
			}
			
			return $result;
        }

		public function pi_item_role($table, $params = NULL)
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
					$result[$rows['pi_item_id']]['role_id'] = $rows['role_id'];
					$result[$rows['pi_item_id']]['pi_item_id'] = $rows['pi_item_id'];
				}
			}
			
			return $result;
        }

		function pi_email($table)
        {
            $result = [];
            $this -> db -> from($table);
            $query = $this -> db -> get();

            foreach($query->result_array() as $rows) {
                $result[] = $rows['email'];
            }

            return $result;
        }

		private function _get_datatables_query($table, $column_order, $column_search, $order_by)
        {
            $this->db->from($table);
            $i = 0;
        
            foreach ($column_search as $item)
            {
                if($_POST['search']['value']) {
                    if($i===0) {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }
    
                    if(count($column_search) - 1 == $i) {
                        $this->db->group_end();
                    }
                }

                $i++;
            }
            
            if(isset($_POST['order'])) {
                $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }  else if(isset($this->order)) {
                $order = $order_by;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }

        public function get_datatables($table, $column_order, $column_search, $order_by)
        {
            $this->_get_datatables_query($table, $column_order, $column_search, $order_by);
            if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }

        public function count_filtered($table, $column_order, $column_search, $order_by)
        {
            $this->_get_datatables_query($table, $column_order, $column_search, $order_by);
            $query = $this->db->get();
            return $query->num_rows();
        }
    
        public function count_all($table)
        {
            $this->db->from($table);
            return $this->db->count_all_results();
        }
    }

?>