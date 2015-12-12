<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Nova Pessoa</h1>
      <form>

        <div class="row">

          <div class="col-md-3">
            <label for="codigo">Código</label>
            <div class="input-group">
              <input type="text" class="form-control" id="codigo">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default">Gerar</button>
              </span>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="tipo">Tipo</label>
              <select class="form-control" id="tipo">
                <option>Física</option>
                <option>Jurídica</option>
              </select>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="cpf_cnpj">CPF/CNPJ</label>
              <input type="text" class="form-control" id="cpf_cnpj">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="rg_ie">RG/Inscrição</label>
              <input type="text" class="form-control" id="rg_ie">
            </div>
          </div>

        </div>

        <div class="form-group">
          <label for="nome_razao">Nome/Razão Social</label>
          <input type="text" class="form-control" id="nome_razao">
        </div>

        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" id="endereco">
            </div>
          </div>

          <div class="col-md-1">
            <div class="form-group">
              <label for="numero">Número</label>
              <input type="text" class="form-control" id="numero">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label for="complemento">Complemento</label>
              <input type="text" class="form-control" id="complemento">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro">
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" id="estado">
            </div>
          </div>

          <div class="col-md-4">
            <label for="cep">CEP</label>
            <div class="input-group">
              <input type="text" class="form-control" id="cep">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default">Buscar</button>
              </span>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" id="telefone">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="celular">Celular</label>
              <input type="text" class="form-control" id="celular">
            </div>
          </div>


          <div class="col-md-4">
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" id="email">
            </div>
          </div>

        </div>

        <div class="form-group">
          <label for="observacoes">Observações</label>
          <textarea class="form-control" rows="3" id="observacoes"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Inserir</button>

      </form>
    </div>
  </div>
</div>
