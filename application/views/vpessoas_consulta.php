<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <!-- <h1 class="page-header">Pessoa</h1> -->

      <h1 class="page-header">Pessoa
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>pessoas/novo" role="button">Novo</a>
          <a class="btn btn-primary" href="<?=base_url('pessoas/edita/'.$pessoa[0]->id_pessoas);?>" role="button">Editar</a>
          <a class="btn btn-primary" href="<?=base_url()?>pessoas/novo" role="button">Processos</a>
        </div>
      </h1>

      <div class="form-group">
        <h5>Nome/Razão Social</h5>
        <h4><?=$pessoa[0]->nome_razao;?></h4>
      </div>

      <div class="row">
        <div class="col-md-3">
          <h5>Código</h5>
          <h4><?=$pessoa[0]->codigo;?></h4>
        </div>
        <div class="col-md-3">
          <h5>Tipo</h5>
          <?php $tipos = unserialize(PESSOAS_TIPO);?>
          <h4><?=$tipos[$pessoa[0]->tipo]?></h4>
        </div>
        <div class="col-md-3">
          <h5>CPF/CNPJ</h5>
          <h4><?=$pessoa[0]->cpf_cnpj;?></h4>
        </div>
        <div class="col-md-3">
          <h5>RG/Inscrição</h5>
          <h4><?=$pessoa[0]->rg_ie;?></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <h5>Endereço</h5>
          <h4><?=$pessoa[0]->endereco;?></h4>
        </div>
        <div class="col-md-1">
          <h5>Número</h5>
          <h4><?=$pessoa[0]->numero;?></h4>
        </div>
        <div class="col-md-2">
          <h5>Complemento</h5>
          <h4><?=$pessoa[0]->complemento;?></h4>
        </div>
        <div class="col-md-3">
          <h5>Bairro</h5>
          <h4><?=$pessoa[0]->bairro;?></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <h5>Cidade</h5>
          <h4><?=$pessoa[0]->cidade;?></h4>
        </div>
        <div class="col-md-2">
          <h5>Estado</h5>
          <h4><?=$pessoa[0]->estado;?>
        </div>
        <div class="col-md-4">
          <h5>CEP</h5>
          <h4><?=$pessoa[0]->cep;?></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <h5>Telefone</h5>
          <h4><?=$pessoa[0]->telefone;?>
        </div>
        <div class="col-md-4">
          <h5>Celular</h5>
          <h4><?=$pessoa[0]->celular;?></h4>
        </div>
        <div class="col-md-4">
          <h5>E-mail</h5>
          <h4><?=$pessoa[0]->email;?></h4>
        </div>
      </div>

      <div class="form-group">
        <h5>Observações</h5>
        <h4><?= nl2br($pessoa[0]->observacoes); ?></h4>
      </div>

    </div>
  </div>
</div>
