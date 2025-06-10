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
    <h1> Materiales. </h1>

    <div class="container-fluid row">
    <form class="col-4 p-3">
        <div class="col-auto">
            <label  class="visually-hidden">Nombre</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Nombre">
        </div>
        <div class="col-auto">
            <input type="email" class="form-control" id="exampleFormControlInput1" >
        </div>
    
        <div class="col-auto">
            <label  class="visually-hidden">Unidad Medida</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Unidad Medida">
        </div>
        <div class="col-auto">
            <input type="email" class="form-control" id="exampleFormControlInput1" >
        </div>
    

    
        <div class="col-auto">
            <label class="visually-hidden">Precio</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Precio">
        </div>
        <div class="col-auto">
            <input type="email" class="form-control" id="exampleFormControlInput1" >
        </div>
    

    
        <div class="col-auto">
            <label class="visually-hidden">Stock</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Stock">
        </div>
        <div class="col-auto">
            <input type="email" class="form-control" id="exampleFormControlInput1" >
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

    <div class="col-8 p-4">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Unidad de Medida</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Total</th>
     <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
     include "modelo/conexion.php";
     $sql = $conexion->query(" SELECT * FROM materials");
     while($datos=$sql->fetch_object()){
        $total = $datos->price * $datos->stock; 
    ?>
       <tr>
      <th scope="row"><?= $datos->id ?></th>
      <td><?= $datos->name ?></td>
      <td><?= $datos->unit ?></td>
      <td><?= $datos->price ?></td>
      <td><?= $datos->stock ?></td>
      <td><?= $total ?></td>

       <td>
        <a href="editar"> <i class="fa-solid fa-pen-to-square"></i> </a>
        <a href="eliminar"><i class="fa-solid fa-trash"></i></a>
       </td>
    </tr>
    <?php }
    ?>
   

  </tbody>
</table>        
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>

</html>