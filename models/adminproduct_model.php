<?php
class Adminproduct_model extends Model {
    function __construct()
    {
        parent::__construct();
    }
    public function products($data){
      //reduce image
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
            $image = $_FILES["file1"]["name"];

            $uploadedfile = $_FILES['file1']['tmp_name'];


            if ($image) {

                $filename = stripslashes($_FILES['file1']['name']);

                $extension = getExtension($filename);
                $extension = strtolower($extension);


                if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {

                    $change = '<div class="msgdiv">Unknown Image extension </div> ';
                    $errors = 1;
                } else {

                    $size = filesize($_FILES['file1']['tmp_name']);


                    if ($size > MAX_SIZE * 1024) {
                        $change = '<div class="msgdiv">You have exceeded the size limit!</div> ';
                        $errors = 1;
                    }


                    if ($extension == "jpg" || $extension == "jpeg") {
                        $uploadedfile = $_FILES['file1']['tmp_name'];
                        $src = imagecreatefromjpeg($uploadedfile);

                    } else if ($extension == "png") {
                        $uploadedfile = $_FILES['file1']['tmp_name'];
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

                    $filename = "public/productimages/" . $data['rand'] . str_replace(' ', '', $_FILES['file1']['name']);
                    //$filename="public/images".$data['paymentimage'];
                    imagejpeg($tmp, $filename, 70);

                    //  imagejpeg($tmp1,$filename1,100);

                    imagedestroy($src);
                    imagedestroy($tmp);
                    //imagedestroy($tmp1);
                }
            }
        }
        $sql=$this->db->prepare("INSERT INTO tbl_products(product_name,description,imgurl,quantity,price,deposit,daily) VALUES (:pname,:description,:imgurl,:quantity,:price,:deposit,:daily)");
        $sql->execute(array(
          ':pname'=>$data['productname'],
          ':description'=>$data['description'],
          ':imgurl'=>$data['urlid'],
          ':quantity'=>$data['quantity'],
          ':price'=>$data['price'],
          ':deposit'=>$data['deposit'],
          ':daily'=>$data['daily']
        ));
}
}
