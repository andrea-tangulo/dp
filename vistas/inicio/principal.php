<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class=""></i>Inicio</h1>
          </div>
          <div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Cantidad de registros</h3>
                <h1><?php 
                        $resultado=$this->modelo->cantidadMenus();                        
                        print_r($resultado["Cantidad"]);
                    ?>
                </h1>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>