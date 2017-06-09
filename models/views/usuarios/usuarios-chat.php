<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Chat | Gerenciador de Tarefas</title>
  <?php require_once 'views/_include/head.php'; ?>
  <?php require_once MODELS . '/Login/Login.class.php'; ?>
  <script src='https://cdn.firebase.com/js/client/1.0.17/firebase.js'></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
  <script src='http://www.falcon5m.com.br/tcc/views/chat/firebasechat.js'></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
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
            <li class="active"><p>Chat</p></li>
          </ul>
        </div>

        <div class="row-fluid">
          <div class="widget span12">
            <div class="widget-header">
              <i class="icon-tasks"></i>
              <h5>Envie uma mensagem</h5>
            </div>
            <div class="widget-body row-fluid" style="padding: 15px;">
              <div class="widget-tasks-assigned">
                <div class="box-mensagens">
                  <div class="col-md-12">
                    <input type="hidden" id="nomeusuario" value="<?php $login = New Login(); $login->identifica(); ?>">
                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" rows="7"></textarea><br/>
                    <input type="submit" id="enviar" value="Enviar Mensagem" class="btn btn-primary" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row-fluid">
          <div class="widget span12">
            <div class="widget-header">
              <i class="icon-tasks"></i>
              <h5>Mensagens</h5>
            </div>
            <div class="widget-body row-fluid">
              <div class="widget-tasks-assigned">
                <div class="box-mensagens">
                  <div id='mensagens'></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        

      </div>
      <!-- /Main window -->

    </div><!--/.fluid-container-->
  </div><!-- wrap ends-->

  <style type="text/css">
    .box-mensagens{display: block; width: 100%;}
    .box-mensagens > #mensagens{width: 100%; display: block; padding: 5px;}

    .box-mensagens input[type='text']{width: 100%; box-shadow: 0px 1px 14px 1px #08560e; margin-bottom: 20px}
    .box-mensagens textarea{width: 100%; overflow: hidden;}
    .box-mensagens input[type='submit']{margin: 5px 0px; background-color: #2D9AF9;}

    .div-mensagens{margin: 10px auto; width: 100%; border: 1px solid rgb(74, 179, 220); padding: 5px; border-radius: 5px;}
  </style>
  <?php require INCLUSAO . '/footer.php'; ?>
</body>
</html>