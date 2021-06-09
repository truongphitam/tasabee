@extends('mail.master')
@section('content') 
<tr>
    <td bgcolor="#ffffff">
        <p>Dear: {{ $order && $order->customer ? $order->customer->name : '' }}</p>
        <p>According to the agreed contract, the Order {{ $order->invoice_number }} has been handed over to you at {{ $order->place_of_delivery }}</p>
        <p>We hope you are satisfied with the product. Looking forward to working with you in the near future.</p>
        <p>You can track your orders and access to related data files by logging into your account on our home page.</p>
        <p>Please visit the following link:</p>
        <p>Thank you very much</p>
        <p>Team Tasabee</p>
        <p>If we can be of assistance, please do not hesitate to contact our sales staff: {{ $order && $order->staff ? $order->staff->email : '' }}</p>
    </td>
</tr>  
@endsection