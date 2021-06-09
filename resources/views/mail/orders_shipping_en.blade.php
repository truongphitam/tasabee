@extends('mail.master')
@section('content')
<tr>
    <td bgcolor="#ffffff">
        <p>Dear: {{ $order && $order->customer ? $order->customer->name : '' }}</p>
        <p>Your order {{ $order->auto_code }} has been prepared and has left the factory. Here is some information regarding the shipment’s trip.</p>
        <p>Invoice number: {{ $order->invoice_number }}</p>
        <p>PKL number {{ $order->packing_list }}</p>
        <p>Bill number: {{ $order->bill_number }}</p>
        <p>Terms: {{ $order->customs_declaration }}</p>
        <p>Port of loading: {{ $order->port_of_loading }}</p>
        <p>ETD: {{ $order->etd }}</p>
        <p>Port of discharge: {{ $order->port_of_discharge }}</p>
        <p>ETA: {{ $order->eta }}</p>
        <p>Vessel No: {{ $order->train_number }}</p>
        <p>Containers Numbers: {{ $order->number_of_containers }}</p>
        <p>Place of delivery: {{ $order->place_of_delivery }}</p>
        <p>You can track your orders and access to related data files by logging into your account on our home page.</p>
        <p>Please visit the following link:</p>
        <p>Thank you very much</p>
        <p>Team Tasabee</p>
        <p>If we can be of assistance, please do not hesitate to contact our sales staff: {{ $order && $order->staff ? $order->staff->email : '' }}</p>
    </td>
</tr>
@endsection