<?php 

 
class Database
{

	// specify your own database credentials
    private $host = "localhost";
    private $db_name = "simple_demo";
    private $username = "root";
    private $password = "";
    private $conn;
    private $conn_type = "";


    // Get the database connection
    public function getConnection($dbType)
    {
        if ($dbType == "pdo")
        {
            $this->conn = null;
            $this->conn_type = "pdo";
 
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                
                //echo "Connection error: " . $exception->getMessage();
                $this->conn = null;
            }
        }
        else if ($dbType == "sql")
        {
            $this->conn = null;
            $this->conn_type = "sql";
            try{
                
                $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);

            }catch(exception $exception){
                
                //echo "Connection error: " . $exception->getMessage();
                $this->conn = null;
            }
            
        }
 
        return $this->conn;
    }


	public function __construct($dbType)
	{
        if ($dbType == "pdo")
        {
            $this->conn = null;
            $this->conn_type = "pdo";
 
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                
                //echo "Connection error: " . $exception->getMessage();
                $this->conn = null;
            }
        }
        else if ($dbType == "sql")
        {
            $this->conn = null;
            $this->conn_type = "sql";
            try{
                
                $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);

            }catch(exception $exception){
                
                //echo "Connection error: " . $exception->getMessage();
                $this->conn = null;
            }
        }
    }

   
    public function getDbConnection() 
    {
        if ($this->conn_type == "pdo")
        {
          if ($this->conn instanceof PDO) 
          {
            return $this->conn; 
          } 

        } 
        else if ($this->conn_type == "sql")
        {
            return $this->conn;
        }
       
    }

    
    /*
    * Get Simple SQL Connection
    *
    */
    public function getSimpleConnection()
    {

        $connection = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);

        if(!$connection)
        {
            //echo "Connection Failed";
            //die("connection failed".mysqli_error());

            return false;
            
        }
        else 
        {
            return $connection;
        }
    }

    /*
    * Close Connection
    *
    */
    public function closeMyDBConnection()
    {
        if($this->conn_type == "pdo")
        {
            $this->conn = null;
        }
        else if ($this->conn_type == "sql")
        {
            mysqli_close($this->conn);
        }
    }


}



?>
