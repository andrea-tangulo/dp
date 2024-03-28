<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>DP</title>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" id="logo" href="?c=inicio">DP</a>
        <nav class="navbar navbar-static-top">
          <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>          
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="?c=inicio"><i class="fa fa-dashboard"></i><span>Inicio</span></a></li>
            <li class=""><a href="?c=menu"><i class="fa fa-edit"></i><span>Consultar menus</span></a></li>
            <?php foreach ($this->modelo->consultarPadres() as $res){ ?>
              <li class="treeview"><a href="?c=<?=$res->NOMBRE?>&id=<?$res->ID_INFO?>"><i class="fa fa-file-text"></i><span><?=$res->NOMBRE?></span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                  <li>
                      <a href="?c=menu&a=Mostrar&id=<?php print_r($res->ID_INFO);?>"><i class="fa fa-circle-o"></i><?php print_r($res->NOMBRE);?></a>
                    </li>
                  <?php foreach ($this->modelo->consultarHijos($res->ID_INFO) as $r){ 
                    $url = strtolower($r->NOMBRE);
                  ?>
                    <li>
                      <a href="?c=menu&a=Mostrar&id=<?php print_r($r->ID_HIJO);?>"><i class="fa fa-circle-o"></i><?php print_r($r->NOMBRE); ?></a>
                    </li>
                  <?php } ?>

                </ul>
            <?php }?>
            </li>
          </ul>
          
        </section>
      </aside>