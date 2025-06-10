<?php
include "modelo/conexion.php";

if (!empty($_GET["id"])) {
    $id = intval($_GET["id"]); 

    $resultado = $conexion->query("SELECT stock FROM materials WHERE id = $id");
    
    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_object();
        if ($fila->stock == 0) {
            $sql = $conexion->query("DELETE FROM materials WHERE id = $id");
            if ($sql) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Material eliminado correctamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            } else {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error al eliminar el material.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    No se puede eliminar: el stock debe ser cero.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }
} 
?>