<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Lista de Clientes | Gerenciador de Tarefas</title>
    <?php require_once 'views/_include/head.php'; ?>
    <?php require_once MODELS . '/Login/Login.class.php'; ?>
</head>

<body>
    <div id="wrap">
        <?php require INCLUSAO . '/nav.php'; ?>

        <div class="container-fluid">

            <?php require INCLUSAO . '/menu.php'; ?>

            <!-- Main window -->
            <div class="main_container" id="dashboard_page">

                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo HOME_URI; ?>/tarefas/index">Página Inicial</a> <span class="divider">/</span></li>
                        <li class="active"><p>Lista de Clientes</p></li>
                    </ul>
                </div>

                <div class="row-fluid">
                  <div class="widget widget-padding span12">
                    <div class="widget-header">
                      <i class="icon-group"></i>
                      <h5>Clientes</h5>
                      <div class="widget-buttons">
                          <a href="<?php echo HOME_URI; ?>/clientes/adicionar"><i class="icon-plus"></i></a>
                          <!-- <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a> -->
                      </div>
                      
                  </div>  
                  <div class="widget-body">
                      <table id="users" class="table table-striped table-bordered dataTable">
                        <thead>
                          <tr>
                            <th>#ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($view as $param): ?>
                            <tr>
                                <td>#<?php echo $param['id']; ?></td>
                                <td><?php echo $param['nome']; ?></td>
                                <td>
                                  <div class="btn-group">
                                    <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                                        Ações
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                      <li><a href="<?php echo HOME_URI; ?>/clientes/editar/<?php echo $param['id']; ?>"><i class="icon-edit"></i> Editar</a></li>
                                      <li><a href="<?php echo HOME_URI; ?>/clientes/excluir/<?php echo $param['id']; ?>"><i class="icon-trash"></i> Deletar</a></li>
                                  </ul>
                              </div>
                          </td>
                      </tr>

                  <?php endforeach; ?>

              </tbody>
          </table>
      </div> <!-- /widget-body -->
  </div> <!-- /widget -->
</div> <!-- /row-fluid -->



</div>
<!-- /Main window -->

</div><!--/.fluid-container-->
</div><!-- wrap ends-->

<?php require INCLUSAO . '/footer.php'; ?>
</body>
</html>
