<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <div class="row">
        <div class="col-md-2">
          <h1 class="page-header">Pessoas</h1>
        </div>
        <div class="col-md-4">
          <form class="form-group" action="<?=base_url('pessoas/localiza');?>" method="post">
            <div class="input-group">
              <input type="text" class="form-control" id="conteudo" name="conteudo" placeholder="localizar por nome, código ou cpf/cnpj...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="submit" value="localizapessoa">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              </span>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="btn-group pull-right" role="group">
            <a class="btn btn-primary" href="<?=base_url()?>pessoas/novo" role="button">Novo</a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2">
          <h5><a href="<?=base_url('pessoas/consultacadastradas');?>">Cadastradas <span class="badge"><?=$cadastradas;?></span></a></h5>
          <h5><a href="<?=base_url('pessoas/consultafisicas');?>">Físicas <span class="badge"><?=$fisicas;?></span></a></h5>
          <h5><a href="<?=base_url('pessoas/consultajuridicas');?>">Jurídicas <span class="badge"><?=$juridicas;?></span></a></h5>
          <h5><a href="<?=base_url('pessoas/consultaadvogados');?>">Advogados <span class="badge"><?=$advogados;?></span></a></h5>
        </div>
        <div class="col-md-10">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nome/Razão Social</th>
                  <th>Código</th>
                  <th>CPF/CNPJ</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($pessoas as $pessoa): ?>
                  <tr>
                    <td>
                      <a href="<?=base_url('pessoas/consulta/'.$pessoa->id_pessoas)?>"><?=$pessoa->nome_razao;?></a>
                    </td>
                    <td><?=$pessoa->codigo;?></td>
                    <td><?=$pessoa->cpf_cnpj;?></td>
                    <td>
                      <a class="btn btn-default btn-xs" href="<?=base_url('pessoas/edita/'.$pessoa->id_pessoas)?>">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Editar"></span></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <nav><?=$paginacao?></nav>

        </div>
      </div>

    </div>
  </div>
</div>
