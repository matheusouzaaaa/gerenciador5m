<?php $title = 'Vídeos | Painel Administrativo Agência Web Falcon5M'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Lista de Clientes | Painel Administrativo Agência Web Falcon5M</title>
        <?php require INCLUSAO . '/head.php'; ?>
    </head>
    <body class="page-header-fixed page-sidebar-fixed">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <!-- BEGIN LOGO -->
                <?php require INCLUSAO . '/logo.php'; ?>
                <!-- END LOGO -->
                <?php require INCLUSAO . '/nav.php'; ?>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
                    <?php require INCLUSAO . '/menu.php'; ?>
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Clientes
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        
                        
                        <div class="portlet-body">
                            
                            <div class="table-toolbar">
                                <div class="btn-group">
                                    <a href="<?php echo HOME_URI; ?>/clientes/adicionar/" id="sample_editable_1_new" class="btn blue">
                                        Novo Cliente <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="<?php echo HOME_URI; ?>/clientes/lista/" id="sample_editable_1_new" class="btn blue">
                                        Lista Completa <i class="fa fa-calendar-o"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-reorder"></i> Pesquise seu cliente
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="col-md-4">
                                        <form action="" method="post" class="form-inline" role="form" onsubmit="return validaClienteNome(this);">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <div class="input-icon">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" name="nome" class="form-control" id="busca-cliente"/>
                                                </div>
                                            </div>
                                            <input type="submit" name="submit-nome" value="Buscar" class="btn btn-default margin-filtro"/>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="" method="post" class="form-inline" role="form" onsubmit="return validaClienteEmail(this);">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <div class="input-icon">
                                                    <i class="fa fa-envelope"></i>
                                                    <input type="text" name="email" class="form-control"/>
                                                </div>
                                            </div>
                                            <input type="submit" name="submit-email" value="Buscar" class="btn btn-default margin-filtro"/>
                                        </form>
                                    </div>
                                    <div class="col-md-4">   
                                        <form action="" method="post" class="form-inline" role="form" onsubmit="return validaClienteEstado(this);">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <div class="input-icon">
                                                    <i class="fa fa-star"></i>
                                                    <input type="text" name="estado" class="form-control" id="busca-estado" />
                                                </div>
                                            </div>
                                            <input type="submit" name="submit-estado" value="Buscar" class="btn btn-default margin-filtro" />
                                        </form>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>

                        </div>

                        <div class="portlet-body">

                            <div class="table-scrollable">
                                <form action="" method="post">
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" name="select-all" id="select-all" title="Selecionar Todos"/>
                                                </th>
                                                <th>
                                                    Nome	
                                                </th>
                                                <th>
                                                    E-mail
                                                </th>
                                                <th>
                                                    Tipo de Pessoa
                                                </th>
                                                <th>
                                                    Telefone
                                                </th>
                                                <th>
                                                    Celular
                                                </th>
                                                <th>
                                                    Ações
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($view as $param): ?>
                                                <tr>
                                                    <td><input type="checkbox" name="excluir[]" value="<?php echo $param['id']; ?>"/></td>
                                                    <td><?php echo $param['nome']; ?></td>
                                                    <td><?php echo $param['email']; ?></td>
                                                    <td><?php echo $param['tipo_pessoa']; ?></td>
                                                    <td><?php echo $param['telefone']; ?></td>
                                                    <td><?php echo $param['celular']; ?></td>
                                                    <td>
                                                        <a href="<?php echo HOME_URI; ?>/clientes/fotos/<?php echo $param['id']; ?>" class="btn btn-primary-editar">Arquivo</a>
                                                        <a href="<?php echo HOME_URI; ?>/clientes/editar/<?php echo $param['id']; ?>" href="" class="btn btn-primary-editar">Editar</a>
                                                        <a href="<?php echo HOME_URI; ?>/clientes/excluir/<?php echo $param['id']; ?>" href="" class="btn btn-primary-excluir" onclick="return confirm('Deseja mesmo deletar?');">Excluir</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>

                                    <div class="submit2">
                                        <input type="submit" name="submit" value="Excluir Selecionados" class="btn btn-primary-excluir" /> 
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->

                </div>
            </div>
            <?php require INCLUSAO . '/footer.php'; ?>
            <!-- END FOOTER -->

            <!-- END JAVASCRIPTS -->
    </body>
</html>