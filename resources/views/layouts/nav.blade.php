<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
      <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="fw-semibold text-white tracking-wide" href="/home">
          <span class="smini-visible">
            TM<span class="opacity-75">B</span>
          </span>
          <span class="smini-hidden">
            <img src="{{ asset('media/photos/logo.png') }}" alt="LOGO" class="img-fluid" style="max-width: 150px;">

          </span>
        </a>
        <!-- END Logo -->

        <!-- Options -->
        <div>
          <!-- Toggle Sidebar Style -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
          <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
          </button>
          <!-- END Toggle Sidebar Style -->

          <!-- Dark Mode -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
            <i class="far fa-moon" id="dark-mode-toggler"></i>
          </button>
          <!-- END Dark Mode -->

          <!-- Close Sidebar, Visible only on mobile screens -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
            <i class="fa fa-times-circle"></i>
          </button>
          <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
      </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
      <!-- Side Navigation -->
      <div class="content-side">
        <ul class="nav-main">
          <li class="nav-main-item">
            <a class="nav-main-link" href="/">
              <i class="nav-main-link-icon fa fa-location-arrow"></i>
              <span class="nav-main-link-name">Dashboard</span>
              <span class="nav-main-link-badge badge rounded-pill bg-primary">8</span>
            </a>
          </li>

            @can('pode_visualizar_orcamento')
          <li class="nav-main-heading">GESTÃO</li>
          <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="nav-main-link-icon fa fa-border-all"></i>
              <span class="nav-main-link-name">Orçamento
            </span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link" href="/orcamentos">
                  <span class="nav-main-link-name">Listar orçamentos</span>
                </a>
              </li>
              @can('pode_registrar_orcamento')
            <li class="nav-main-item">
                <a class="nav-main-link" href="/buscar_linhas">
                  <span class="nav-main-link-name">Buscar linhas</span>
                </a>
              </li>
              @endcan


            </ul>
            @endcan
                    @can('pode_visualizar_clientes')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="/clientes">
                        <i class="nav-main-link-icon fa fa-users"></i>
                        <span class="nav-main-link-name">Clientes
                        </span>
                        </a>
                    @endcan
                    </li>

          </li>
          @can('pode_visualizar_cadastro_pi_venda')
            <li class="nav-main-item">
            @can('pode_registrar_cadastro_pi_venda')
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="nav-main-link-icon fa fa-boxes"></i>
              <span class="nav-main-link-name">Cadastro pi/venda
            </span>
            </a>
            @endcan
            @can('pode_visualizar_vendas')
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link" href="/listar_vendas">
                  <span class="nav-main-link-name">Listar vendas</span>
                </a>
              </li>
              @can('pode_registrar_vendas')
                <li class="nav-main-item">
                <a class="nav-main-link" href="/cadastrar_vendas">
                  <span class="nav-main-link-name">Cadastrar</span>
                </a>
              </li>
              @endcan

            </ul>
            @endcan

          </li>
          @endcan

          @can('pode_visualizar_garagem')
            <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="nav-main-link-icon fa fa-vector-square"></i>
              <span class="nav-main-link-name">Garagem
            </span>
            </a>
                    @can('pode_visualizar_empresas')
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <span class="nav-main-link-name">Empresas</span>
                </a>
                <ul class="nav-main-submenu">

                      <li class="nav-main-item">
                      <a class="nav-main-link" href="/empresas">
                        <span class="nav-main-link-name">Listar empresas</span>
                      </a>
                    </li>
                    @endcan

                    @can('pode_registrar_empresas')
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="/registar_empresa">
                        <span class="nav-main-link-name">Cadastrar empresas</span>
                      </a>
                    </li>
                    @endcan

                </ul>
              </li>
                    @can('pode_visualizar_linhas')
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <span class="nav-main-link-name">Linhas</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="/listar_linhas">
                        <span class="nav-main-link-name">Listar linhas</span>
                      </a>
                    </li>
                    @endcan


                    @can('pode_registrar_linhas')
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="/cadastrar_linhas">
                        <span class="nav-main-link-name">Cadastrar linhas</span>
                      </a>
                    </li>
                    @endcan

                </ul>
              </li>

              @can('pode_visualizar_contatos')
                <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <span class="nav-main-link-name">Contatos</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="/listar_contatos">
                        <span class="nav-main-link-name">Listar contatos</span>
                      </a>
                    </li>
              @endcan
              @can('pode_registrar_contatos')
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="/cadastrar_contatos">
                        <span class="nav-main-link-name">Cadastrar contatos</span>
                      </a>
                    </li>
              @endcan
                </ul>
              </li>
            </ul>
          </li>
          @endcan

          @can('pode_visualizar_relatorios')
  <li class="nav-main-heading">RELATÓRIOS
        </li>
          <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="nav-main-link-icon fa fa-flask"></i>
              <span class="nav-main-link-name">Relatórios
            </span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link" href="/venda_por_vendedor">
                  <span class="nav-main-link-name">Venda por vendedor
                </span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="/vendas_mensais">
                  <span class="nav-main-link-name">Vendas mensais
                </span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="/faturamento_mensal">
                  <span class="nav-main-link-name">Faturamento mensal
                </span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="/custo_mensal">
                  <span class="nav-main-link-name">Custo mensal
                </span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="/custo_por_garagem">
                  <span class="nav-main-link-name">Custo por garagem
                </span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="/custos_em_aberto_mes_colagem_ou_garagem">
                  <span class="nav-main-link-name">Custos em aberto do mês colagem ou garagem
                </span>
                </a>
              </li>
            </ul>
          </li>
          @endcan


          @can('pode_visualizar_logs')
            <li class="nav-main-heading">LOGS</li>
          <li class="nav-main-item">
            <a class="nav-main-link" href="/listar_logs">
              <i class="nav-main-link-icon fa fa-wrench"></i>
              <span class="nav-main-link-name">Listar logs</span>
            </a>
          </li>
          @endcan

        </ul>
      </div>
      <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
  </nav>
