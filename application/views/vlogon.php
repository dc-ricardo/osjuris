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

<div class="container-fluid">

	<div class="row">

		<div class="col-md-4"></div>

		<div class="col-md-4">

			<div class="panel panel-primary">
				<div class="panel-heading">OS Juris - Logon</div>
				<div class="panel-body">

					<form class="form-group" method="post" action="<?=base_url()?>validalogin">

            <?=validation_errors();?>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="email" class="form-control" id="email" name="email" placeholder="">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputPassword1">Senha</label>
					    <input type="password" class="form-control" id="senha" name="senha" placeholder="">
					  </div>

					  <button type="submit" class="btn btn-default">Entrar</button>

					</form>

				</div>
			</div>

		</div>

		<div class="col-md-4"></div>

  </div>

</div>

</body>
</html>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url();?>assets/js/jquery.min.js"><\/script>')</script>
<script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?= base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
