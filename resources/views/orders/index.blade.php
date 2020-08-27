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
                
                
            </div>
@endsection