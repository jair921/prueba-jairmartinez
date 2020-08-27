@extends('layout.master')

@section('content')
<div class="row featured__filter">
    @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="{{asset($product->image)}}">
                    <ul class="featured__item__pic__hover">
                        <li>
                            <a href="#" title="">
                                <i class="fa fa-shopping-cart" title=""></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="#">{{$product->name}}</a></h6>
                    <h5>$ {{$product->price}}</h5>
                </div>
            </div>
        </div>
    @endforeach
    {{$products->links()}}
</div>
@endsection