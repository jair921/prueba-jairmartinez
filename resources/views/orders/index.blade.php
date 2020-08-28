@extends('layout.master')

@section('content')
 <div class="checkout__form">
                <h4>{{__('global.new order')}}</h4>
                
                @if (Session::has('message'))

                    <div class="alert alert-{{Session::get('alert-type')}} alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ Session::get('message') }}</strong>

                    </div>

                @endif
                
    <form  method="post">
        @csrf
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="checkout__input">
                    <label for="customer_name">{{__('global.name')}} *</label>
                    <input type="text" name="customer_name" id="customer_name" required="">
                    @error('customer_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <label for="customer_mobile">{{__('global.phone')}} *</label>
                            <input type="text" name="customer_mobile" id="customer_mobile" required="">
                            @error('customer_mobile')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <label for="customer_email">{{__('global.email')}} *</label>
                            <input type="text" name="customer_email" id="customer_email" required="">
                            @error('customer_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror                                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="checkout__order">
                    @error('product')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <h4>{{__('global.your order')}}</h4>
                    <div class="checkout__order__products">{{__('global.products')}} <span>{{__('global.total')}}</span></div>
                    <ul>
                        <li>{{$product->name}} <span>${{$product->price}}</span></li>
                    </ul>
                    <div class="checkout__order__subtotal">{{__('global.subtotal')}} <span>{{$product->price}}</span></div>
                    <div class="checkout__order__total">{{__('global.total')}} <span>{{$product->price}}</span></div>

                    <button type="submit" class="site-btn">{{__('global.place order')}}</button>
                    <input type="hidden" name="product" value="{{$product->id}}">
                    <input type="hidden" name="method" value="placetopay">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection