
@if($orders)
    @foreach ($orders as $post)
        <tr>
            <td>
                <a href="{{ route('orders.show', $post->id) }}">
                    {{ $post->auto_code }}
                </a>
            </td>
            <td>{{ $post->customer ? $post->customer->name : '' }}</td>
            <td>{{ $post->staff ? $post->staff->name : '' }}</td>
            <td>{{ $post->invoice_number }}</td>
            <td>{{ $post->packing_list }}</td>
            <td>{{ $post->bill_number }}</td>
            <td>{{ convertToDMY($post->invoice_date) }}</td>
            <td>{{ $post->debt_term_date }}</td>
            <td>{{ convertToDMY($post->debt_due_date) }}</td>
            <td>{{ show_title_status_orders($post->status_orders) }}</td>
        </tr>
    @endforeach
@endif