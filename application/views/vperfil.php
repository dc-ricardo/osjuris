<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Perfil</h1>

      <div class="row">

        <!-- primeira coluna vazia -->
        <div class="col-sm-3"></div>

        <!-- coluna do conteúdo centralizado -->
        <div class="col-sm-6">

          <?php
            if ($this->session->userdata('senhaalterada')) {
              echo '<h4 align="center"><span class="label label-success">Senha alterada com sucesso.</span></h4>';
            }
          ?>

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

          <div class="panel panel-default">
            <div class="panel-heading">Quantidade de registros consultados por página</div>
            <div class="panel-body">

              <div class="btn-group pull-left" role="group" aria-label="">
                <button type="button" class="btn btn-success"><?=$usuario[0]->registros_pagina;?></button>
              </div>

              <div class="btn-group pull-right" role="group" aria-label="" title="Opções">
                <a class="btn btn-default" role="button" href="<?=base_url('perfil/alterapaginacao/10');?>">10</a>
                <a class="btn btn-default" role="button" href="<?=base_url('perfil/alterapaginacao/20');?>">20</a>
                <a class="btn btn-default" role="button" href="<?=base_url('perfil/alterapaginacao/50');?>">50</a>
                <a class="btn btn-default" role="button" href="<?=base_url('perfil/alterapaginacao/100');?>">100</a>
                <a class="btn btn-default" role="button" href="<?=base_url('perfil/alterapaginacao/200');?>">200</a>
              </div>

            </div>
          </div>

          <a class="btn btn-primary" href="<?=base_url('perfil/trocasenha/'.$usuario[0]->id_usuarios)?>" role="button">Trocar Senha</a>

        </div>

        <!-- última coluna vazia -->
        <div class="col-sm-3"></div>

      </div>



    </div>
  </div>
</div>
