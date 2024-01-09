@extends('layouts.app')

@section('content')

<main id="main-container">
    <!-- Page Content -->
    <div class="content">
      <!-- Quick Overview -->
      <div class="row items-push">
        <div class="col-6 col-lg-3">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="be_pages_ecom_orders.html">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold text-primary mb-1">78</div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Ordens Pendentes
              </p>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold text-success mb-1">26%</div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Profit
              </p>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold mb-1">126</div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Ordens de Hoje
              </p>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold mb-1">$16.485</div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Ganhos de Hoje
              </p>
            </div>
          </a>
        </div>
      </div>
      <!-- END Quick Overview -->



      <!-- Top Products and Latest Orders -->
      <div class="row">
        <div class="col-xl-6">
          <!-- Top Products -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Top Products</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <table class="table table-borderless table-striped table-vcenter fs-sm">
                <tbody>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.965</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">Diablo III</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.154</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">Control</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.523</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">Minecraft</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.423</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">Hollow Knight</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.391</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">Sekiro: Shadows Die Twice</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.218</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">NBA 2K20</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.995</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">Forza Motorsport 7</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.761</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">Minecraft</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.860</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">Dark Souls III</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" style="width: 100px;">
                      <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.952</a>
                    </td>
                    <td>
                      <a class="fw-medium" href="be_pages_ecom_product_edit.html">Age of Mythology</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-end text-nowrap">
                      <div class="text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- END Top Products -->
        </div>
        <div class="col-xl-6">
          <!-- Latest Orders -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Latest Orders</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <table class="table table-borderless table-striped table-vcenter fs-sm">
                <tbody>
                  <tr>
                    <td class="fw-semibold text-center" style="width: 100px;">
                      <a href="be_pages_ecom_order.html">ORD.7116</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">Jose Parker</a>
                    </td>
                    <td>
                      <span class="badge bg-success">Delivered</span>
                    </td>
                    <td class="fw-semibold text-end">$172,00</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-center">
                      <a href="be_pages_ecom_order.html">ORD.7115</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">David Fuller</a>
                    </td>
                    <td>
                      <span class="badge bg-danger">Canceled</span>
                    </td>
                    <td class="fw-semibold text-end">$704,00</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-center">
                      <a href="be_pages_ecom_order.html">ORD.7114</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">Thomas Riley</a>
                    </td>
                    <td>
                      <span class="badge bg-success">Delivered</span>
                    </td>
                    <td class="fw-semibold text-end">$688,00</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-center">
                      <a href="be_pages_ecom_order.html">ORD.7113</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">Lori Moore</a>
                    </td>
                    <td>
                      <span class="badge bg-warning">Processing</span>
                    </td>
                    <td class="fw-semibold text-end">$354,00</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-center">
                      <a href="be_pages_ecom_order.html">ORD.7112</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">Jack Estrada</a>
                    </td>
                    <td>
                      <span class="badge bg-success">Delivered</span>
                    </td>
                    <td class="fw-semibold text-end">$168,00</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-center">
                      <a href="be_pages_ecom_order.html">ORD.7111</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">Helen Jacobs</a>
                    </td>
                    <td>
                      <span class="badge bg-warning">Processing</span>
                    </td>
                    <td class="fw-semibold text-end">$501,00</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-center">
                      <a href="be_pages_ecom_order.html">ORD.7110</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">Jose Mills</a>
                    </td>
                    <td>
                      <span class="badge bg-success">Delivered</span>
                    </td>
                    <td class="fw-semibold text-end">$312,00</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-center">
                      <a href="be_pages_ecom_order.html">ORD.7109</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">Melissa Rice</a>
                    </td>
                    <td>
                      <span class="badge bg-warning">Processing</span>
                    </td>
                    <td class="fw-semibold text-end">$228,00</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-center">
                      <a href="be_pages_ecom_order.html">ORD.7108</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">Jose Parker</a>
                    </td>
                    <td>
                      <span class="badge bg-success">Delivered</span>
                    </td>
                    <td class="fw-semibold text-end">$325,00</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-center">
                      <a href="be_pages_ecom_order.html">ORD.7107</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <a class="fw-medium" href="be_pages_ecom_customer.html">Wayne Garcia</a>
                    </td>
                    <td>
                      <span class="badge bg-danger">Canceled</span>
                    </td>
                    <td class="fw-semibold text-end">$792,00</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- END Latest Orders -->
        </div>
      </div>
      <!-- END Top Products and Latest Orders -->
    </div>
    <!-- END Page Content -->
  </main>

  @endsection
