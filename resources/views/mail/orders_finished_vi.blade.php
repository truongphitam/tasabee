@extends('mail.master')
@section('content') 
<tr>
    <td bgcolor="#ffffff">
        <p>Kính gửi: {{ $order && $order->customer ? $order->customer->name : '' }}</p>
        <p>Theo như hợp đồng đã được thỏa thuận, Đơn hàng {{ $order->invoice_number }} đã được bàn giao cho quý cty tại {{ $order->place_of_delivery }}</p>
        <p>Chúng tôi mong quý vị hài lòng về sản phẩm. Rất mong được làm việc với quý cty trong thời gian tới.</p>
        <p>Quý cty có thể theo dõi đơn hàng và truy cập vào các file dữ liệu liên quan bằng cách đăng nhập vào tài khoản của quý vị trên trang chủ cty chúng tôi. </p>
        <p>Làm ơn truy cập theo đường link sau đây: </p>
        <p>Chân thành cảm ơn</p>
        <p>Team Tasabee</p>
        <p>Nếu có vấn đề về chất lượng sản phẩm hay có những câu hỏi khác, xin hãy gửi phản hồi cho nhân viên kinh doanh của chúng tôi: {{ $order && $order->staff ? $order->staff->email : '' }}</p>
    </td>
</tr>  
@endsection