<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Chat | Painel Administrativo Agência Web Falcon5M</title>
        <?php require_once 'views/_include/head.php'; ?>
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
                    <!-- INCLUDE GLOBAL DO PAINEL. -->

                    <div class="col-md-12 col-sm-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bubble font-hide hide"></i>
                                    <span class="caption-subject font-hide bold uppercase">Chat da Empresa - </span>
                                    <span class="caption-subject font-hide bold uppercase"><a href="JavaScript:location.reload(true);" style="color:#00B1CE;">Clique para Atualizar</a> </span>
                                </div>
                            </div>
                            <div class="portlet-body" id="chats">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 400px;">
                                    <div class="scroller" style="height: 400px; overflow: auto; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                                        <ul class="chats">

                                            <?php foreach ($view as $param): ?>
                                            <li class="in">
                                                <img class="avatar" alt="" src="<?php echo IMAGES; ?>/avatar.png" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> <?php echo $param['nome']; ?> </a>
                                                    <span class="datetime"> <?php echo dataBR($param['data']); ?> - <?php echo $param['horario']; ?></span>
                                                    <span class="body"> <?php echo $param['texto']; ?></span>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>

                                        </ul>
                                    </div>
                                </div>
                                <form action=""method="post">
                                    <div class="chat-form">
                                        <div class="input-cont">
                                            <input class="form-control" type="text" name="texto" placeholder="Escreva sua Mensagem" /> 
                                        </div>
                                        <div class="btn-cont">
                                            <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                                            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="data"/>
                                            <input type="hidden" value="<?php echo date('H:i'); ?>" name="horario"/>
                                            <input type="submit" value="Enviar" class="btn btn-primary-editar" name="submit" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>

                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <?php require INCLUSAO . '/footer.php'; ?>
            <!-- END FOOTER -->

            <!-- END JAVASCRIPTS -->
    </body>
</html>