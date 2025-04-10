@extends('layouts.adminlayout')

@section('title', 'Product Details')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <!-- Back Button -->
            <div class="mt-3">
                <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
            </div>
            <span>Product Details for:  <b>{{ $productData->product_name }}</b></span>
            <span>Net (cash/profit): <strong id="net-cash-profit">{{ round($allProductsData->first()->total_net_profit, 2) }}</strong></span>
        </div>
        <div class="card-body">

            <!-- Net Cash Chart -->
            <div class="mt-4 mb-4">
                <canvas id="netcash-chart" style="width:100px !important; height:300px;"></canvas>
            </div>
            </div>

        <!-- <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td><strong>Date:</strong></td>
                    <td>{{ date('d-M-Y', strtotime($productData->sales_at)) }}</td>
                </tr>
                <tr>
                    <td><strong>Product Name:</strong></td>
                    <td>{{ $productData->product_name }}</td>
                </tr>
                <tr>
                    <td><strong>Unit Price:</strong></td>
                    <td>{{ round($productData->price) }}</td>
                </tr>
                <tr>
                    <td><strong>Quantity:</strong></td>
                    <td>{{ $productData->qty }}</td>
                </tr>
                <tr>
                    <td><strong>Amount:</strong></td>
                    <td>{{ round($productData->price * $productData->qty) }}</td>
                </tr>
                <tr>
                    <td><strong>Approved By:</strong></td>
                    <td>{{ $productData->approved_by ? $productData->approved_by : 'Not Approved' }}</td>
                </tr>
                <tr>
                    <td><strong>Expense for Selected Date ({{ date('d-M-Y', strtotime($productData->sales_at)) }}):</strong></td>
                    <td>
                        @if ($productData->expense_amount)
                            {{ round($productData->expense_amount) }} (Reason: {{ $productData->reasons }})
                        @else
                            No expenses for the selected date.
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><strong>Net (cash/profit) for {{ $productData->product_name }}:</strong></td>
                    <td>{{ round($productData->netcost) }}</td>
                </tr>
            </table>
        </div> -->
    </div>

    <div class="card">
        <div class="card-body">
        <h3 class="mb-4">All <b>"{{ $productData->product_name }}"</b> Sold on {{ date('d-M-Y', strtotime($productData->sales_at)) }}</h3>

        @if($allProductsData->isNotEmpty())
            <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th style="text-align:center;">Product Name</th>
                            <th style="text-align:center;">Unit Price</th>
                            <th style="text-align:center;">Quantity</th>
                            <th style="text-align:center;">Amount</th>
                            <th style="text-align:center;">Approved By</th>
                            <th style="text-align:center;">Total Expense on {{ date('d-M-Y', strtotime($productData->sales_at)) }}</th>
                            <th style="text-align:center;">Net Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allProductsData as $product)
                            <tr>
                                <td style="text-align:center;">{{ $product->product_name }}</td>
                                <td style="text-align:center;">{{ round($product->price, 2) }}</td>
                                <td style="text-align:center;">{{ $product->qty }}</td>
                                <td style="text-align:center;">{{ round($product->Amount, 2) }}</td>
                                <td class="approved-reject" style="text-align:center;">{{ $product->approved_by ? 'Approved' : 'Not Approved' }}</td>
                                <td style="text-align:center;">
                                    @if ($product->expense_amount > 0)
                                        {{ round($product->expense_amount, 2) }} 
                                    @else
                                        No expenses
                                    @endif
                                </td>
                                <td style="text-align:center;"><small>{{ round($product->Amount, 2) }} - (({{ round($product->Amount, 2) }} ÷ {{$totalSales}} )  × {{ round($product->expense_amount, 2) }})</small> = {{ round($product->net_profit, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Display Total Net Profit -->
                <div class="mt-3  float-right">
                    Total Net (Cash/Profit):  <strong>{{ round($allProductsData->first()->total_net_profit, 2) }}</strong>
                </div>
            @else
                <p>No other products were sold on this date.</p>
            @endif

        </div>
    </div>
   
    
@push('js')
<script src="{{ asset('assets/js/axios.min.js') }}"></script>
<script src="{{ asset('assets/js/chartjs.js') }}"></script>
<script>
    let baseurl = '{{ url('/') }}';
    let productId = '{{ $productData->id }}';  // Get product ID dynamically
    let type = '{{ $request->type }}'; // Chart type (bar/line)

    let apiUrl = '{{ route("report.product_details", ":id") }}'.replace(':id', productId);

// Example Axios request
axios.get(apiUrl)
    .then(function (response) {
        console.log('Response Data:', response.data);  // Log the entire response data

        if (response.data.netcash_data) {
            let netcash_data = response.data.netcash_data;
            const netcash_labels = netcash_data.netcash_month_label;
            const value = document.querySelector('#net-cash-profit').textContent
            const netcash_values = value && [Number(value)];

            let data = {
                labels: netcash_labels,
                datasets: [{
                    label: `Net Cash/Profit`,
                    backgroundColor: '#44bd32',
                    borderColor: '#4cd137',
                    data: netcash_values,
                    borderWidth: 1,
                }]
            };

            let config = {
                type: 'bar',
                data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return 'Net Cash: $' + tooltipItem.yLabel.toFixed(2);
                            }
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 10, 
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 10, // Smaller font size for X axis labels
                                autoSkip: true, // Auto skip labels if too many
                            },
                        }]
                    }
                }
            };

            new Chart(document.getElementById('netcash-chart'), config);
        } else {
            console.log('Netcash data is missing');
        }
    })
    .catch(function (error) {
        console.log('Error occurred:', error);
    });

    const approveReject = document.querySelectorAll('.approved-reject');
    approveReject && approveReject.length && approveReject.forEach(item => (
        item.textContent.trim() === 'Approved'  
        ? (item.style.setProperty('background-color', '#44bd32'), item.style.setProperty('font-weight', '600'), item.style.setProperty('color', '#fff'), item.style.setProperty('border-radius', '4px') )
        : (item.style.setProperty('background-color', 'red'), item.style.setProperty('font-weight', '600'), item.style.setProperty('color', '#fff'), item.style.setProperty('border-radius', '4px') )
    ))
        
    

</script>
@endpush

@endsection
