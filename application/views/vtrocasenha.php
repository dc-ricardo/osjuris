<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Troca de Senha</h1>

      <div class="row">

        <!-- primeira coluna vazia -->
        <div class="col-md-3">
        </div>

        <!-- coluna do conteúdo centralizado -->
        <div class="col-md-6">

          <div class="panel panel-default">
            <div class="panel-heading">Nome</div>
            <div class="panel-body">
              <?=$usuario[0]->nome;?>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">E-mail/Login</div>
            <div class="panel-body">
              <?=$usuario[0]->email;?>
            </div>
          </div>

          <?php
            if (validation_errors() == TRUE) {
              echo '<div class="alert alert-danger" role="alert">';
              echo validation_errors();
              echo '</div>';
            }
          ?>

          <form class="form-group" action="<?=base_url('perfil/atualizasenha/'.$usuario[0]->id_usuarios);?>" method="post">
            <div class="form-group">
              <input type="password" class="form-control" id="senhaatual" name="senhaatual" placeholder="senha atual">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="novasenha" name="novasenha" placeholder="nova senha">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="senhaconfirmada" name="senhaconfirmada" placeholder="nova senha (confirmação)">
            </div>

            <button type="submit" class="btn btn-primary">Trocar</button>

          </form>

        </div>

        <!-- última coluna vazia -->
        <div class="col-md-3">
        </div>

      </div>

    </div>
  </div>
</div>
