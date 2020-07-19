<?php 
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../config/config.php'); 
?>

<?php
class DB extends PDO
{
   public $host   = DB_HOST;
   public $user   = DB_USER;
   public $pass   = DB_PASS;
   public $dbname = DB_NAME;
    //private $_connection;
    private static $_instance = null; 
    private $link;
    public $error;
    private function __construct()
    {
       $this->connectDB();
    }
    public function connectDB(){
       $this->link = new mysqli($this->host, $this->user, $this->pass, 
       $this->dbname);
      if(!$this->link){
        $this->error ="Connection fail".$this->link->connect_error;
       return false;
      }
    }
    public static function getInstance() {
        if(!DB::$_instance) { // If no instance then make one
            DB::$_instance = new DB();
        }
        return DB::$_instance;
    }

    private function __clone() { }
    // Get mysqli connection
    public function getConnection() {
        return $this->link;
    }

    public function select($query){
        $this->queryType = 'SELECT';
        return $this;
       }
      
      // Insert data
      public function insert($query){
         $insert_row = $this->link->query($query);
         if($insert_row){
           return $insert_row;
         } else {
           return false;
          }
       }
        
      // Update data
       public function update($query){
         $update_row = $this->link->query($query);
         if($update_row){
          return $update_row;
         } else {
          return false;
          }
       }
        
      // Delete data
       public function delete($query){
         $delete_row = $this->link->query($query);
         if($delete_row){
           return $delete_row;
         } else {
           return false;
          }
         }
}
?>