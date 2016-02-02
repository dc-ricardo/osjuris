<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Pessoas
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>pessoas/novo" role="button">Novo</a>
        </div>
      </h1>

      <div class="row">
        <div class="col-md-2">
          <h5><a href="<?=base_url('pessoas/consultacadastradas');?>">Cadastradas <span class="badge"><?=$cadastradas;?></span></a></h5>
          <h5><a href="#">Sem Processo <span class="badge">0</span></a></h5>
          <h5><a href="#">Réus <span class="badge">0</span></a></h5>
          <h5><a href="#">Autores <span class="badge">0</span></a></h5>
          <h5><a href="#">Interessados <span class="badge">0</span></a></h5>
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
                    <td><?= $pessoa->nome_razao; ?></td>
                    <td><?= $pessoa->codigo; ?></td>
                    <td><?= $pessoa->cpf_cnpj; ?></td>
                    <td>
                      <a class="btn btn-default btn-xs" href="<?=base_url('pessoas/consulta/'.$pessoa->id_pessoas)?>">Consultar</a>
                      <a class="btn btn-default btn-xs" href="<?=base_url('pessoas/edita/'.$pessoa->id_pessoas)?>">Editar</a>
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
