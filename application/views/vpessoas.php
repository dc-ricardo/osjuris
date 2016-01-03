<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Pessoas
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>pessoas/novo" role="button">Novo</a>
        </div>
      </h1>

      <div class="row">
        <div class="col-md-2">
          <h5><a href="#">Cadastradas <span class="badge">100</span></a></h5>
          <h5><a href="#">Sem Processo <span class="badge">50</span></a></h5>
          <h5><a href="#">Com Processo <span class="badge">50</span></a></h5>
          <h5><a href="#">Advogados <span class="badge">4</span></a></h5>
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
                    <td><?= $pessoa->nome_razao; ?></td>
                    <td><?= $pessoa->codigo; ?></td>
                    <td><?= $pessoa->cpf_cnpj; ?></td>
                    <td>
                      <a class="btn btn-default btn-xs" href="<?=base_url('pessoas/consulta/'.$pessoa->id_pessoas)?>">Consultar</a>
                      <a class="btn btn-default btn-xs" href="<?=base_url('pessoas/edita/'.$pessoa->id_pessoas)?>">Editar</a>
                      <a class="btn btn-default btn-xs" href="#">Processos</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
