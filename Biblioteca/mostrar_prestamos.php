<?php include("templates/cabecera.php"); ?>
<?php include_once("conectar.php"); ?>

<div class="container">
    <h2>Libros Prestados</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Local</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Control_RFC</th>
                <th>Nombre</th>
                <th>A. Paterno</th>
                <th>A. Materno</th>
                <th>Fecha de Préstamo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $obj = new OperacionesBd();
            $sql_prestamos = "
                SELECT libros.id_local, libros.titulo, libros.nom_autor, libros.genero, 
                       usuarios.nocontrol_rfc, usuarios.nom, usuarios.ap, usuarios.am, movimientos.fecha_prestamo 
                FROM movimientos 
                JOIN libros ON movimientos.id_libros = libros.id_libros 
                JOIN usuarios ON movimientos.id_usuarios = usuarios.id_usuarios 
                WHERE libros.estatus = 1
            ";
            $prestamos = $obj->mostrardatos($sql_prestamos);

            foreach ($prestamos as $prestamo) {
            ?>
            <tr>
                <td><?php echo $prestamo['id_local']; ?></td>
                <td><?php echo $prestamo['titulo']; ?></td>
                <td><?php echo $prestamo['nom_autor']; ?></td>
                <td><?php echo $prestamo['genero']; ?></td>
                <td><?php echo $prestamo['nocontrol_rfc']; ?></td>
                <td><?php echo $prestamo['nom']; ?></td>
                <td><?php echo $prestamo['ap']; ?></td>
                <td><?php echo $prestamo['am']; ?></td>
                <td><?php echo $prestamo['fecha_prestamo']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("templates/pie.php"); ?>