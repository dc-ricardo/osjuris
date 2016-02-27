<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <?php $niveis = unserialize(CNIVELUSUARIO);?>

      <div class="row">
        <div class="col-md-2">
          <h1 class="page-header">Usuários</h1>
        </div>
        <div class="col-md-4">
          <form class="form-group" action="<?=base_url('usuarios/localiza');?>" method="post">
            <div class="input-group">
              <input type="text" class="form-control" id="conteudo" name="conteudo" placeholder="localizar por nome ou E-mail...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="submit" value="localizausuario">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              </span>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="btn-group pull-right" role="group">
            <a class="btn btn-primary" href="<?=base_url()?>usuarios/novo" role="button">Novo</a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2">
          <h5><a href="<?=base_url('usuarios/habilitados');?>">Habilitados <span class="badge"><?=$habilitados;?></span></a></h5>
          <h5><a href="<?=base_url('usuarios/desabilitados');?>">Desabilitados <span class="badge"><?=$desabilitados;?></span></a></h5>
          <h5><a href="#">Todos <span class="badge">0</span></a></h5>
        </div>
        <div class="col-md-10">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Nível</th>
                  <th>Habilitado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($usuarios as $usuario): ?>
                  <tr>
                    <td><?=$usuario->nome;?></td>
                    <td><?=$usuario->email;?></td>
                    <td><?=$niveis[$usuario->nivel];?></td>
                    <td><?=$usuario->habilitado;?></td>
                    <!-- <td><?=$usuario->habilitado=1?'S':'N';?></td> -->
                    <td>
                      <a class="btn btn-default btn-xs" href="<?=base_url('usuarios/edita/'.$usuario->id_usuarios)?>">Editar</a>
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
