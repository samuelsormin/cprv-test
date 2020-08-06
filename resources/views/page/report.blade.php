@extends('layouts.app')

@section('title', 'Report')

@section('content')

<div class="container xs-container">
  <div class="row">
    <div class="wrapper">
      <h2>Report</h2>
      <div class="col-12" style="overflow-x:auto;">
        <table border="1" width="100%">
          <tr>
            <th>#</th>
            <th>Time</th>
            <th>User</th>
            <th>Product(s)</th>
            <th>Qty</th>
          </tr>
          @php $i = 1; @endphp
          @foreach($reports as $report)
            <tr>
              <td>{{ $i++ }}</td>
              <td>
                @php
                  $date=date_create($report->created_at);
                  echo date_format($date, 'd/m/Y h:i A');
                @endphp
              </td>
              <td>{{ $report->user }}</td>
              <td>
                @php
                  $products = json_decode($report->product);
                  $extractProduct = '';
                  $totalQty = 0;
                  foreach($products as $product) {
                      if($product->qty != 0) {
                        if(empty($extractProduct)) {
                          $extractProduct = $product->qty." ".$product->name;
                        } else {
                          $extractProduct .= ', '.$product->qty." ".$product->name;
                        }
                        $totalQty += $product->qty;
                      }
                  }

                  echo $extractProduct;
                @endphp
              </td>
              <td>{{ $totalQty }}</td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>

@push('scripts')
  <script>
    $('#report-menu').addClass('active');
    $('#xs-report-menu').addClass('active');
  </script>
@endpush


@endsection