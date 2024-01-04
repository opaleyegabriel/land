<?php
  class Adminaddallocation_Model extends Model{
    public function searchbyphone($data){
      $sql=$this->db->prepare("SELECT * FROM tbl_profile INNER JOIN tbl_orders ON tbl_profile.phone=tbl_orders.mobile WHERE tbl_profile.phone=:phone");
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
   public function checkallocation($data){
    $sql=$this->db->prepare("SELECT * FROM tbl_realallocation WHERE  phase=:phase AND block=:block AND plot=:plot ");
    $sql->execute(array(
      ':phase'=>$data['phase'],
      ':block'=>$data['block'],
      ':plot'=>$data['plot']
    ));
    $result=$sql->fetch();
    $rows=$sql->rowCount();
    if($rows > 0){
      //  Session::set('cooperative',$_POST['cooperative']);
      $message="User successfully found";
      $found_status="Yes";
      $dat=array('message'=>$message,'found_status'=>$found_status);
      echo json_encode($dat);
    }
    else{
      $message="User not found";
      $found_status="No";
      $dat=array('message'=>$message,'found_status'=>$found_status);
      echo json_encode($dat);
    }
  }
  public function saveallocation($data){
    $sql=$this->db->prepare(" INSERT INTO  tbl_realallocation (site,phase,block,plot) VALUES (:site,:phase,:block,:plot) ");
    $sql->execute(array(
      ':site'=>$data["site"],
      ':phase'=>$data["phase"],
      ':block'=>$data["block"],
      ':plot'=>$data["plot"],
    ));
    echo '<script type="text/javascript">';
      echo 'alert("Allocation entered Successfully");
      window.location.href = "'.URL .'adminaddallocation";';
    echo "</script>";
  }
  }
