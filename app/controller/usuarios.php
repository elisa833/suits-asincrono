<?php
require_once "../config/conexion.php";
session_start();

class Usuarios extends Conexion {
    
    private $expresion = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    
    public function comprobacion_email($datos,$email){
        foreach($datos as $emails){
            if ($emails['email'] == $email) {
                return true;
            }
        }
    }

    public function registro() {
    
        if (isset($_POST['nombre']) && !empty($_POST['nombre']) && 
            isset($_POST['apellido']) && !empty($_POST['apellido']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['pass']) && !empty($_POST['pass'])) {
        
            if(is_numeric($_POST['nombre'])) {
                echo json_encode([0,"No puedes agregar numeros en el input nombre"]);
            } else if(is_numeric($_POST['apellido'])) {
                echo json_encode([0,"No puedes agregar numeros en el input apellido"]);
            } else if (!preg_match($expresion,$_POST['email'])) {
                echo json_encode([0,"No cumples con las especificaciones de un correo"]);
            } else {
        
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];
                $passw = $_POST['pass'];
        
                $consulta = $this->obtener_conexion()->prepare("SELECT email FROM t_usuarios");
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
                if($this->comprobacion_email($datos,$email)){
                    echo json_encode([0,"Correo existente, escoja otro correo"]);
                } else {
                    $insercion = $this->obtener_conexion()->prepare("INSERT INTO t_usuarios (nombre, apellido,pass
                                VALUES (:nombre,:apellido,:email,:pass)");
                    $insercion->bindParam(':nombre',$nombre);
                    $insercion->bindParam(':apellido',$apellido);
                    $insercion->bindParam(':email',$email);
                    $insercion->bindParam(':pass',$passw);
        
                    $insercion->execute();
        
                    if ($insercion) {
                        echo json_encode([1,"Usuario registrado correctamente"]);
                    } else {
                        echo json_encode([0,"Usuario NO registrado"]);
                    }
                }
                    
            }
                
        } else {
            echo json_encode([0,"No puedes dejar campos vacios"]);
        }
    }    

    public function iniciar_sesion(){
            if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
        
                $email = $_POST['email'];
                $passw = $_POST['pass'];
        
                $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_usuarios WHERE email = :email");
                $consulta->bindParam(':email',$email);
                $consulta->execute();
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
        
                if ($datos) {
                    if ($datos['pass'] == $passw) {
                        $_SESSION['usuario'] = $datos;
                        echo json_encode([1,"Datos de acceso correctos"]);
                    } else {
                            echo json_encode([0,"Error en credenciales de acceso"]);
                        }
                } else {
                    echo json_encode([0,"Informacion no localizada"]);
                }
                
            } else {
                echo json_encode([0,"Tienes que llenar los datos en el formulario"]);
            }
    }

}    
           
$consulta = new Usuarios();
$metodo = $_POST['metodo'];
$consulta->$metodo();


?>
