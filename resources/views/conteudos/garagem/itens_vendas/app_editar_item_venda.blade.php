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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Item de venda</h1>
              </div>
            </div>
          </div>
          <!-- END Hero -->

          <!-- Page Content -->
          <div class="content">
          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Editar Item</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">

                    <div class="row">
                        <div class="col-lg-8 space-y-2">

                            <!-- Form Inline - Alternative Style -->
                            

                            <!-- END Form Inline - Alternative Style -->
                        </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
          </div>
      </main>

          <!-- END Info -->


@endsection
