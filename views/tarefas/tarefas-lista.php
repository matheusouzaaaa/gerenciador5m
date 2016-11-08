<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Lista de Tarefas | Gerenciador de Tarefas</title>
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
                            <li class="active"><p>Lista de Tarefas</p></li>
                        </ul>
                    </div>

                    <div class="row-fluid">
                        <div class="widget span12">
                            <div class="widget-header">
                                <i class="icon-tasks"></i>
                                <h5>Lista de Tarefas</h5>
                                <div class="widget-buttons">
                                    <a href="<?php echo HOME_URI; ?>/tarefas/adicionar"><i class="icon-plus"></i></a>
                                </div>
                            </div>
                            <div class="widget-body clearfix">
                                <div class="widget-tasks-assigned">
                                    <ul>
                                        <?php foreach ($view as $param): ?>
                                            <li class="priority-high-left">
                                                <div class="content">
                                                    <h5>#<?php echo $param['id']; ?> <?php echo $param['titulo']; ?></h5>
                                                    <span><strong>Data e hora de Cadastro:</strong> <?php echo dataBR($param['data_cadastro']); ?> às <?php echo horaBR($param['hora_cadastro']). ":" . minBR($param['hora_cadastro']); ?> | <strong>Responsável:</strong> <?php echo $param['nome_usuario']; ?> | <strong>Criada por:</strong> <?php echo $param['nome_criador']; ?></span>
                                                </div>
                                                <ul class="rightboxes">
                                                    <li style="width: 100%"><a href="<?php echo HOME_URI . "/tarefas/tarefa/" . $param['id']; ?>">Ver Detalhes da tarefa</a></li>
                                                </ul>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Main window -->

            </div><!--/.fluid-container-->
        </div><!-- wrap ends-->

        <?php require INCLUSAO . '/footer.php'; ?>
    </body>
</html>