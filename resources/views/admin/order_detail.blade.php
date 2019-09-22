@extends('master')
@section('content')
    <div align = 'left'>
        <p> <b>Mã đon hàng</b>: {{$order->id}} </p>
        <p> <b> Họ tên khách hàng</b>: {{$order->name}} </p>
        <p> <b> Email: </b>: {{$order->email}} </p>
        <p> <b> Số điện thoại: </b>: {{$order->contact_number}} </p>
        <p> <b> Địa chỉ: </b>: {{$order->address}} </p>
        <p> <b>Danh sách sản phẩm: </b> </p>
    </div>
        <table align='center' border='1'>
        <thead>
            <tr align='center'>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        <thead>

        <tbody>
        @php
            foreach($products as $product){
        @endphp
            <tr >
                    <td align='center'>{{$product->id}}</td>
                    <td align='center'>{{$product->product_name}}</td>
                    <td align='center'>{{$product->pivot->quantity}}</td>
                    <td align='center'>{{$product->pivot->total}}</td>
                <tr>
        @php
            }
        @endphp
        </tbody>
    </table>
@endsection