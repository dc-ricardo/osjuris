<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Perfil</h1>

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
        if ($this->session->userdata('senhaalterada')) {
          echo '<div class="row">';
          echo '<div class="col-sm-6">';
          echo '<h4><span class="label label-success">Senha alterada com sucesso.</span></h4>';
          echo '</div>';
          echo '</div>';
        }
      ?>

      <a class="btn btn-default" href="<?=base_url('perfil/trocasenha/'.$usuario[0]->id_usuarios)?>" role="button">Trocar Senha</a>

    </div>
  </div>
</div>
