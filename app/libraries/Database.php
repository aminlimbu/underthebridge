<?php
// Database class
    class Database{
        // following values can be update in config file (app/config/configSample.php)
        private $host = DB_HOST;
        private $dbname = DB_NAME;
        private $user = DB_USER;
        private $pass = DB_PASS;
        
        // initialising variables
        private $stmt;
        private $dbh;
        private $error;
        
        // construcotr funciton, runs then the class is instantiated
        public function __construct(){
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            // PDO options
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );
            try{
                // create new database handler
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
        
        // prepare statement
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        // set datatype and bind values 
        public function bind($param, $value, $type=null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindvalue($param, $value, $type);
        }
        
        // executes prepared statement
        public function execute(){
            return $this->stmt->execute();
        }

        // executes query and return data from the database
        public function fetchAll(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // returns single object that satisfies the query
        public function fetchSingle(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        // Returns number of row in the database table
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }

?>
