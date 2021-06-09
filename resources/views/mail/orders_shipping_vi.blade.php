@extends('mail.master')
@section('content') 
<tr>
    <td bgcolor="#ffffff">
        <p>Kính gửi: {{ $order && $order->customer ? $order->customer->name : '' }}</p>
        <p>Đơn hàng {{ $order->auto_code }} của quý khách đã được chuẩn bị xong và đã rời xưởng. Đây là 1 vài thông tin liên quan đến chuyến đi lô hàng</p>
        <p>No Invoice: {{ $order->invoice_number }}</p>
        <p>No PKL {{ $order->packing_list }}</p>
        <p>Số bill : {{ $order->bill_number }}</p>
        <p>Terms: {{ $order->customs_declaration }}</p>
        <p>Cảng đi: {{ $order->port_of_loading }}</p>
        <p>Giờ đi dự kiến: {{ $order->etd }}</p>
        <p>Cảng đến: {{ $order->port_of_discharge }}</p>
        <p>Giờ đến dự kiến: {{ $order->eta }}</p>
        <p>Số hiệu tàu: {{ $order->train_number }} </p>
        <p>Container: {{ $order->number_of_containers }}</p>
        <p>Địa điểm giao hàng: {{ $order->place_of_delivery }}</p>
        <p>Quý cty có thể theo dõi đơn hàng và truy cập vào các file dữ liệu liên quan bằng cách đăng nhập vào tài khoản của quý vị trên trang chủ cty chúng tôi. </p>
        <p>Làm ơn truy cập theo đường link sau đây: </p>
        <p>Chân thành cảm ơn</p>
        <p>Team Tasabee</p>
        <p>Nếu có yêu cầu hay thắc mắc nào thêm, xin hãy email cho nhân viên kinh doanh của chúng tôi: {{ $order && $order->staff ? $order->staff->email : '' }}</p>
    </td>
</tr>  
@endsection