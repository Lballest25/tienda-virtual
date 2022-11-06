<?php include("../templates/headboard.php"); ?>
<div class="contenedorForm">
    <h3 class="tituloProductos">Te encuentras gestinando los usuarios!</h3>
<form action="" id="formUsers">
    <input type="text" name="tipo_operacion" id="tipo_operacion" value="save" hidden="true">
    <input type="number" name="id" id="id" hidden="true">
    <div class="input-group">
    <input type="text" name="user" id="user" class="input" autocomplete="off"> 
    <label for="name" class="input-label">Nombre del usuario</label>
    </div>
    <div class="input-group">
    <input type="text" name="password" id="password" class="input" autocomplete="off"> 
    <label for="name" class="input-label">Password</label>
    </div>
    <div class="containerSub">
        <button type="submit" value="Agregar" id="agregar" class="btn_agregar">Agregar</button>
    </div>
</form>
<button onclick="update()" value="Modify" id="modify" class="btn_agregar" hidden="true">Modificar</button>
</div>
<table class="tablaDatos">
    <tr class="trTablaDatos">
        <th class="thTablaDatos">ID</th>
        <th class="thTablaDatos">Usuario</th>
        <th class="thTablaDatos">Password</th>
        <th class="thTablaDatos">Editar</th>
        <th class="thTablaDatos">Eliminar</th>
    </tr>
    <tbody id="table_users">
        
    </tbody>
</table>
<script src="../js/appUsers.js"></script>
<?php include("../templates/foot.php"); ?>