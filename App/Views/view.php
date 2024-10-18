<?php
class TaskView {
    public $user=null;

   public function __construct($user){
    $this->user=$user;
   }
  
    public function showinfoHome($info) {
   
        foreach($info as $informacion){
            $nombre=$informacion->nombre;
            $direccion=$informacion->direccion;
        }

        $titulo="Nosotros";
        $bienvenida="BIENVENIDOS A";
        
        require 'Templates/principal.phtml';
    }

    public function showListaCategorias($categoria) {
        
        $titulo="Categorias";
    
        require 'Templates/lista_categorias.phtml';
    }
    
      
    public function showItemsCategoria($items,$params) {
        $arregloActividades=array();
          
         foreach($items as $item)
           {
               if($item->ID_Categoria==$params)
               {
                  array_push($arregloActividades,$item);
               }
           }
          $titulo="Actividades por Categoria";
          $items=$arregloActividades;
       
          require 'Templates/actividadXcate.phtml';
           }
    
    
    public function showListaItems($items) {

              $titulo="Actividades";
            
              require 'Templates/listaitem.phtml';
               }
    
    
    
    public function ItemsInfo($items,$params,$categoria) {
        $informacion=array();
        
            foreach($items as $item)
                {
                    if($item->ID_Actividad==$params )
                    {
                        array_push($informacion,$item);
                    
                    }
                }
            
                $items=$informacion;
                $titulo='Informacion';
                require 'Templates/iteminfo.phtml';
                }
        
//vista privada
    public function ModificarCategoria($tasks,$error = ''){

        require 'Templates/formAdd.phtml';
      }
      public function ModificarActividad($tasks,$acti,$club,$error = ''){
      
        require 'Templates/formaddActi.phtml';
      }
    

    public function showError($error) {
        require 'Templates/error.phtml';
    }

}

       