<?php
    class Company{
        private $conn;
        private $table= 'tbl_gl_company';

        public $id;
        public $company;
        public $address;
        public $services;
        public $email;
        public $mobile;
        public $status;
        public $created_at;




        public function __construct($db){
            $this->conn= $db;
        }

        //getting post from database
        public function read(){
            //create query
            $query='SELECT *
                FROM
                '.$this->table;
            //prepare the statement
            $sql= $this->conn->prepare($query);
            //execute query
            $sql->execute();
            return $sql;
        }
        //getting single post
        public function read_single(){
          //create query
          $query='SELECT
          id,
          company,
          address,
          services,
          email,
          mobile,
          status,
          created_at
          FROM
          '.$this->table. '
            WHERE id=? LIMIT 1
            ';
            //prepare the statement
      $sql= $this->conn->prepare($query);

      //bind parameter
      $sql->bindParam(1, $this->id);

      //execute query
      $sql->execute();

      $row=$sql->fetch(PDO::FETCH_ASSOC);

      $this->id =$row['id'];
      $this->company =$row['company'];
      $this->address =$row['address'];
      $this->services =$row['services'];
      $this->email =$row['email'];
      $this->mobile =$row['mobile'];
      $this->status =$row['status'];
      $this->created_at =$row['created_at'];
    }

    public function read_company(){
      //create query
      $query='SELECT
      id,
      company,
      address,
      services,
      email,
      mobile,
      status,
      created_at
      FROM
      '.$this->table. '
        WHERE company=? LIMIT 1
        ';
        //prepare the statement
  $sql= $this->conn->prepare($query);

  //bind parameter
  $sql->bindParam(1, $this->company);

  //execute query
  $sql->execute();

  $row=$sql->fetch(PDO::FETCH_ASSOC);

  $this->id =$row['id'];
  $this->company =$row['company'];
  $this->address =$row['address'];
  $this->services =$row['services'];
  $this->email =$row['email'];
  $this->mobile =$row['mobile'];
  $this->status =$row['status'];
  $this->created_at =$row['created_at'];
}


    public function create(){
        $query='INSERT INTO ' .$this->table . ' SET company = :company, address = :address, services = :services, email = :email, mobile = :mobile, status = :status';
        //prepare the statement
        $sql= $this->conn->prepare($query);
        


        //bind parameter
        $sql->bindParam(':company', $this->company);
        $sql->bindParam(':address', $this->address);
        $sql->bindParam(':services', $this->services);
        $sql->bindParam(':email', $this->email);
        $sql->bindParam(':mobile', $this->mobile);
        $sql->bindParam(':status', $this->status);

        //execute query
        if($sql->execute()){
            return true;
        }
        //print error if something goes wrong
        printf("Error %s. \n",$sql->error);
        return false;
    }
    public function update(){
        $query='UPDATE ' .$this->table . '
        SET  company = :company, address = :address, services = :services, email = :email, mobile = :mobile, status = :status
        WHERE id = :id;
        ';
        //prepare the statement
        $sql= $this->conn->prepare($query);
        //clean data (remove unwanted special characters)
        $this->id       =htmlspecialchars(strip_tags($this->id));
        $this->company       =htmlspecialchars(strip_tags($this->company));
        $this->address       =htmlspecialchars(strip_tags($this->address));
        $this->services      =htmlspecialchars(strip_tags($this->services));
        $this->email      =htmlspecialchars(strip_tags($this->email));
        $this->mobile      =htmlspecialchars(strip_tags($this->mobile));
        $this->status      =htmlspecialchars(strip_tags($this->status));

        //bind parameter
        $sql->bindParam(':id', $this->id);
        $sql->bindParam(':company', $this->company);
        $sql->bindParam(':address', $this->address);
        $sql->bindParam(':services', $this->services);
        $sql->bindParam(':email', $this->email);
        $sql->bindParam(':mobile', $this->mobile);
        $sql->bindParam(':status', $this->status);

        //execute query
        if($sql->execute()){
            return true;
        }
        //print error if something goes wrong
        printf("Error %s. \n",$sql->error);
        return false;
    }
    public function delete(){
        $query='DELETE FROM ' .$this->table . ' WHERE id = :id';
        //prepare the statement
        $sql= $this->conn->prepare($query);
        //clean data (remove unwanted special characters)
        $this->id =htmlspecialchars(strip_tags($this->id));
        //bind parameter
        $sql->bindParam(':id', $this->id);

        //execute query
        if($sql->execute()){
            return true;
        }
        //print error if something goes wrong
        printf("Error %s. \n",$sql->error);
        return false;

      }
    }
