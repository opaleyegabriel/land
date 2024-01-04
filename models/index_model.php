<?php
class Index_Model extends Model
{

    function __construct()
    {
        parent::__construct();
        Session::init();
    }
          public function phone($data){
              $sql=$this->db->prepare("SELECT phone FROM tbl_profile WHERE phone=:phone");
              $sql->execute(array(
                ':phone'=>$data['phone'],
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
            public function email($data){
                $sql=$this->db->prepare("SELECT email FROM tbl_profile WHERE email=:email");
                $sql->execute(array(
                  ':email'=>$data['email'],
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
public function createaccount($data){
  
    $sql=$this->db->prepare("INSERT INTO tbl_profile(name,phone,email,agentcode) VALUES (:name,:phone,:email,:agentcode)");
     $sql->execute(array(
        ':name'=>$data['name'],
        ':phone'=>$data['phone'],
        ':email'=>$data['email'],                              
         ':agentcode'=>$data['agentcode']
    ));





                     
                     $sth=$this->db->prepare("SELECT * FROM tbl_profile");
                     $sth->execute();
                     $result=$sth->fetch();
                     $rows=$sth->rowCount();
                     if($rows > 0){

                     }
                     /*

                     $sql=$this->db->prepare("INSERT INTO tbl_profile(name,phone,email,password,agentcode) VALUES (:name,:phone,:email,:password,:agentcode)");
                       $sql->execute(array(
                          ':name'=>$data['name'],
                          ':phone'=>$data['phone'],
                          ':email'=>$data['email'],
                          ':password'=>$data['password'],                       
                           ':agentcode'=>$data['agentcode']
                      ));
                      */
                     

                     $sql=$this->db->prepare("INSERT INTO tbl_users(phone,password,login_status) VALUES (:phone,:password,:ls)");
                     $sql->execute(array(
                       ':phone'=>$data['phone'],
                       ':password'=>$data['password'],
                       ':ls'=>0

                     ));
                      header('location: '. URL . 'index');
      }


                public function lphone($data){
                    $sql=$this->db->prepare("SELECT phone FROM tbl_users WHERE phone=:phone");
                    $sql->execute(array(
                      ':phone'=>$data['lphone'],
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
              public function lpassword($data){
                  $sql=$this->db->prepare("SELECT password FROM tbl_users WHERE password=:password");
                  $sql->execute(array(
                    ':password'=>$data['lpassword'],
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

  
      public function login($data){
        //delete all existing order not approved
        $sthdelete=$this->db->prepare("DELETE FROM tbl_orders WHERE mobile=:phone AND paid=:p");
        $sthdelete->execute(array(
          ':phone'=>$data['lphone'],
          ':p'=>'N'
          ));

          $sql=$this->db->prepare("SELECT * FROM tbl_users WHERE phone=:phone AND password=:pwd");
         $sth=$this->db->prepare("SELECT * FROM tbl_profile WHERE phone=:phone" );
         $sth->execute(array(
          ':phone'=>$data['lphone']
          ));
         $result=$sth->fetch();
         $rows=$sth->rowCount();
         if($rows > 0){
                           Session::set('name',$result['name']);
                           Session::set('email',$result['email']);
                         }
                      $sql->execute(array(
                                ':phone'=>$data['lphone'],
                                ':pwd'=>$data['lpassword'],
                    ));
                                        $result=$sql->fetch();
                                        $rows=$sql->rowCount();
                                        if($row > 0 && $result['login_status']==1){
                                            $message="User found  but account closed";
                                              $found_status="No";
                                              $dat=array('message'=>$message,'found_status'=>$found_status);
                                              echo json_encode($dat);
                                        }


                                        
                                        if($rows > 0 && $result['login_status']==0){
                                            Session::set('loggedIn',true);
                                            Session::set('lphone',$data['lphone']);

                                          //  Session::set('cooperative',$_POST['cooperative']);
                                            $message="User successfully found";
                                            $found_status="Yes";
                                            $dat=array('message'=>$message,'found_status'=>$found_status);
                                            echo json_encode($dat);
                                          //  header('location: '. URL . 'dashboard');

                                          }
                                          else{
                                              $message="User not found";
                                              $found_status="No";
                                              $dat=array('message'=>$message,'found_status'=>$found_status);
                                              echo json_encode($dat);
                                            }
                                            

                                  }


          public function agentphone($data){
              $sql=$this->db->prepare("SELECT mobile FROM tbl_agent WHERE mobile=:agentphone");
              $sql->execute(array(
                ':agentphone'=>$data['agentphone'],
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
            public function agentemail($data){
                $sql=$this->db->prepare("SELECT email FROM tbl_agent WHERE email=:agentemail");
                $sql->execute(array(
                  ':agentemail'=>$data['agentemail'],
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
                                  public function createagentaccount($data){
                                        $change = "";
        $abc = "";


        define("MAX_SIZE", "6000");
        function getExtension($str)
        {
            $i = strrpos($str, ".");
            if (!$i) {
                return "";
            }
            $l = strlen($str) - $i;
            $ext = substr($str, $i + 1, $l);
            return $ext;
        }

        $errors = 0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //image1
            $image = $_FILES["file"]["name"];

            $uploadedfile = $_FILES['file']['tmp_name'];


            if ($image) {

                $filename = stripslashes($_FILES['file']['name']);

                $extension = getExtension($filename);
                $extension = strtolower($extension);


                if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {

                    $change = '<div class="msgdiv">Unknown Image extension </div> ';
                    $errors = 1;
                } else {

                    $size = filesize($_FILES['file']['tmp_name']);


                    if ($size > MAX_SIZE * 1024) {
                        $change = '<div class="msgdiv">You have exceeded the size limit!</div> ';
                        $errors = 1;
                    }


                    if ($extension == "jpg" || $extension == "jpeg") {
                        $uploadedfile = $_FILES['file']['tmp_name'];
                        $src = imagecreatefromjpeg($uploadedfile);

                    } else if ($extension == "png") {
                        $uploadedfile = $_FILES['file']['tmp_name'];
                        $src = imagecreatefrompng($uploadedfile);

                    } else {
                        $src = imagecreatefromgif($uploadedfile);
                    }

                    // echo $scr;

                    list($width, $height) = getimagesize($uploadedfile);


                    $newwidth = 500;
                    $newheight = ($height / $width) * $newwidth;
                    $tmp = imagecreatetruecolor($newwidth, $newheight);


                    $newwidth1 = 80;
                    $newheight1 = ($height / $width) * $newwidth1;
                    $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                    imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);

                    $filename = "public/productimages/" . $data['rand'] . str_replace(' ', '', $_FILES['file']['name']);
                    //$filename="public/images".$data['paymentimage'];
                    imagejpeg($tmp, $filename, 70);

                    //  imagejpeg($tmp1,$filename1,100);

                    imagedestroy($src);
                    imagedestroy($tmp);
                    //imagedestroy($tmp1);
                }
            }
        }
                                    $sql=$this->db->prepare("INSERT INTO tbl_agent(mobile,email,name,imgurl,pwd,agentid) VALUES (:name,:phone,:email,:imgurl,:password,:agentid)");
                                   $sql->execute(array(
                                     ':phone'=>$data['agentphone'],
                                     ':email'=>$data['agentemail'],
                                     ':name'=>$data['name'],
                                     ':imgurl'=>$data['urlid'],
                                     ':password'=>$data['password'],
                                     ':agentid'=>$data['agentid'],
                                     
                       


                     ));
                                   header('location: '. URL . 'index');
                                  }
}
