<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD en PHP con Ajax y DataTable</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="js/script.js"></script>
    <style>
        button.dt-button.btn-primary{
            background:var(--bs-primary)!important;
            color:white;
        }
    </style>
</head>

<body class="">
<nav class="navbar navbar-expand-lg navbar-light bg-dark bg-gradient">
  <div class="container">
    <a class="navbar-brand text-light text-shadow" href="https://www.configuroweb.com/desarrollo/" target="_blank">ConfiguroWeb</a>
  </div>
</nav>

    <div class="container py-5 h-100">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center"><b>CRUD en PHP con Ajax y DataTable[No necesitas actualizar]</b></h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12" id="msg"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover table-bordered table-striped" id="authors-tbl">
                    <thead>
                        <tr class="bg-dark text-light bg-gradient bg-opacity-150">
                            <th class="px-1 py-1 text-center">#</th>
                            <th class="px-1 py-1 text-center">Nommbre</th>
                            <th class="px-1 py-1 text-center">Apellido</th>
                            <th class="px-1 py-1 text-center">Correo</th>
                            <th class="px-1 py-1 text-center">Fecha de Nacimiento</th>
                            <th class="px-1 py-1 text-center">Acción</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-dark text-light bg-gradient bg-opacity-150">
                            <th class="px-1 py-1 text-center">#</th>
                            <th class="px-1 py-1 text-center">Nommbre</th>
                            <th class="px-1 py-1 text-center">Apellido</th>
                            <th class="px-1 py-1 text-center">Correo</th>
                            <th class="px-1 py-1 text-center">Fecha de Nacimiento</th>
                            <th class="px-1 py-1 text-center">Acción</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="add_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="new-author-frm">
                            <div class="form-group">
                                <label for="first_name" class="control-label">Nombre</label>
                                <input type="text" class="form-control rounded-0" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="control-label">Apellido</label>
                                <input type="text" class="form-control rounded-0" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Correo</label>
                                <input type="text" class="form-control rounded-0" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="control-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control rounded-0" id="birthdate" name="birthdate" required>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="new-author-frm">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="edit_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Detalles de Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="edit-author-frm">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="first_name" class="control-label">Nombre</label>
                                <input type="text" class="form-control rounded-0" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="control-label">Apellido</label>
                                <input type="text" class="form-control rounded-0" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Correo</label>
                                <input type="text" class="form-control rounded-0" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="control-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control rounded-0" id="birthdate" name="birthdate" required>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="edit-author-frm">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="delete-author-frm">
                            <input type="hidden" name="id">
                            <p>Estás segur@ de eliminar a <b><span id="name"></span></b> del listado?</p>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" form="delete-author-frm">Sí</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->
</body>

</html>