<?php
    class User{
        private $conn;
        private $table= 'tbl_adm';

        public $id;
        public $username;
        public $pwd;
        public $usertype;
        public $branch;
        public $mobile;
        public $fullname;
        public $loginstatus;


        public function __construct($db){
            $this->conn= $db;
        }

        //getting post from database
        public function read(){
           //create query
           $query='SELECT * FROM
           '.$this->table. ' WHERE branch = "1" || branch = "2" || branch = "3"';
           //prepare the statement
           $sql= $this->conn->prepare($query);
           //execute query
           $sql->execute();
           return $sql;     
        }

//GET Single Post
public function read_single(){
    $query= 'SELECT * FROM
            '. $this->table.'
            WHERE username=:username AND
            pwd=:pwd';

    //Prepare Statement
    $stmt=$this->conn->prepare($query);

    //Bind ID
    $stmt->bindParam(':username',$this->username);
    $stmt->bindParam(':pwd',$this->pwd);

    //Execute query
    $stmt->execute();

    $row=$stmt->fetch(PDO::FETCH_ASSOC);

            //Set Properties
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->pwd = $row['pwd'];
            $this->usertype = $row['usertype'];
            $this->branch = $row['branch'];
            $this->mobile = $row['mobile'];	
            $this->fullname = $row['fullname'];
            $this->loginstatus = $row['loginstatus'];

}
                
    public function create(){
        $query='INSERT INTO ' .$this->table . ' SET username = :username, pwd = :pwd, usertype = :usertype, branch = :branch, mobile = :mobile,fullname=:fullname';
        //prepare the statement
        $sql= $this->conn->prepare($query);
        //clean data (remove unwanted special characters)
        $this->username       =htmlspecialchars(strip_tags($this->username));
        $this->pwd       =htmlspecialchars(strip_tags($this->pwd));
        $this->usertype      =htmlspecialchars(strip_tags($this->usertype));
        $this->branch      =htmlspecialchars(strip_tags($this->branch));
        $this->mobile      =htmlspecialchars(strip_tags($this->mobile));
        $this->fullname      =htmlspecialchars(strip_tags($this->fullname));

        //bind parameter
        $sql->bindParam(':username', $this->username);
        $sql->bindParam(':pwd', $this->pwd);
        $sql->bindParam(':usertype', $this->usertype);
        $sql->bindParam(':branch', $this->branch);
        $sql->bindParam(':mobile', $this->mobile);
        $sql->bindParam(':fullname', $this->fullname);

        //execute query
        if($sql->execute()){
            return true;
        }
        //print error if something goes wrong
        printf("Error %s. \n",$sql->error);
        return false;
    }
    public function logoutuser(){
        $query='UPDATE ' .$this->table. '
        SET  loginstatus = "0"
        WHERE username =:username
        ';
        //prepare the statement
        $sql= $this->conn->prepare($query);
        //clean data (remove unwanted special characters)
        $this->username=htmlspecialchars(strip_tags($this->username));
        
        //bind parameter
        $sql->bindParam(':username', $this->username);
        
        //execute query
        if($sql->execute()){
            return true;
        }
        //print error if something goes wrong
        printf("Error %s. \n",$sql->error);
        return false;
    }
    
}
