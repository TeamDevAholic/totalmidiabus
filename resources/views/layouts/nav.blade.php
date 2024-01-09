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
            <a class="nav-main-link" href="be_pages_dashboard.html">
              <i class="nav-main-link-icon fa fa-location-arrow"></i>
              <span class="nav-main-link-name">Dashboard</span>
              <span class="nav-main-link-badge badge rounded-pill bg-primary">8</span>
            </a>
          </li>

          <li class="nav-main-heading">GESTÃO</li>
          <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="nav-main-link-icon fa fa-border-all"></i>
              <span class="nav-main-link-name">Orçamento
            </span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link" href="/listar_orcamento">
                  <span class="nav-main-link-name">Listar orçamentos</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="/buscar_linhas">
                  <span class="nav-main-link-name">Buscar linhas</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="nav-main-link-icon fa fa-boxes"></i>
              <span class="nav-main-link-name">Cadastro pi/venda
            </span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link" href="/listar_vendas">
                  <span class="nav-main-link-name">Listar vendas</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="/cadastrar_vendas">
                  <span class="nav-main-link-name">Cadastrar</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="nav-main-link-icon fa fa-vector-square"></i>
              <span class="nav-main-link-name">Garagem
            </span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <span class="nav-main-link-name">Empresas</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="/listar_empresas_logomarca">
                        <span class="nav-main-link-name">Listar empresas logomarca</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="/cadastrar_empresas_logomarca">
                        <span class="nav-main-link-name">Cadastrar empresas logomarca</span>
                      </a>
                    </li>
                </ul>
              </li>
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
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="/cadastrar_linhas">
                        <span class="nav-main-link-name">Cadastrar linhas</span>
                      </a>
                    </li>
                </ul>
              </li>
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
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="/cadastrar_contatos">
                        <span class="nav-main-link-name">Cadastrar contatos</span>
                      </a>
                    </li>
                </ul>
              </li>


            </ul>
          </li>
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
          <li class="nav-main-heading">LOGS</li>
          <li class="nav-main-item">
            <a class="nav-main-link" href="/listar_logs">
              <i class="nav-main-link-icon fa fa-wrench"></i>
              <span class="nav-main-link-name">Listar logs</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
  </nav>