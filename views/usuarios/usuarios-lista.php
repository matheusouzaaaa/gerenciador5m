<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Lista de Usuários | Painel Administrativo Agência Web Falcon5M</title>
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
                                <i class="fa fa-edit"></i>Usuários
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>

                        <div class="portlet-body">

                            <div class="table-toolbar">
                                <div class="btn-group">
                                    <a href="<?php echo HOME_URI; ?>/usuarios/adicionar/" id="sample_editable_1_new" class="btn blue">
                                        Novo Usuário <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>

                            <?php if (isset($mensagem)): ?>
                                <div class="note note-success">
                                    <h4 class="block">
                                        <?php echo $mensagem ?>
                                    </h4>
                                </div>
                            <?php endif; ?>
                            <div class="table-scrollable">
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Permissão	
                                            </th>
                                            <th>
                                                Nome
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Usuário
                                            </th>
                                             <th>
                                                Operador Chat
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Ações
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($view as $param): ?>
                                            <tr>
                                                <td><?php echo $param['id']; ?></td>
                                                <td><?php echo $param['permissao']; ?></td>
                                                <td><?php echo $param['nome']; ?></td>
                                                <td><?php echo $param['email']; ?></td>
                                                <td><?php echo $param['user']; ?></td>
                                                <td>
                                                    <?php if ($param['operador'] == '1'): echo 'sim';
                                                    endif;
                                                    ?>
                                                    <?php if ($param['operador'] == '2'): echo 'não';
                                                    endif;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($param['ativo'] == '1'): echo 'ativo';
                                                    endif;
                                                    ?>
                                                    <?php if ($param['ativo'] == '2'): echo 'inativo';
                                                    endif;
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo HOME_URI; ?>/usuarios/editar/<?php echo $param['id']; ?>" href="" class="btn btn-primary-editar">Editar</a>
                                                    <a href="<?php echo HOME_URI; ?>/usuarios/excluir/<?php echo $param['id']; ?>" href="" class="btn btn-primary-excluir" onclick="return confirm('Deseja mesmo deletar?');">Excluir</a>
                                                </td>
                                            </tr>
<?php endforeach; ?>

                                    </tbody>
                                </table>
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