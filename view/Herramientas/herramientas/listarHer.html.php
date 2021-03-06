<div class="col s12">
    <table class="centered striped card-panel">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha ing. her</th>
                <th>N&uacute;mero de placa</th>
                <th>Nombre Herramienta</th>
                <th>Descripci&oacute;n</th>
                <th>Imagen</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($listarHer as $herramienta) {
                ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $herramienta['her_fecha_ingreso'] ?></td>
                    <td><?php echo $herramienta['her_id'] ?></td>
                    <td><?php echo $herramienta['her_nombre'] ?></td>
                    <td><?php echo $herramienta['her_descripcion'] ?></td>
                    <td><a class="fancybox" href="../../../img/<?php echo $herramienta['her_imagen'] ?>"><img width="100px" height="100px" src="../../../img/<?php echo $herramienta['her_imagen'] ?>"></a></td>
                    <td><a class="modal-trigger btn-floating  waves-effect waves-light teal" href="#modalEditar" data-url="<?php echo crearUrl('herramientas', 'herramientas', 'editar', array('noVista' => "noVista", 'id' => $herramienta['her_id'])) ?>"><i class="mdi-content-create small"></i></a></td>
                    <td><a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" data-her_id="<?php echo $herramienta['her_id'] ?>" data-url="<?php echo crearUrl('herramientas', 'herramientas', 'postEliminar', array('noVista' => 'noVista', 'id' => $herramienta['her_id'])) ?>"><i class="mdi-action-delete small"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!--aqui empieza la estructura de mi ventana modal para editar herramientas-->
    <div id="modalEditar" class="modal close" style="display: none; opacity: 1; top: 10px; transform: scaleX(1);">
        <div class="modal-content" id="model-data"></div>
<!--        <div class="modal-footer">
            <a class="waves-effect waves-red btn-flat modal-action modal-close" href="#!">Cancelar</a>
            <a class="waves-effect waves-green btn-flat modal-action modal-close" href="#">Actualizar</a>
        </div>-->
    </div>
</div>
<script type="text/javascript">
    $('.modal-trigger').leanModal({
        dismissible: false,
        opacity: .5,
        in_duration: 300,
        out_duration: 200,
        ready: function () {

        },
        complete: function () {

        }
    });
</script>
