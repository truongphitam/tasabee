@extends('mail.master')
@section('content') 
<tr>
    <td bgcolor="#ffffff">
        <p>Kính gửi: {{ $order && $order->customer ? $order->customer->name : '' }}</p>
        <p>Đầu tiên, chúng tôi cảm ơn vì sự tin tưởng và sự hợp tác mà quý công ty đã trao cho chúng tôi. </p>
        </p>Theo như những gì đã thỏa thuận trong hợp đồng [số hợp đồng ], đơn hàng của quý công ty đã được thiết lập và đang được xử lý. Chúng tôi sẽ hoàn thành và gửi nó đi trong thời gian sớm nhất có thể. </p>
        <p>Một tài khoản đã được lập ra để quý cty có thể theo dõi đơn hàng và các tài liệu liên quan đến nó. </p>
        <p>Làm ơn truy cập theo đường link sau đây: <a href="{{ route('index')}} " target="_blank">{{ env('APP_NAME') }}</a>
        <p>Chân thành cảm ơn</p>
        <p>Team Tasabee</p>
        <p>Nếu có yêu cầu hay thắc mắc nào thêm, xin hãy email cho nhân viên kinh doanh của chúng tôi: {{ $order && $order->staff ? $order->staff->email : '' }}</p>
    </td>
</tr>  
@endsection