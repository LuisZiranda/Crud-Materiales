<?php

include "modelo/conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("SELECT * FROM materials WHERE id=$id");
if (!$sql) {
    die("Error en la consulta: " . $conexion->error);
}
include "controlador/actualizaProducto.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiales Construccion.</title>

    <script src="https://kit.fontawesome.com/ae2b222b11.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>

<form class="col-4 p-3" method="POST">
    <?php 
    if ($datos = $sql->fetch_object()) { ?>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($datos->name) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Unidad Medida</label>
            <input type="text" class="form-control" name="unidadMedida" value="<?= htmlspecialchars($datos->unit) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" value="<?= htmlspecialchars($datos->price) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="text" class="form-control" name="stock" value="<?= htmlspecialchars($datos->stock) ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="btnActualizar">Actualizar</button>
    <?php } else { ?>
        <div class="alert alert-danger">Material no encontrado.</div>
    <?php } ?>
</form>
</body>