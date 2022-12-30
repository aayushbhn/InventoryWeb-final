<?php 

 
// class PageDb { 
//     private $dbHost     = DB_HOST; 
//     private $dbUsername = DB_USERNAME; 
//     private $dbPassword = DB_PASSWORD; 
//     private $dbName     = DB_NAME; 
//     private $dbTable    = 'user_db'; 
     
//     function __construct(){ 
//         if(!isset($this->db)){ 
//             // Connect to the database 
//             $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName); 
//             if($conn->connect_error){ 
//                 die("Failed to connect with MySQL: " . $conn->connect_error); 
//             }else{ 
//                 $this->db = $conn; 
//             } 
//         } 
//     } 
     
//     /* 
//      * Returns rows from the database based on the conditions 
//      * @param array select, where, order_by, limit and return_type conditions 
//      */ 
//     public function getRows($conditions = array()){ 
//         $sql = 'SELECT '; 
//         $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*'; 
//         $sql .= ' FROM '.$this->dbTable; 
//         if(array_key_exists("where",$conditions)){ 
//             $sql .= ' WHERE '; 
//             $i = 0; 
//             foreach($conditions['where'] as $key => $value){ 
//                 $pre = ($i > 0)?' AND ':''; 
//                 $sql .= $pre.$key." = '".$value."'"; 
//                 $i++; 
//             } 
//         } 
         
//         if(array_key_exists("order_by",$conditions)){ 
//             $sql .= ' ORDER BY '.$conditions['order_by'];  
//         }else{ 
//             $sql .= ' ORDER BY id DESC ';  
//         } 
         
//         if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){ 
//             $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];  
//         }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){ 
//             $sql .= ' LIMIT '.$conditions['limit'];  
//         } 
         
//         $stmt = $this->db->prepare($sql); 
//         $stmt->execute(); 
//         $result = $stmt->get_result(); 
         
//         if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){ 
//             switch($conditions['return_type']){ 
//                 case 'count': 
//                     $data = $result->num_rows; 
//                     break; 
//                 case 'single': 
//                     $data = $result->fetch_assoc(); 
//                     break; 
//                 default: 
//                     $data = ''; 
//             } 
//         }else{ 
//             if($result->num_rows > 0){ 
//                 while($row = $result->fetch_assoc()){ 
//                     $data[] = $row; 
//                 } 
//             } 
//         } 
//         return !empty($data)?$data:false; 
//     } 
     
//     /* 
//      * Insert data into the database 
//      * @param array the data for inserting into the table 
//      */ 
//     public function insert($data){ 
//         if(!empty($data) && is_array($data)){ 
//             if(!array_key_exists('created',$data)){ 
//                 $data['created'] = date("Y-m-d H:i:s"); 
//             } 
//             if(!array_key_exists('modified',$data)){ 
//                 $data['modified'] = date("Y-m-d H:i:s"); 
//             } 
 
//             $placeholders = array_fill(0, count($data), '?'); 
 
//             $columns = $values = array(); 
//             foreach($data as $key=>$val){ 
//                 $columns[] = $key; 
//                 //$values[] = !empty($val)?$this->db->real_escape_string($val):NULL; 
//                 $values[] = !empty($val)?$val:NULL; 
//             } 
 
//             $sqlQ = "INSERT INTO {$this->dbTable} (".implode(', ', $columns).") VALUES (".implode(', ', $placeholders)."); ";  
//             $stmt = $this->db->prepare($sqlQ); 
 
//             $types  = array(str_repeat('s', count($values)));  
//             $params = array_merge($types, $values);  
 
//             call_user_func_array(array($stmt, 'bind_param'), $params);  
 
//                $insert = $stmt->execute(); 
//             return $insert?$this->db->insert_id:false; 
//         }else{ 
//             return false; 
//         } 
//     } 
     
