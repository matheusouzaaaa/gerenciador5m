<?php require_once MODELS . '/Login/Login.class.php'; ?>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <div class="logo"> 
                <img src="<?php echo IMAGES; ?>/logo-gerenciador.png" alt="Logo">
            </div>
            <a class="btn btn-navbar visible-phone" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="btn btn-navbar slide_menu_left visible-tablet">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="top-menu visible-desktop">
                <ul class="pull-right">  
                    <li><a href="<?php echo HOME_URI; ?>?acao=sair"><i class="icon-off"></i> Logout</a></li>
                </ul>
            </div>

            <div class="top-menu visible-phone visible-tablet">
                <ul class="pull-right">  
                    <li><a href="<?php echo HOME_URI; ?>?acao=sair"><i class="icon-off"></i></a></li>
                </ul>
            </div>

        </div>
    </div>
</div>