@extends('layout.master')

@section('content')
<div class="checkout__form">
        <h4>{{__('global.order')}} #{{$order->id}}</h4>

        <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>

        <form>
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="checkout__input">
                        <label for="customer_name">{{__('global.name')}} *</label>
                        <input type="text" name="customer_name" id="customer_name" required="" value="{{$order->customer_name}}" disabled="">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <label for="customer_mobile">{{__('global.phone')}} *</label>
                                <input type="text" name="customer_mobile" id="customer_mobile" required="" value="{{$order->customer_mobile}}" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <label for="customer_email">{{__('global.email')}} *</label>
                                <input type="text" name="customer_email" id="customer_email" required="" value="{{$order->customer_email}}" disabled="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="checkout__order">
                        <h4>{{__('global.your order')}}</h4>
                        <div class="checkout__order__products">{{__('global.products')}} <span>{{__('global.total')}}</span></div>
                        <ul>
                            <li>{{$product->name}} <span>${{$product->price}}</span></li>
                        </ul>
                        <div class="checkout__order__subtotal">{{__('global.subtotal')}} <span>{{$product->price}}</span></div>
                        <div class="checkout__order__total">{{__('global.total')}} <span>{{$product->price}}</span></div>

                    </div>
                </div>
            </div>
        </form>
</div>
@endsection