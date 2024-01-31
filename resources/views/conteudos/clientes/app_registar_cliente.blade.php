@extends('layouts.app')

@section('content')

      <!-- Main Container -->
      <main id="main-container">
        <center>
          @if (session('erro'))
          {{-- expr --}}
          <div class="alert alert-danger" role="alert">
            {{session('erro')}}
          </div>
          @endif
        </center>
                <!-- Hero -->
                <div class="bg-body-light">
                  <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Novo Cliente</h1>

                    </div>
                  </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


          <!-- Info -->
          <div class="block block-rounded">

            <div class="block-header block-header-default">
                <a class="btn  btn-hero btn-primary my-2" href="/clientes" style="margin-right: 10px;">
                  <i class="fa fa-reply" aria-hidden="true"></i>
                  <span class="d-sm-inline ms-1"></span>
                </a>
              <h3 class="block-title">Registar Novo Cliente</h3>
            </div>

            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                  <form action="/salvar_cliente" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 col-5 inline-block">
                      <label class="form-label" for="dm-ecom-product-name">Nome do Cliente</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" required name="nome" value="">
                    </div>
                    <div class="mb-4 col-5 inline-block">
                        <label class="form-label" for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" id="cnpj" required name="cnpj" value="{{$cliente->cnpj ?? ''}}" maxLength="14" onkeypress="formatarCPF(event)" autocomplete="off" maxlength="14 ">
                        </div>
                        <div class="mb-4 col-5 inline-block">
                          <label class="form-label" for="dm-ecom-product-name">Data de Nascimento</label>
                          <input type="date" class="form-control" id="dm-ecom-product-name" required name="data_nascimento" value="{{$cliente->data_nascimento ?? ''}}">
                        </div>
                        <div class="mb-4 col-5 inline-block">
                          <label class="form-label" for="dm-ecom-product-name">Email</label>
                          <input type="text" class="form-control" id="dm-ecom-product-name" required name="email" value="{{$cliente->email ?? ''}}">
                        </div>
                        <div class="mb-4 col-5 inline-block">
                          <label class="form-label" for="dm-ecom-product-name">Whatsapp</label>
                          <input type="text" class="form-control" id="dm-ecom-product-name" required name="whatsapp" value="{{$cliente->whatsapp ?? ''}}">
                        </div>
                        <div class="mb-4 col-5 inline-block cep">
                        <label class="form-label" for="dm-ecom-product-name">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" value="{{$cliente->cep ?? ''}}" size="10" maxlength="9" onblur="pesquisacep(this.value);" required>
                        </div>

                        <div class="mb-4 col-5 inline-block rua">
                            <label class="form-label" for="dm-ecom-product-name">Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua" value="{{$cliente->rua ?? ''}}" required>
                        </div>

                        <div class="mb-4 col-5 inline-block Bairro">
                            <label class="form-label" for="dm-ecom-product-name">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="{{$cliente->bairro ?? ''}}" required>
                        </div>

                        <div class="mb-4 col-5 inline-block Cidade">
                            <label class="form-label" for="dm-ecom-product-name">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" value="{{$cliente->cidade ?? ''}}" required>
                        </div>

                        <div class="mb-4 col-5 inline-block estado">
                            <label class="form-label" for="dm-ecom-product-name">Estado</label>
                            <input type="text" class="form-control" id="uf" name="uf" value="{{$cliente->uf ?? ''}}" required>
                        </div>

                        <div class="mb-4 col-5 inline-block numero">
                        <label class="form-label" for="dm-ecom-product-name">Número</label>
                        <input type="text" class="form-control" id="dm-ecom-product-name" name="numero" value="{{$cliente->numero ?? ''}}">
                        </div>

                        <div class="mb-4 col-5 inline-block complemento">
                            <label class="form-label" for="dm-ecom-product-name">Complemento</label>
                            <input type="text" class="form-control" id="dm-ecom-product-name" name="complemento" value="{{$cliente->complemento ?? ''}}">
                        </div>

                    <div class="mb-4">
                      <button type="submit" class="btn btn-primary">Salvar Cliente</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->




<script>
    function formatarCPF(event) {
       //cpf
      const cpfInput = document.querySelector("#cpf");

      cpfInput.addEventListener("input", function(event) {
      let x = event.target.value.replace(/\D/g, "");
      let y = x.slice(0, 3) + "." + x.slice(3, 6) + "." + x.slice(6, 9) + "-" + x.slice(10);

      if (x.length > 11) {
          event.target.value = y;
      }
      });
    }



    function calcularDigito(cpf, posicao1, posicao2) {
      let soma = 0;
      let peso = 10;

      for (let i = 0; i < posicao1; i++) {
        soma += parseInt(cpf.charAt(i)) * peso;
        peso--;
      }

      const resto = soma % 11;
      const digito = resto < 2 ? 0 : 11 - resto;

      return digito.toString();
    }
  </script>

  <script>

  function limpa_formulário_cep() {
              //Limpa valores do formulário de cep.
              document.getElementById('rua').value=("");
              document.getElementById('bairro').value=("");
              document.getElementById('cidade').value=("");
              document.getElementById('uf').value=("");
      }

  function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          document.getElementById('rua').value=(conteudo.logradouro);
          document.getElementById('bairro').value=(conteudo.bairro);
          document.getElementById('cidade').value=(conteudo.localidade);
          document.getElementById('uf').value=(conteudo.uf);
      } //end if.
      else {
          //CEP não Encontrado.
          limpa_formulário_cep();
          alert("CEP não encontrado.");
      }
  }

  function pesquisacep(valor) {

  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, '');

  //Verifica se campo cep possui valor informado.
  if (cep != "") {

      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;

      //Valida o formato do CEP.
      if(validacep.test(cep)) {

          //Preenche os campos com "..." enquanto consulta webservice.
          document.getElementById('rua').value="...";
          document.getElementById('bairro').value="...";
          document.getElementById('cidade').value="...";
          document.getElementById('uf').value="...";

          //Cria um elemento javascript.
          var script = document.createElement('script');

          //Sincroniza com o callback.
          script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

          //Insere script no documento e carrega o conteúdo.
          document.body.appendChild(script);

      } //end if.
      else {
          //cep é inválido.
          limpa_formulário_cep();
          alert("Formato de CEP inválido.");
      }
  } //end if.
  else {
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
  }
  };

  </script>


@endsection
