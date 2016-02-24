<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Troca de Senha</h1>

      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading">Nome</div>
            <div class="panel-body">
              <?=$usuario[0]->nome;?>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading">E-mail/Login</div>
            <div class="panel-body">
              <?=$usuario[0]->email;?>
            </div>
          </div>
        </div>
      </div>

      <?php
        if (validation_errors() == TRUE) {
          echo '<div class="row">';
          echo '<div class="col-md-6">';
          echo '<div class="alert alert-danger" role="alert">';
          echo validation_errors();
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      ?>

      <form class="form-group" action="<?=base_url('perfil/atualizasenha/'.$usuario[0]->id_usuarios);?>" method="post">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <input type="password" class="form-control" id="senhaatual" name="senhaatual" placeholder="senha atual">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="novasenha" name="novasenha" placeholder="nova senha">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="senhaconfirmada" name="senhaconfirmada" placeholder="nova senha (confirmação)">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-default">Trocar</button>
      </form>

    </div>
  </div>
</div>
