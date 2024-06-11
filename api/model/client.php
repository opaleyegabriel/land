<?php
    class Client{
        private $conn;
        private $table= 'tbl_profile';

        public $id;
        public $name;
        public $phone;
        public $email;
        public $agentcode;
        public $accountofficer;
        public $created_at;
        
        public function __construct($db){
            $this->conn= $db;
        }

        //getting post from database
        public function read(){
           //create query
           $query='SELECT * FROM
           '.$this->table;
           //prepare the statement
           $sql= $this->conn->prepare($query);
           //execute query
           $sql->execute();
           return $sql;     
        }

//GET Single client
public function read_single(){
    $query= 'SELECT * FROM
            '. $this->table.'
            WHERE phone=:phone';

    //Prepare Statement
    $stmt=$this->conn->prepare($query);

    //Bind ID
    $stmt->bindParam(':phone',$this->phone);
    
    //Execute query
    $stmt->execute();

    $row=$stmt->fetch(PDO::FETCH_ASSOC);

            //Set Properties
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->phone = $row['phone'];
            $this->email = $row['email'];
            $this->agentcode = $row['agentcode'];
            $this->accountofficer = $row['accountofficer'];	            

}
                
    public function create(){
        $query='INSERT INTO ' .$this->table . ' SET name = :name, phone = :phone, email = :email, agentcode = :agentcode, accountofficer = :accountofficer';
        //prepare the statement
        $sql= $this->conn->prepare($query);
        //clean data (remove unwanted special characters)
        $this->name       =htmlspecialchars(strip_tags($this->name));
        $this->phone       =htmlspecialchars(strip_tags($this->phone));
        $this->email      =htmlspecialchars(strip_tags($this->email));
        $this->agentcode      =htmlspecialchars(strip_tags($this->agentcode));
        $this->$accountofficer      =htmlspecialchars(strip_tags($this->$accountofficer));
       

        //bind parameter
        $sql->bindParam(':name', $this->name);
        $sql->bindParam(':phone', $this->phone);
        $sql->bindParam(':email', $this->email);
        $sql->bindParam(':agentcode', $this->agentcode);
        $sql->bindParam(':accountofficer', $this->accountofficer);
        

        //execute query
        if($sql->execute()){
            return true;
        }
        //print error if something goes wrong
        printf("Error %s. \n",$sql->error);
        return false;
    }
    
}
