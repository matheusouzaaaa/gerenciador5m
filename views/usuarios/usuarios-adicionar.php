<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Adicionar Usuário | Painel Administrativo Agência Web Falcon5M</title>
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

                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-plus-square-o"></i>Adicionar Usuário
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validaAddUsuarios(this);">

                                <?php if (isset($mensagem)): ?>
                                    <div class="note note-success">
                                        <h4 class="block">
                                            <?php echo $mensagem ?>
                                        </h4>
                                    </div>
                                <?php endif; ?>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                            <select name="permissao" class="form-control">
                                                <option value="" selected="">Selecione...</option>
                                                <option value="admin">admin</option>
                                                <option value="user">user</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Operador de Chat</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                            <select name="operador" class="form-control">
                                                <option value="" selected="">Selecione...</option>
                                                <option value="1">sim</option>
                                                <option value="2">não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" name="nome" class="form-control" /> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="email" class="form-control" /> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Usuário</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            <input type="text" name="user" class="form-control" /> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input type="password" name="password" class="form-control" /> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dica de Segurança</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-unlock"></i>
                                            </span>
                                            <input type="text" name="dica" class="form-control" /> 
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="clear"></div>

                                <div class="submit">
                                    <input type="hidden" value="1" name="ativo" />
                                    <input type="submit" name="submit" value="Cadastrar" class="btn blue" /> 
                                    <input type="reset" value="Limpar Campos" class="btn blue" />      
                                </div>
                                <div class="clear"></div>

                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>


                </div>
            </div>
            <?php require INCLUSAO . '/footer.php'; ?>
            <!-- END FOOTER -->

            <!-- END JAVASCRIPTS -->
    </body>
</html>