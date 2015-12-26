<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Novo Evento</h1>
      <form>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Processo</h3>
          </div>
          <div class="panel-body">
            9787492834978327 | BR36 Hardware Ltda. | João da Silva | Dr. Eduardo Costa
          </div>
        </div>

        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              <label for="codigo">Data</label>
              <input type="text" class="form-control" id="data">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="tipo">Tipo</label>
              <select class="form-control" id="tipo">
                <option>Andamento</option>
                <option>Prazo</option>
                <option>Apenso</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="prazo">Prazo</label>
              <input type="text" class="form-control" id="prazo">
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              <label for="tipo">Visibilidade</label>
              <select class="form-control" id="tipo">
                <option>Público</option>
                <option>Privado</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="codigo">Número Processo</label>
              <input type="text" class="form-control" id="data">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="prazo">Localização</label>
              <input type="text" class="form-control" id="prazo">
            </div>
          </div>

        </div>

        <div class="form-group">
          <label for="descricao">Descrição</label>
          <textarea class="form-control" rows="3" id="descricao"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Inserir</button>

      </form>
    </div>
  </div>
</div>