//     /* 
//      * Update data into the database 
//      * @param array the data for updating into the table 
//      * @param array where condition on updating data 
//      */ 
//     public function update($data, $conditions){ 
//         if(!empty($data) && is_array($data)){ 
//             if(!array_key_exists('modified', $data)){ 
//                 $data['modified'] = date("Y-m-d H:i:s"); 
//             } 
 
//             $placeholders = array_fill(0, count($data), '?'); 
 
//             $columns = $values = array(); 
//             foreach($data as $key=>$val){ 
//                 $columns[] = $key; 
//                 //$values[] = !empty($val)?$this->db->real_escape_string($val):NULL; 
//                 $values[] = !empty($val)?$val:NULL; 
//             } 
 
//             $whr_columns = $whr_values = array(); 
//             $where_columns = ''; 
//             if(!empty($conditions)&& is_array($conditions)){ 
//                 foreach($conditions as $key=>$val){ 
//                     $whr_columns[] = $key; 
//                     $whr_values[] = !empty($val)?$this->db->real_escape_string($val):NULL; 
//                 } 
 
//                 $where_columns = " WHERE ".implode('=?, ', $whr_columns)."=? "; 
//             } 
             
//             $sqlQ = "UPDATE {$this->dbTable} SET ".implode('=?, ', $columns)."=? $where_columns "; 
//             $stmt = $this->db->prepare($sqlQ); 
 
//             if(!empty($whr_columns)){ 
//                 $values_where_arr = array_merge($values, $whr_values); 
//                 $types  = array(str_repeat('s', count($values_where_arr))); 
//                 $params = array_merge($types, $values_where_arr); 
//             }else{ 
//                 $types  = array(str_repeat('s', count($values)));  
//                 $params = array_merge($types, $values);  
//             } 
             
//             call_user_func_array(array($stmt, 'bind_param'), $params);  
 
//                $update = $stmt->execute(); 
//             return $update?$this->db->affected_rows:false; 
//         }else{ 
//             return false; 
//         } 
//     } 
     
//     /* 
//      * Delete data from the database 
//      * @param array where condition on deleting data 
//      */ 
//     public function delete($id){ 
//         $sqlQ = "DELETE FROM {$this->dbTable} WHERE id=?";  
//         $stmt = $this->db->prepare($sqlQ); 
//         $stmt->bind_param("i", $id); 
//         $delete = $stmt->execute(); 
//         return $delete?true:false; 
//     } 
 
//     public function isPageExists($title, $id=''){ 
//         $sqlQ = "SELECT * FROM {$this->dbTable} WHERE LOWER(title)=?"; 
//         if(!empty($id)){ 
//             $sqlQ .= " AND id != ?"; 
//         } 
//         $stmt = $this->db->prepare($sqlQ); 
 
//         if(!empty($id)){ 
//             $stmt->bind_param("si", $title_lwr, $id); 
//         }else{ 
//             $stmt->bind_param("s", $title_lwr); 
//         } 
//         $title_lwr = strtolower($title); 
         
//         $stmt->execute(); 
//         $result = $stmt->get_result(); 
//         return $result->num_rows > 0?true:false; 
//     } 
 
//     public function generatePageUri($string, $wordLimit = 0){  
//         $separator = '_';  
          
//         if($wordLimit != 0){  
//             $wordArr = explode(' ', $string);  
//             $string = implode(' ', array_slice($wordArr, 0, $wordLimit));  
//         }  
      
//         $quoteSeparator = preg_quote($separator, '#');  
      
//         $trans = array(  
//             '&.+?;'                 => '',  
//             '[^\w\d _-]'            => '',  
//             '\s+'                   => $separator,  
//             '('.$quoteSeparator.')+'=> $separator  
//         );  
      
//         $string = strip_tags($string);  
//         foreach ($trans as $key => $val){  
//             $string = preg_replace('#'.$key.'#iu', $val, $string);  
//         }  
      
//         $string = strtolower($string);  
      
//         return trim(trim($string, $separator));  
//     } 
// }