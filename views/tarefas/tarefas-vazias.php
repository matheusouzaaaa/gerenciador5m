<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Inicial | Gerenciador de Tarefas</title>
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

                <div class="row-fluid" style="margin-top: 15px;">
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
                                    <li class="priority-high-left">
                                        <div class="content">
                                            <h5>Você não tem tarefas cadastradas no momento!</h5>
                                        </div>
                                        <ul class="rightboxes">
                                        <li style="width: 100%"><a href="<?php echo HOME_URI . "/tarefas/adicionar/" ?>">Nova Tarefa</a></li>
                                        </ul>
                                    </li>
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