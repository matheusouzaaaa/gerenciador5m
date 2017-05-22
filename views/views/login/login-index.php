<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Login | Gerenciador de Tarefas</title>
        <?php require_once 'views/_include/head.php'; ?>
    </head>

    <body>
        <div id="wrap">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="widget container-narrow">
                                <div class="widget-header">
                                    <i class="icon-user"></i>
                                    <h5>Faça o Login</h5>
                                </div>  
                                <div class="widget-body clearfix" style="padding:25px;">
                                    <?php if (isset($mensagem)): ?>
                                        <div class="note note-info">
                                            <h4 class="block">
                                                <?php echo $mensagem ?>
                                            </h4>
                                        </div>
                                    <?php endif; ?>
                                    <form action="" method="post" onsubmit="return validaLogin(this);">
                                        <div class="control-group">
                                            <div class="controls">
                                                <label>Login</label>
                                                <input class="btn-block" type="text" placeholder="Insira seu login" name="login"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <label>Senha</label>
                                                <input class="btn-block" type="password" placeholder="Insira sua senha" name="password"/>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" value="Acessar" class="btn pull-right" />
                                    </form>
                                </div>  
                            </div>  
                        </div><!--/row-fluid-->
                    </div><!--/span10-->
                </div><!--/row-fluid-->
            </div><!--/.fluid-container-->
        </div><!-- wrap ends-->
        
    </body>
</html>