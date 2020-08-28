@extends('layout.master')

@section('content')
<div class="checkout__form">
    <h4>{{__('global.list orders')}}</h4>
    
    <table class="table table-bordered">
        <thead>
            <th>{{__('global.number order')}}</th>
            <th>{{__('global.date')}}</th>
            <th>{{__('global.products')}}</th>
            <th>{{__('global.status')}}</th>
            <th>{{__('global.actions')}}</th>
        </thead>
        <tbody>
            @if($orders)
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                    <td>{{$order->firstProduct()->name}}</td>
                    <td>{{\App\Status::$status[$order->status]}}</td>
                    <td>
                        <a class="btn btn-primary" title="{{__('global.view')}}" href="{{route('order.show', [$order->id])}}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a>
                        @if($order->status == \App\Status::$PENDING)
                            <a class="btn btn-warning" href="{{$order->transaction_url}}" title="{{__('global.retry')}}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.146 7.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 11l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
                                    <path fill-rule="evenodd" d="M2 11a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 11zm3.854-9.354a.5.5 0 0 1 0 .708L3.207 5l2.647 2.646a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M2.5 5a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </a>
                        @endif
                        @if($order->status == \App\Status::$REJECTED)
                            <a class="btn btn-warning" href="{{route('order.retry', [$order->id])}}" title="{{__('global.retry')}}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.146 7.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 11l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
                                    <path fill-rule="evenodd" d="M2 11a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 11zm3.854-9.354a.5.5 0 0 1 0 .708L3.207 5l2.647 2.646a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M2.5 5a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            @else
                <tr style="text-align: center;">
                    <td colspan="5">{{__('global.no result')}}</td>
                </tr>
            @endif
        </tbody>
    </table>
    @if($orders)
    {{$orders->links()}}
    @endif
</div>
@endsection