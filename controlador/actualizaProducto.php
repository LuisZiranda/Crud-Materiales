<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["btnActualizar"])) {
    global $conexion;
    global $id;

    $nombre = $conexion->real_escape_string($_POST["nombre"] ?? "");
    $unidad = $conexion->real_escape_string($_POST["unidadMedida"] ?? "");
    $precio = floatval($_POST["precio"] ?? 0);
    $stock = intval($_POST["stock"] ?? 0);

    $errores = [];

    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    }
    if (empty($unidad)) {
        $errores[] = "La unidad de medida es obligatoria.";
    }
    if (empty($_POST["precio"])) {  
        $errores[] = "El precio es obligatorio.";
    }
    if (!isset($_POST["stock"]) || $_POST["stock"] === "") {
    $errores[] = "El stock es obligatorio.";
}

    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
        return; 
    }
    
    $query = "UPDATE materials SET 
                name = '$nombre', 
                unit = '$unidad', 
                price = $precio, 
                stock = $stock 
              WHERE id = $id";

    if ($conexion->query($query)) {
       header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error al actualizar: " . $conexion->error . "</div>";
    }
}
