<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Editar Usuário | Painel Administrativo Agência Web Falcon5M</title>
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
                                <i class="fa fa-edit"></i>Editar Usuário
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validaAddPaginas(this);">

                                <?php foreach ($view as $param): ?>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Permissão</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                                <select name="permissao" class="form-control">
                                                    <?php if ($param['permissao'] == 'superadmin'): ?>
                                                        <option value="<?php echo $param['permissao']; ?>" selected=""><?php echo $param['permissao']; ?></option>
                                                        <option value="user">user</option>
                                                    <?php endif; ?>
                                                    <?php if ($param['permissao'] == 'admin'): ?>
                                                        <option value="<?php echo $param['permissao']; ?>" selected=""><?php echo $param['permissao']; ?></option>
                                                        <option value="user">user</option>
                                                    <?php endif; ?>

                                                    <?php if ($param['permissao'] == 'user'): ?>
                                                        <option value="<?php echo $param['permissao']; ?>" selected=""><?php echo $param['permissao']; ?></option>
                                                        <option value="admin">admin</option>
                                                    <?php endif; ?>
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
                                                    
                                                    <?php if ($param['operador'] == '1'): ?>
                                                        <option value="<?php echo $param['operador']; ?>" selected="">sim</option>
                                                        <option value="2">não</option>
                                                    <?php endif; ?>
                                                    <?php if ($param['operador'] == '2'): ?>
                                                        <option value="<?php echo $param['operador']; ?>" selected="">não</option>
                                                        <option value="1">sim</option>
                                                    <?php endif; ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome Completo</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <input type="text" name="nome" class="form-control" value="<?php echo $param['nome']; ?>"/> 
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
                                                <input type="text" name="email" class="form-control" value="<?php echo $param['email']; ?>"/> 
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
                                                <input type="text" name="user" class="form-control" value="<?php echo $param['user']; ?>"/> 
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
                                                <input type="text" name="dica" class="form-control" alue="<?php echo $param['dica']; ?>"/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-download"></i>
                                                </span>
                                                <select name="ativo" class="form-control">
                                                    <?php if ($param['ativo'] == '1'): ?>
                                                        <option value="<?php echo $param['ativo']; ?>" selected="">ativo</option>
                                                        <option value="2">inativo</option>
                                                    <?php endif; ?>

                                                    <?php if ($param['ativo'] == '2'): ?>
                                                        <option value="<?php echo $param['ativo']; ?>" selected="">inativo</option>
                                                        <option value="1">ativo</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                                    <div class="clear"></div>    
                                    
                                <div class="submit">
                                    <input type="submit" name="submit" value="Editar" class="btn blue" /> 
                                </div>
                                <div class="clear"></div>

                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>


                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Alteração de Senha
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validaAddPaginas(this);">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nova Senha</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input type="password" name="password" class="form-control"/> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirmar</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input type="password" name="password2" class="form-control"/> 
                                        </div>
                                    </div>
                                </div>

                                <div class="submit">
                                    <input type="submit" name="submit-password" value="Alterar" class="btn blue" /> 
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