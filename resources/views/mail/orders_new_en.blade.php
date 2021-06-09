@extends('mail.master')
@section('content') 
<tr>
    <td bgcolor="#ffffff">
        <p>Dear: {{ $order && $order->customer ? $order->customer->name : '' }}</p>
        <p>First, we thank you for the trust and cooperation you have given us.</p>
        <p>According to what is agreed in the contract [contract number], your order has been established and is being processed. We will complete and send it out as soon as possible.</p>
        <p>An account has been created so that you can track your order and its related documents.</p>
        <p>Please visit the following link: <a href="{{ route('index')}} " target="_blank">{{ env('APP_NAME') }}</a>
        <p>Thank you very much</p>
        <p>Team Tasabee</p>
        <p>If we can be of assistance, please do not hesitate to contact our sales staff: {{ $order && $order->staff ? $order->staff->email : '' }}</p>
    </td>
</tr>  
@endsection