<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Recuperação de Senha | Painel Administrativo Agência Web Falcon5M</title>
        <?php require_once 'views/_include/head.php'; ?>
    </head>

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index">
                <img src="<?php echo IMAGES; ?>/logo.png" alt=""/>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->

        <div class="content">

            <?php if (isset($mensagem)): ?>
                <div class="note note-info">
                    <h4 class="block">
                        <?php echo $mensagem ?>
                    </h4>
                </div>
            <?php endif; ?>

            <!-- BEGIN LOGIN FORM -->
            <form action="" method="post" class="login-form" onsubmit="return validaRecover(this);">

                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">E-mail de cadastro</label>
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="E-mail" name="email"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Dica de Segurança</label>
                    <div class="input-icon">
                        <i class="fa fa-unlock"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Dica de Segurança" name="dica"/>
                        <p>efetue o login, <a href="<?php echo HOME_URI; ?>/login/index">clicando aqui</a></p>
                    </div>
                </div>

                <div class="form-actions">
                    <input type="submit" name="submit" value="Enviar" class="btn blue" />
                </div>

                <div class="login-options">
                    <h4>Siga a Falcon5M</h4> 
                    <ul class="social-icons">
                        <li>
                            <a class="facebook" data-original-title="facebook" href="https://www.facebook.com/AgenciaFalcon5M" target="_blank"> </a>
                        </li>
                        <li>
                            <a class="googleplus" data-original-title="Goole Plus" href="https://plus.google.com/111914324487805812644" target="_blank"> </a>
                        </li>
                    </ul>
                </div>

            </form>
            <!-- END LOGIN FORM -->

        </div>
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            Todos direitos reservados &copy; 
            <a href="http://www.falcon5m.com.br" target="_blank">Agência Falcon5M</a> - 
            <a href="http://www.falcon5m.com.br" target="_blank">Criação de Sites</a><br/>
            www.falcon5m.com.br - (51) 3085-7272
        </div>

    </body>
</html>