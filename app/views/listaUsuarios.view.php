<?php if (!empty($usuarios)): ?>
    

<section class="seccion">
    <h2 class="title titulo-seccion"><span>Usuarios Registrados</span></h2>
    <div class="container container-usuarios">
        <div class="card">
            <div class="card-content">
                <table id="usuariosTabla" class="table is-striped is-fullwidth">
                    <thead class="has-background-info">
                        <tr>
                            <th class="has-text-dark">Nro</th>
                            <th class="has-text-dark">Nombre</th>
                            <th class="has-text-dark">Correo</th>
                            <th class="has-text-dark">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <th><?= $contador++ ?></th>
                            <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                            <td><?= htmlspecialchars($usuario['correo']) ?></td>
                            <td>
                                <div class="buttons">
                                    <button class="button is-info is-small"><i class="fas fa-eye"></i></button>
                                    <button class="button is-success is-small"><i class="fas fa-edit"></i></button>
                                    <button class="button is-danger is-small"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



<script>
$(document).ready(function () {
    $("#usuariosTabla").DataTable({
        "pageLength": 10,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
            "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
            "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Usuarios",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscador:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": " Siguiente",
                "previous": "Anterior "
            }
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                }, {
                    extend: 'csv'
                }, {
                    extend: 'excel'
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }]
            },
            {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayout: 'fixed three-column'
            }
        ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

</script>

<?php else: ?>
    <p>No hay usuarios registrados.</p>
<?php endif; ?>