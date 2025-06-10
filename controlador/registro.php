<?php
if (!empty($_POST["btnAgregar"])) {
    if (
        !empty($_POST["nombre"]) &&
        !empty($_POST["unidadMedida"]) &&
        !empty($_POST["precio"]) &&
        !empty($_POST["stock"])
    ) {
        $nombre = trim($_POST["nombre"]);
        $unidadMedida = trim($_POST["unidadMedida"]);
        $precio = floatval($_POST["precio"]);
        $stock = intval($_POST["stock"]);
        $total = $precio * $stock;

        $consultaVerificacion = $conexion->prepare("SELECT id FROM materials WHERE LOWER(name) = LOWER(?)");
        $consultaVerificacion->bind_param("s", $nombre);
        $consultaVerificacion->execute();
        $consultaVerificacion->store_result();

        if ($consultaVerificacion->num_rows > 0) {
            echo "<div class='alert alert-danger'> El material '$nombre' ya está registrado, cualquier cambie, favor de editar.</div>";
            $consultaVerificacion->close();
            return;
        } else {
            $sql = $conexion->prepare("INSERT INTO materials (name, unit, price, stock, totalValue) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("ssddi", $nombre, $unidadMedida, $precio, $stock, $total);

            if ($sql->execute()) {
                echo "<div class='alert alert-success'>Material agregado correctamente</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al guardar: " . $conexion->error . "</div>";
            }
        }

        $sql->close();
    } else {
        echo "<div class='alert alert-warning'>Todos los campos son obligatorios</div>";
    }
}
