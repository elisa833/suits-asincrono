<?php 
/* con el this las mandas a llamar o las seleccionas porque existe dentro
de la conexion, se dejan de llamar funciones y se nombran metodos
funcion - intsrucciones puras
metodo - dentro de la clase
las variables se llaman propiedades
se hace el encapsulamiento por que se vuelve private para que este segura la conexion
a la base de datos
*/

class Conexion {

    private $user = "root1";
    private $pass = "1234";
    private $server = "localhost";
    private $nameDB = "tienda";
    private $conexion;

    private function crear_conexion(){
        if (!$this->conexion) {
            try {
                $this->conexion = new PDO("mysql:host=$this->server;
                dbname=$this->nameDB;",$this->user,$this->pass);
                return $this->conexion;
            } catch (PDOException $e) {
                return $e;
            }
        } else{
            return $this->conexion;
        }
    }

    public function obtener_conexion() {
        $conexion = $this->crear_conexion();
        return $conexion;
    }

    public function cerrar_sesion(){
        $this->conexion = null;
    }
}

    /* $conexion = new Conexion();

    $consulta = $conexion->obtener_conexion()->prepare("SELECT * FROM t_usuarios");
    $consulta->execute();
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion->cerrar_sesion();
    echo print_r($datos);
 */
?>