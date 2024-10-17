<?php
require_once 'App/Models/model.php';
require_once 'App/Views/view.php';


class TaskController {
    private $model;
    private $view;
    

    public function __construct($res) {
        $this->model = new TaskModel();
        $this->view = new TaskView($res->user);
        
    }
    public function showError(){
        $this->view->showError('Hubo un error');
    }
   public function showHome(){
        $info = $this->model->getinfoClub();

        return $this->view->showinfoHome($info);
   }
   
    public function showCategorias() { 
        $tasks = $this->model->getCategorias();

        return $this->view->showListaCategorias($tasks);
    }
   
    public function showItems() {
        $tasks = $this->model->getItems();
        
        return $this->view->showListaItems($tasks);
    }

    public function showItemsCategoria($params) {
        $items = $this->model->getItems();

        return $this->view->showItemsCategoria($items,$params);
    }

     public function showItemsinformacion($params) {
        $items = $this->model->getItems();
        $categoria= $this->model->getCategorias();
     
        return $this->view->ItemsInfo($items,$params,$categoria);
    }

    public function showFormAdd(){
        $categorias=$this->model->getCategorias();
        return $this->view->ModificarCategoria($categorias);
    }
    public function showaddActividad(){
        $cate=$this->model->getCategorias();
        $acti=$this->model->getItems();

        return $this->view->ModificarActividad($cate,$acti);
    }
    
  //agregar
    public function agregarCategoria() {
        if (!isset($_POST['categoria']) || empty($_POST['categoria'])) {
            return $this->view->showError('Falta completar el título de la categoria');
        }
        
        $nombre= $_POST['categoria'];
        $imagen=$_POST['foto'];
    
        $id = $this->model->insertCategoria($nombre,$imagen);
    
        header('Location: ' . BASE_URL . 'listar');
    }


    public function agregarActividad() {
        if (!isset($_POST['deporte']) || empty($_POST['deporte'])) {
            return $this->view->showError('Falta completar nombre del deporte');
        }
        if (!isset($_POST['horario']) || empty($_POST['horario'])) {
            return $this->view->showError('Falta completar el horario');
        }
        if (!isset($_POST['dia']) || empty($_POST['dia'])) {
            return $this->view->showError('Falta completar el dia');
        }
        if (!isset($_POST['profe']) || empty($_POST['profe'])) {
            return $this->view->showError('Falta completar el nombre del profesor');
        }
        if (!isset($_POST['cate']) || empty($_POST['cate'])) {
            return $this->view->showError('Falta seleccionar categoria');
        }
    
    
        $depor= $_POST['deporte'];
        $hora=$_POST['horario'];
        $dia=$_POST['dia'];
        $profe=$_POST['profe'];
        $cate=$_POST['cate'];
        $imagen=$_POST['foto'];

        $id = $this->model->insertActividad($depor,$hora,$dia,$profe,$cate,$imagen);
    
        
        header('Location: ' . BASE_URL . 'actividades');
    }

    //eliminar
    public function eliminarActividad() {
        
        $id=$_POST['eliminarAct'];

        if (!$id) {
            return $this->view->showError("No existe la actividad con el id=$id");
        }

        $this->model->borrarActividad($id);

        header('Location: ' . BASE_URL . 'actividades');
    }

    public function eliminarCategoria() {
        $id=$_POST['eliminarCate'];

        if (!$id) {
            return $this->view->showError("No existe la categoria con el id=$id");
        }

        $this->model->borrarCategoria($id);

        header('Location: ' . BASE_URL . 'listar');
    }

    //editar
    public function editarCategoria(){
        if (!isset($_POST['nombrenuevo']) || empty($_POST['nombrenuevo'])) {
            return $this->view->showError('Falta completar nombre nuevo');
        }

        $nombre=$_POST['nombrenuevo'];
        $identificador=$_POST['nombreCate'];

        $id = $this->model->editarCate($nombre,$identificador);
        header('Location: ' . BASE_URL . 'listar');
    }

    public function editarActividad(){
        if (!isset($_POST['hora']) || empty($_POST['hora'])) {
            return $this->view->showError('Falta completar nombre nuevo');
        }

        $hora=$_POST['hora'];
        $dia=$_POST['dia'];
        $identificador=$_POST['idAct'];

        $id = $this->model->editarActi($hora,$dia,$identificador);
        header('Location: ' . BASE_URL . 'informacion/'.$identificador);
    }
    }
