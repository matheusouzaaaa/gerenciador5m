<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Relatório | Gerenciador de Tarefas</title>
    <?php require_once 'views/_include/head.php'; ?>
    <?php require_once MODELS . '/Login/Login.class.php'; ?>
</head>

<body>
    <div id="wrap">
        <?php require INCLUSAO . '/nav.php'; ?>

        <div class="container-fluid">

            <?php require INCLUSAO . '/menu.php'; ?>

            <!-- Main window -->  
            <div class="main_container" id="analytics_page">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo HOME_URI; ?>/tarefas/index">Página Inicial</a> <span class="divider">/</span></li>
                        <li class="active"><p>Relatório</p></li>
                    </ul>
                </div>

                <!-- HEADER -->
                <div class="row-fluid">
                    <div class="widget-top widget widget-padding">
                        <div class="widget-header"><i class="icon-signal"></i><h5>Relatório de Entregas de Tarefas por Usuário</h5>
                            <div class="widget-buttons">
                                <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <?php foreach ($view as $param): ?>
                                <div class="circle">
                                    <a href="<?php echo HOME_URI . "/tarefas/entregues/" . $param['id']; ?>">
                                        <img style="margin: 10px 0px;" src="<?php echo IMAGES; ?>/logo-transp.png"/>
                                        <?php echo $param['nome']; ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
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