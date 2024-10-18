<?php
require_once 'App/Models/config.php';
class UserModel{
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=".MYSQL_HOST .
        ";dbname=".MYSQL_DB.";charset=utf8", 
        MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }
    private function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END

		END;
            $this->db->query($sql);
            }
        }

        
    public function getUser($email){
        $query = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
        $query->execute([$email]);
 
        $tasks = $query->fetch(PDO::FETCH_OBJ); 
    
        return $tasks;
    }
}

?>