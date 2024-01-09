@extends('layouts.sidebar')

@section('content')

<div id="page-container" class="page-header-dark main-content-boxed">

    <!-- Header -->
   @include('layouts.header2')
    <!-- END Header -->

    <!-- Main Container -->
  @include('layouts.main2')
    <!-- END Main Container -->

    <!-- Footer -->
  @include('layouts.footer2')
    <!-- END Footer -->
  </div>

@endsection

