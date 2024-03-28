
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Consulta menus</h1>
          </div>
          <div><a class="btn btn-primary btn-flat" href="?c=menu&a=Crear"><i class="fa fa-lg fa-plus"></i></a></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Menu Padre</th>
                      <th>Descripcion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->modelo->consultarMenus() as $res):?>
                    <tr>
                      <td><?=$res->ID?></td>
                      <td><?=$res->NOMBRE_MENU?></td>
                      <td><?=$res->NOMBRE_PADRE?></td>
                      <td><?=$res->DESCRIPCION?></td>
                      <td>
                        <div class="">
                          <a class="btn btn-info" href="?c=menu&a=Crear&id=<?=$res->ID?>">Editar</a>
                          <a class="btn btn-danger" onclick="DelM();" id="" href="?c=menu&a=Eliminar&id=<?=$res->ID?>">Eliminar</a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>