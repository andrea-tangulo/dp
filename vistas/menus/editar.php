      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Menus</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <div class="row lg-8">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=menu&a=Guardar&id=0">
                      <fieldset>
                        <h3><p><?php echo("$titulo")?> menu</p></h3>
                        <div class="form-group">                       
                          <input class="form-control" type="hidden" name="ID" value="<?php $m->getIdMenu()?>">
                          <label class="col-lg-2 control-label" for="nombreMenu">Nombre</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="nombreMenu" value="<?=$m->getNombreMenu()?>" id="nombreMenu" type="text" placeholder="Nombre">
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-lg-2 control-label" for="descMenu">Descripcion</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="descMenu" value="<?=$m->getDescMenu()?>" id="descMenu" type="text" placeholder="Descripcion"></input>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="esPadre">Menu Padre</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="esPadre" id="esPadre">
                              <option>Ninguno</option>
                              <?php                         
                                foreach ($this->modelo->consultarPadres() as $res):?>
                              ?>
                              <option><?=$res->NOMBRE?></option>
                            <?php endforeach; ?>
                            </select><br>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Listo</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>