<?php
class PartnerModel extends DB{
    public function insert($user_name,$name,$email,$password,$country,$created_at,$updated_at,$address_detail){
        $query= "INSERT INTO partner values ('','$user_name','$name','$email','$password','$country',null,'$created_at','$updated_at','$address_detail')";
    //    echo $query;
    //    die();
        $result = false;
        if($this->con->query($query)){
            $result = true;
        }
        return json_encode($result);
    }

    public function test_login($email,$password){
        $query = "SELECT * FROM partner where email='$email' AND password = '$password'";
        $result = false;
        $kq = $this->con->query($query);
        if($kq->rowCount() > 0){
            $result = $kq->fetch();
        }
        return json_encode($result);
    }

    public function getList(){
        $query = "SELECT * FROM partner";
        $result = $this->con->query($query);
        $arr = array();
        if($result->rowCount() >0){
            while($row = $result->fetch()){
                array_push($arr,$row);
            }
        }
        return json_encode($arr);
    }

    public function getId($id){
        $query = "SELECT * FROM partner WHERE id = '$id'";
        $result = $this->con->query($query);
        if($result->rowCount() > 0){
            $row = $result->fetch();
        }
        return json_encode($row);
        
    }

    public function update($user_name,$name,$email,$country,$image,$updated_at,$address_detail,$id){
        $query = "UPDATE partner SET user_name='$user_name', name='$name',email='$email',country='$country',image = '$image', updated_at='$updated_at', address_detail='$address_detail' WHERE id = '$id'";
        $result = false;
        if($this->con->query($query)){
            $result = true;
        }
        return json_encode($result);
    }

    public function count_partner(){
        $query = "SELECT * from partner";
        $result = $this->con->query($query);
        return json_encode($result->rowCount());
    }
}
