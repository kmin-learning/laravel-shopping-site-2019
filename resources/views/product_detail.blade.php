@extends('master')

@section('content')
<div class="container bg-light mt-4 pt-2">
    <div class="row">
        <div class="col-md-3 mt-2">
            <img src={{asset('Images/'.$product_detail->product_image)}}  width ="280px" height="280px" class="img-fluid">
        </div>
        <div class="col-md-9">
            <h2>{{$product_detail->product_name}}</h2>
            <div class="information">
                <span>{{$product_detail->author_name}}</span>
                <span>&ensp;{{$product_detail->cover_type}}&emsp;</span>
                <span>&emsp;SKU:{{$product_detail->product_signal}}</span>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td colspan="2">{{$product_detail->product_price}}&emsp;<span style="text-decoration:line-through">$300.00</span></td>
                    </tr>
                    <tr>
                        <td width=40%>
                            So luong:
                            <div btn-group>
                                <button type="button" id="increase">+</button>
                                <input type="text" id="quanity" value="0" style="width:30px; text-align:center">
                                <button type="button" id="decrease">-</button>
                            </div>
                        </td>
                        <td width=60%>
                            <button class="btn btn-danger" style="width:350px;text-transform:uppercase">
                                <span><i class="fas fa-shopping-cart"></i>&emsp;chon mua</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td colspan="2"><hr><h6 style="text-transform:uppercase">thoi gian giao hang du kien</h6></td>
                    </tr>
                    <tr>
                        <td width=5%>
                            <i class="fas fa-angle-double-right"></i>
                        </td>
                        <td width=95%>
                            <span> Bạn muốn nhận hàng trước 10h00 sáng ngày mai (24/08)?
                                    Đặt hàng trong 11 giờ tới
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fas fa-truck"></i>
                        </td>
                        <td>
                            <span>
                                Giao hàng tiêu chuẩn Dự kiến giao Chủ nhật - Thứ hai, 25/08 - 26/08 chi phí 12.000 ₫, miễn phí giao hàng tiêu chuẩn cho đơn hàng từ 250.000 đ
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container bg-light mt-4 pb-2 pt-2">
    <h4 style="text-transform:uppercase">thong tin chi tiet</h4>
    <table class="table table-bordered">
        <tr>
            <td width=20%><span>Tác giả</span></td>
            <td width=80%><span>{{$product_detail->author_name}}</span></td>
        </tr>
        <tr>
            <td><span>Ngày xuất bản</span></td>
            <td><span>{{$product_detail->release_date}}</span></td>
        </tr>
        <tr>
            <td><span>Kích thước</span></td>
            <td><span>{{$product_detail->size}} cm </span></td>
        </tr>
        <tr>
            <td><span>Nhà xuất bản</span></td>
            <td><span>{{$product_detail->company_name}}</span></td>
        </tr>
        <tr>
            <td><span>Dịch Giả</span></td>
            <td><span>{{$product_detail->translator_name}}</span></td>
        </tr>
    </table>
</div>
<div class="container bg-light mt-4 pb-1 pt-2">
    <h4 style="text-transform:uppercase">gioi thieu sach</h4>
    <p class="introduce-book" style="text-align:justify">{{$product_detail->introduction}}</p>
</div>
@endsection