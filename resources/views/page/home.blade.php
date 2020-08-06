@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container">
  <form method="POST" action="{{ route('storeReport') }}">
    @csrf
    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{!! $message !!}</p>
      </div>
    @endif
    <div class="row">
      <div class="col-3 box">
        <img src="https://cf.shopee.co.id/file/a598dd16be2f7f91a5001b63c3ed73b4" alt="Action Figure" />
        <div class="details">
          <p class="title">Action Figure Luffy</p>
          <input type="hidden" name="product[0]" value="Action Figure Luffy">
          <div class="counter-wrapper">
            <button type="button" class="down_count1"><i class="ti-minus"></i></button>
            <input class="counter" type="number" name="qty[0]" value="0">
            <button type="button" class="up_count1"><i class="ti-plus"></i></button>
          </div>
        </div>
      </div>
      <div class="col-3 box">
        <img src="https://www.thesayanime.com/wp-content/uploads/2019/11/zoro-from-one-piece.jpg" alt="Action Figure" />
        <div class="details">
          <p class="title">Action Figure Zoro</p>
          <input type="hidden" name="product[1]" value="Action Figure Zoro">
          <div class="counter-wrapper">
            <button type="button" class="down_count2"><i class="ti-minus"></i></button>
            <input class="counter2" type="number" name="qty[1]" value="0">
            <button type="button" class="up_count2"><i class="ti-plus"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="spacer"></div>
    <div class="row xs-row">
      <div class="col-2 col-xs-6">
        <button type="submit" class="btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

@push('scripts')
  <script>
    $(document).ready(function(){
      $('button').click(function(e){
          var button_classes, product1Value = +$('.counter').val(), product2Value = +$('.counter2').val();
          button_classes = $(e.currentTarget).prop('class');        
          if(button_classes.indexOf('up_count1') !== -1){
              product1Value = (product1Value) + 1;            
          } else if (button_classes.indexOf('down_count1') !== -1){
              product1Value = (product1Value) - 1;            
          } else if (button_classes.indexOf('up_count2') !== -1){
              product2Value = (product2Value) + 1;     
          } else if (button_classes.indexOf('down_count2') !== -1){
              product2Value = (product2Value) - 1;            
          }
          product1Value = product1Value < 0 ? 0 : product1Value;
          product2Value = product2Value < 0 ? 0 : product2Value;
          $('.counter').val(product1Value);
          $('.counter2').val(product2Value);
          
      });
    });
  </script>
@endpush

@endsection