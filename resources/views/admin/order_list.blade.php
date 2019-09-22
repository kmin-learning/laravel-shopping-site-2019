@extends('master')

@section('content')
    <table align='center' border='1'>
        <thead>
            <tr align='center'>
                <th>Mã đơn hàng</th>
                <th>Họ tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
            </tr>
        <thead>

        <tbody>
        @php
            foreach($orders as $order){
                echo "<tr >
                    <td>$order->id</td>
                    <td>$order->name</td>
                    <td>$order->email</td>
                    <td>$order->contact_number</td>
                    <td>$order->address</td>
                    <td><a href='order_detail/$order->id'>Chi tiết<td>
                <tr>
                ";
            }
        @endphp
        </tbody>
    </table>
@endsection