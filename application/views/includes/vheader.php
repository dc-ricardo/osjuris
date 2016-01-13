<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?= base_url();?>assets/img/favicon.ico">

  <title>OS Juris</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="<?= base_url();?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url();?>assets/css/dashboard.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Ativar navegação</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url()?>">OS Juris CE <?=COSJVERSAO?></a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?=$this->session->userdata['logged_in']['nome'];?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?=base_url()?>perfil">Perfil</a></li>
              <li><a href="<?=base_url()?>logon/logout">Sair</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Configurações</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Ajuda</a></li>
            </ul>
          </li>
        </ul>

        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Procurar...">
          </div>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </form>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?=base_url()?>dashboard">Dashboard</a></li>
          <li><a href="<?=base_url()?>processos">Processos</a></li>
          <li><a href="<?=base_url()?>pessoas">Pessoas</a></li>
          <li><a href="<?=base_url()?>eventosnovo">Novo Evento</a></li>
          <li><a href="<?=base_url()?>localizacoes">Localizações</a></li>
        </ul>

      </div>

    </div>

  </nav>
