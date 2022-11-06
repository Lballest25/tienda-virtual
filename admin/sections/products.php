<?php include("../templates/headboard.php"); ?>
<div class="contenedorForm">
    <h3 class="tituloProductos">Te encuentras gestionando los productos!</h3>
<form action="" id="form">
    <input type="text" name="tipo_operacion" id="tipo_operacion" value="guardar" hidden="true">
    <input type="number" name="id" id="id" hidden="true">
    <div class="input-group">
    <input type="text" name="nombre" id="nombre" class="input" autocomplete="off"> 
    <label for="name" class="input-label">Nombre del juego </label>
    </div>
    <div class="input-group">
    <input type="file" name="imagen" id="imagen" class="input" autocomplete="off"> 
    <label for="name" class="input-label">Imagen</label>
    </div>
    <div class="input-group">
    <input type="number" name="precio" id="precio" class="input" autocomplete="off"> 
    <label for="name" class="input-label">Precio</label>
    </div>
    <div class="input-group">
    <input type="number" name="cantidad" id="cantidad" class="input" autocomplete="off"> 
    <label for="name" class="input-label">Cantidad</label>
    </div>
    <button type="submit" value="Agregar" id="agregar" class="btn_agregar">Agregar</button>
</form>
<button onclick="actualizar()" value="Modify" id="modify" class="btn_agregar" hidden="true">Modificar</button>
</div>
<table class="tablaDatos">
    <tr class="trTablaDatos">
        <th class="thTablaDatos">ID</th>
        <th class="thTablaDatos">Nombre del juego</th>
        <th class="thTablaDatos">Imagen</th>
        <th class="thTablaDatos">Precio</th>
        <th class="thTablaDatos">Cantidad</th>
        <th class="thTablaDatos">Editar</th>
        <th class="thTablaDatos">Eliminar</th>
    </tr>
    <tbody id="tabla_juego">
    </tbody>
</table>
<script src="../js/app.js"></script>
<?php include("../templates/foot.php"); ?>