@extends('admin.layouts.main') 

@section('content')

@include ('admin.ead.menu')
    <div class="card filtro">
        <form method="POST" action="{{ route('admin-pessoas-store') }}">
            @csrf
            <div class="card-header">
                <h5>Adicionar Cliente</h5>
            </div>
            <div class="card-body row">
                <div class="form-group col-md-12">
                    <label for="nome">Nome</label>
                    <input autocomplete="off" name="nome" type="text" class="form-control" id="nome">
                </div>

                <div class="form-group col-md-3">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" name="sexo" id="sexo">
                        <option value="">Selecione o sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="cpf">CPF</label>
                    <input autocomplete="off" name="cpf" type="text" class="form-control" id="cpf">
                </div>

                <div class="form-group col-md-3">
                    <label for="data_nascimento">Data Nascimento</label>
                    <input autocomplete="off" name="data_nascimento" type="date" class="form-control" id="data_nascimento">
                </div>

                <div class="form-group col-md-3">
                    <label for="estado_civil">Estado Civil</label>
                    <select class="form-control" name="estado_civil" id="estado_civil">
                        <option value="">Selecione o estado civil</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Separado">Separado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viuvo">Viuvo</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="email">E-mail</label>
                    <input autocomplete="off" name="email" type="text" class="form-control" id="email">
                </div>

                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input autocomplete="off" name="telefone" type="text" class="form-control" id="telefone">
                </div>

                <div class="form-group col-md-4">
                    <label for="celular">Celular</label>
                    <input autocomplete="off" name="celular" type="text" class="form-control" id="celular">
                </div>

                <div class="form-group col-md-6">
                    <label for="link_facebook">Facebook</label>
                    <input autocomplete="off" name="link_facebook" type="text" class="form-control" placeholder="http://" id="link_facebook">
                </div>

                <div class="form-group col-md-6">
                    <label for="link_instagram">Instagram</label>
                    <input autocomplete="off" name="link_instagram" type="text" class="form-control" placeholder="http://" id="link_instagram">
                </div>

                <div class="form-group col-md-3">
                    <label for="cep">CEP</label>
                    <input autocomplete="off" name="cep" type="text" class="form-control" id="cep">
                    <small class="text-danger d-block" id="cep_nao_encontrado"></small>
                </div>

                <div class="form-group col-md-5">
                    <label for="endereco">Endereço</label>
                    <input autocomplete="off" name="endereco" type="text" class="form-control" id="endereco">
                </div>

                <div class="form-group col-md-1">
                    <label for="numero">Número</label>
                    <input autocomplete="off" name="numero" type="number" class="form-control" id="numero">
                </div>

                <div class="form-group col-md-3">
                    <label for="complemento">Complemento</label>
                    <input autocomplete="off" name="complemento" type="text" class="form-control" id="complemento">
                </div>

                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input autocomplete="off" name="bairro" type="text" class="form-control" id="bairro">
                </div>

                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input autocomplete="off" name="cidade" type="text" class="form-control" id="cidade">
                </div>

                <div class="form-group col-md-1">
                    <label for="estado">Estado</label>
                    <select class="form-control uf" name="estado" id="estado">
                        <option value="">Selecione o estado</option>
                        @forelse(getEstados() as $estado)
                            <option value="{{ $estado }}">{{ $estado }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="pais">País</label>
                    <input autocomplete="off" name="pais" type="text" class="form-control" id="pais">
                </div>

                <div class="form-group col-md-4">
                    <label for="possui_filhos">Possui Filhos?</label>
                    <select class="form-control" name="possui_filhos" id="possui_filhos">
                        <option value="">Selecione o estado civil</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="quantidade_filhos">Se sim, quantos?</label>
                    <input autocomplete="off" name="quantidade_filhos" type="number" class="form-control" id="quantidade_filhos">
                </div>

                <div class="form-group col-md-3">
                    <label for="password">Senha</label>
                    <input autocomplete="off" name="password" type="password" class="form-control" id="password">
                </div>
            </div>

            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-user"></i>
                    Salvar
                </button>
            </div>
        </form>
    </div>

    <style>
        .f-custom
        {
            font-size: 90% !important;
        }
    </style>

    <script>
        $(document).ready(function () {
            $("#cep_nao_encontrado").hide();

            $('#cpf').mask('000.000.000-00', {reverse: false});
            $('#telefone').mask('(00) 0000-0000');
            $('#celular').mask('(00) 00000-0000');
            $('#cep').mask('00000-000');
        });

        $('form').submit(function () {
            $('#cpf').unmask();
            $('#telefone').unmask();
            $('#celular').unmask();
            $('#cep').unmask();
        });

        $("#cep").blur(function()
        {
            var cep_digitado = $("#cep").val();

            $.ajax({
                url: 'https://viacep.com.br/ws/'+cep_digitado+'/json/',
                success: function(res) {
                    if(res['erro'] == true)
                    {
                        $("#numero").attr('required', false);
                        $("#cep_nao_encontrado").show();
                        $("#endereco").val('');
                        $("#uf").val('');
                        $("#cidade").val('');
                        $("#bairro").val('');
                    }
                    else
                    {
                        $("#numero").attr('required', true);
                        $("#cep_nao_encontrado").hide();
                        $("#endereco").val(res['logradouro']);
                        $("#estado").val(res['uf']);
                        $("#cidade").val(res['localidade']);
                        $("#bairro").val(res['bairro']);
                    }
                }
            });
        });
    </script>
@endsection
