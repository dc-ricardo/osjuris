<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?=base_url();?>assets/img/favicon.ico">

  <title>OSJuris</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="<?=base_url();?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=base_url();?>assets/css/dashboard.css" rel="stylesheet">

  <!-- desabilita a tecla ENTER/RETRUN nos formulários -->
  <script type="text/javascript">
    function stopRKey(evt) {
      var evt = (evt) ? evt : ((event) ? event : null);
      var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
      if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
    }
    document.onkeypress = stopRKey;
  </script>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">

      <div class="navbar-header">
        <a class="navbar-brand" href="<?=base_url()?>">OSJuris CE <?=COSJVERSAO?></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Ativar navegação</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav navbar-right">

          <li><a href="<?=base_url('dashboard')?>"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a></li>
          <li><a href="<?=base_url('processos')?>"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Processos</a></li>
          <li><a href="<?=base_url('pessoas')?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Pessoas</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle"
              data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-th" aria-hidden="true"></span> Tabelas
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?=base_url('localizacoes')?>">Localizações</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              <?=$this->session->userdata['logged_in']['nome'];?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?=base_url('perfil')?>">Perfil</a></li>
              <li><a href="<?=base_url('logon/logout')?>">Sair</a></li>
              <?php
                if ($this->session->userdata['logged_in']['nivel'] == CNIVELADMINISTRADOR) {
                  echo '<li role="separator" class="divider"></li>';
                  echo '<li><a href="'.base_url('usuarios').'">Usuários</a></li>';
                }
              ?>
              <li role="separator" class="divider"></li>
              <li><a href="http://osjuris.com.br/docs">Docs</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
