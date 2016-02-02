<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Pessoa
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>pessoas/novo" role="button">Novo</a>
          <a class="btn btn-primary" href="<?=base_url('pessoas/edita/'.$pessoa[0]->id_pessoas);?>" role="button">Editar</a>
        </div>
      </h1>

      <div class="form-group">
        <h5  class="text-muted">Nome/Razão Social</h5>
        <h4><?=$pessoa[0]->nome_razao;?></h4>
      </div>

      <div class="row">
        <div class="col-md-3">
          <h5 class="text-muted">Código</h5>
          <h4><?=$pessoa[0]->codigo;?></h4>
        </div>
        <div class="col-md-3">
          <h5 class="text-muted">Tipo</h5>
          <?php $tipos = unserialize(CPESSOASTIPO);?>
          <h4><?=$tipos[$pessoa[0]->tipo]?></h4>
        </div>
        <div class="col-md-3">
          <h5 class="text-muted">CPF/CNPJ</h5>
          <h4><?=$pessoa[0]->cpf_cnpj;?></h4>
        </div>
        <div class="col-md-3">
          <h5 class="text-muted">RG/Inscrição</h5>
          <h4><?=$pessoa[0]->rg_ie;?></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2">
          <h5 class="text-muted">CEP</h5>
          <h4><?=$pessoa[0]->cep;?></h4>
        </div>
        <div class="col-md-6">
          <h5 class="text-muted">Endereço</h5>
          <h4><?=$pessoa[0]->endereco;?></h4>
        </div>
        <div class="col-md-1">
          <h5 class="text-muted">Número</h5>
          <h4><?=$pessoa[0]->numero;?></h4>
        </div>
        <div class="col-md-2">
          <h5 class="text-muted">Complemento</h5>
          <h4><?=$pessoa[0]->complemento;?></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <h5 class="text-muted">Bairro</h5>
          <h4><?=$pessoa[0]->bairro;?></h4>
        </div>
        <div class="col-md-6">
          <h5 class="text-muted">Cidade</h5>
          <h4><?=$pessoa[0]->cidade;?></h4>
        </div>
        <div class="col-md-3">
          <h5 class="text-muted">Estado</h5>
          <h4><?=$pessoa[0]->estado;?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <h5 class="text-muted">Telefone</h5>
          <h4><?=$pessoa[0]->telefone;?>
        </div>
        <div class="col-md-4">
          <h5 class="text-muted">Celular</h5>
          <h4><?=$pessoa[0]->celular;?></h4>
        </div>
        <div class="col-md-4">
          <h5 class="text-muted">E-mail</h5>
          <h4><?=$pessoa[0]->email;?></h4>
        </div>
      </div>

      <div class="form-group">
        <h5 class="text-muted">Observações</h5>
        <h4><?= nl2br($pessoa[0]->observacoes); ?></h4>
      </div>

    </div>
  </div>
</div>
