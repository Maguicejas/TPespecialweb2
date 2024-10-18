<?php
require_once 'App/Models/config.php';
class TaskModel {
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

    public function getinfoClub(){
        $query = $this->db->prepare('SELECT * FROM club');
        $query->execute();
    
        $tasks = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $tasks;
    }
    public function getCategorias() {
     
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
    
        $tasks = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $tasks;
    }
    public function getItems() {
        
        $query = $this->db->prepare(
        'SELECT actividad.*, categoria.nombreCate, club.formaPago
      FROM actividad
      JOIN categoria ON actividad.ID_Categoria = categoria.ID_Categoria
      JOIN club ON actividad.ID_Club = club.ID_Club');
        $query->execute();
    
        
        $tasks = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $tasks;
    }
    
   
    //obtiene idcate que tiene la actividad
    public function obtenerItemPorCategoria($ID_categoria) {
        $query = $this->db->prepare('SELECT * FROM actividad WHERE ID_Categoria = ?');
        $query->execute([$ID_categoria]);

        $actividades = $query->fetchAll(PDO::FETCH_OBJ);
        return $actividades;
    }


    //insertar
    public function insertCategoria($nombre,$foto,$suspendida= false) { 
        $query = $this->db->prepare('INSERT INTO categoria(nombreCate,imagen, suspendida) VALUES (?,?,?)');
        $query->execute([$nombre,$foto, $suspendida]);
    
        $id = $this->db->lastInsertId();
    
       return $id;
       
    }
    
    public function insertActividad($depor,$hora,$dia,$profe,$cate,$imagen,$pago,$suspendida= false) { 
        $query = $this->db->prepare('INSERT INTO actividad(deporte,horario,fecha,Profesor,ID_Club,ID_Categoria,img,suspendida) VALUES (?,?,?,?,?,?,?,?)');
        $query->execute([$depor,$hora,$dia,$profe,$pago, $cate,$imagen,$suspendida]);
    
        $id = $this->db->lastInsertId();
    
       return $id;
       
    }
    
   //borrar
    public function borrarActividad($id) {
        $query = $this->db->prepare('DELETE FROM actividad WHERE ID_Actividad = ?');
        $query->execute([$id]);
    }
    public function borrarCategoria($id) {
        $query = $this->db->prepare('DELETE FROM categoria WHERE ID_Categoria = ?');
        $query->execute([$id]);
    }
    
    //editar
    public function editarCate($nombre,$id){

        $query=$this->db->prepare('UPDATE  categoria
        SET nombreCate= ? 
        WHERE ID_Categoria= ?');
        $query->execute([$nombre, $id]);

        
        }
    
     public function editarActi($hora,$dia,$pago,$id){

        $query=$this->db->prepare('UPDATE  actividad
        SET horario= ? , fecha=? , ID_Club=?
        WHERE ID_Actividad= ?');
        $query->execute([$hora,$dia,$pago, $id]);
        
        
        }
    
    }


