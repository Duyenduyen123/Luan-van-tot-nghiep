<?php 
    class OrderModel extends DB{
        public function insert($user_id,$full_name,$phone,$email,$status,$created_at,$updated_at,$passport,$av, $hoc_bong,$diemtb,$diemtl,$trao_doi, $nckh,$ma_lop,$nganh,$ngay_sinh,$hinh_thuc,$image,$name){
           
            $query = "INSERT INTO tbl_order VALUES(null,'$user_id','$full_name','$phone','$email','$status','$created_at','$updated_at', '$passport','$av', '$hoc_bong','$diemtb','$diemtl','$trao_doi', '$nckh','$ma_lop','$nganh','$ngay_sinh','$hinh_thuc','$image','$name')";
            $result = false;
            // echo $query;
            // die();
            if($this->con->query($query)){
                $result = true;
            }
            if($result){
                return json_encode($this->con->lastInsertId());
            }
        }

        public function getList(){
            $query = "SELECT * FROM tbl_order order by created_at DESC";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }
        // public function getOrdersByStatus($status){
        //     $query = "SELECT * FROM tbl_order WHERE status = $status";
        //     $result = false;
        //     if($this->con->query($query)){
        //         $result = true;
        //     }
        //     return json_encode($result);
        // }

        public function delete_order_id($order_id){
            $query = "DELETE FROM tbl_order WHERE id = '$order_id'";
            $result = false;
            if($this->con->query($query)){
                $result = true;
            }
            return json_encode($result);
        }

        public function getId($order_id){
            $query = "SELECT * FROM tbl_order WHERE id = '$order_id' order by updated_at DESC";
            $result = $this->con->query($query);
            if($result->rowCount() >0){
               $row = $result->fetch();
                $row['order_detail'] = array();
            }
            return json_encode($row);
        }

        public function getUser_id($user_id){
            $query = "SELECT * FROM tbl_order WHERE user_id = '$user_id' order by updated_at DESC";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function update($id,$full_name,$status,$updated_at,$passport,$av, $hoc_bong,$diemtb,$diemtl,$trao_doi, $nckh,$ma_lop,$nganh,$ngay_sinh,$hinh_thuc,$image,$name){
            $query = "UPDATE tags SET  name = '$full_name', status = '$status', updated_at = '$updated_at', passport = '$passport', av = '$av', hoc_bong = '$hoc_bong', diemtb = '$diemtb', diemtl = '$diemtl', trao_doi = '$trao_doi', nckh = '$nckh', ma_lop = '$ma_lop', nganh = '$nganh', ngay_sinh ='$ngay_sinh', hinh_thuc='$hinh_thuc','$image','$name' WHERE id = '$id'";
            $result = false;
            if($this->con->query($query)){
                $result = true;
            }
            return json_encode($result);
        }

        public function update_status($order_id){
            $query = "UPDATE tbl_order SET status = '1'  WHERE id = '$order_id'";
            $result = false;
            if($this->con->query($query)){
                $result = true;
            }
            return json_encode($result);
        }

        public function update_status_nhan_hang($order_id){
            $query = "UPDATE tbl_order SET status = '2'  WHERE id = '$order_id'";
            $result = false;
            if($this->con->query($query)){
                $result = true;
            }
            return json_encode($result);
        }

        public function count_order(){
            $query = "SELECT * from tbl_order";
            $result = $this->con->query($query);
            return json_encode($result->rowCount());
        }

        public function getListLimit($start_in,$number_display){
            $query = "SELECT * FROM tbl_order order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_hocbong($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where hoc_bong = '0' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_hocbong_khong($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where hoc_bong = '1' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_av_b1($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where av = '0' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_av_toeic($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where av = '1' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_av_ielts($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where av = '2' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_nckh_0($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where nckh = '0' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_nckh_1($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where nckh = '1' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_nckh_2($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where nckh = '2' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_nckh_3($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where nckh = '3' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_hinh_thuc_0($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where hinh_thuc = '0' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_hinh_thuc_1($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where hinh_thuc = '1' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_status($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where status= '0' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }

        public function getListLimit_status1($start_in,$number_display){
            $query = "SELECT * FROM tbl_order where status= '1' order by created_at DESC limit $start_in,$number_display";
            $result = $this->con->query($query);
            $arr = array();
            if($result->rowCount() >0){
                while($row = $result->fetch()){
                    $row['order_detail'] = array();
                    array_push($arr,$row);
                }
            }
            return json_encode($arr);
        }
        

    }
?>