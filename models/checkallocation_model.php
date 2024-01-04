<?php
  class Checkallocation_Model extends Model{
    public function searchbyphone($data){
      $sql=$this->db->prepare("SELECT * FROM tbl_profile INNER JOIN tbl_realallocation ON tbl_profile.phone=tbl_realallocation.mobile WHERE tbl_realallocation.mobile=:phone");
      $sql->execute(array(
        ':phone'=>$data['phone'],
      ));
      $rows=$sql->rowCount();
      if($rows == 1){
        $result=$sql->fetch();
        $res = [
          'status' => 200,
          'message' => 'Data Fetched successfully ',
          'data' => $result
        ];
        echo json_encode($res);
        return false;
      }else {
        // code...
        $res = [
          'status' => 404,
          'message' => 'Data Not Found '
        ];
        echo json_encode($res);
        return false;
      }
   }
 }
