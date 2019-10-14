<?php 
// Start File

class DbOperation
{
    private $con;
    private $dbObject;

    function __construct()
    {
        require_once 'connection.php';
        require_once 'model.php';
       

        $this->dbObject = new Database("pdo");
        $this->con = $this->dbObject->getDbConnection();

    }

    public function closeDBConnection()
    {
        $this->con = null; 
        $this->dbObject->closeMyDBConnection();
        $this->dbObject = null;
    }

  function AddRecord($name, $contact_no, $address)
    {

        $query = "INSERT INTO `info_table`(`name`, `contact_no`, `address`) VALUES ('$name','$contact_no','$address')";
        $stmt = $this->con->prepare($query);
        if($stmt->execute())
        {
            return true;
        } 
        else
        {
          return false;
        }    
    }


    function UpdateRecord($id, $name, $contact_no, $address)
    {

        $sqlCommand = "UPDATE info_table SET info_table.name= '$name', info_table.contact_no = '$contact_no', info_table.address= '$address' WHERE info_table.id = '$id' ";
        $stmt = $this->con->prepare($sqlCommand);
        if($stmt->execute())
        {
            return true;
        } 
        else
        {
          return false;
        }    
    }

     

     function DeleteRecord($id)
    {

        $sqlCommand = "DELETE FROM info_table WHERE info_table.id = '$id' ";
        $stmt = $this->con->prepare($sqlCommand);
        if($stmt->execute())
        {
            return true;
        } 
        else
        {
          return false;
        }    
    }

 


    public function GetAllData()
    {
        $users = array();

        $sqlCommand = "SELECT * FROM info_table";
        $stmt = $this->con->prepare($sqlCommand);
        $stmt->execute(); 
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

       

        foreach ($results as $user) 
        {
          
          $singleUser = new Info();

          $singleUser->id = $user->id;
          $singleUser->name = $user->name;
          $singleUser->contact_no = $user->contact_no;
          $singleUser->address = $user->address;
          

          $users[] = $singleUser;
        }

        return $users;
    }
   

   }
  
 


?> 
