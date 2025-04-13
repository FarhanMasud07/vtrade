@extends('layouts.adminlayout')

@section('title', 'Customer Details')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <!-- Back Button -->
            <div class="mt-3">
                <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
            </div>
            <span>Customer Details for: <b>{{ $userName }}</b></span>
            <span>Balance: <strong id="balance">{{ round($balance, 2) }}</strong></span>
        </div>
        <div class="card-body" style="display:flex; width:100%; gap:26px">

            <!-- Customer Info Table -->
            <div class="customer-info" style="width:50%;">
                <h3>Customer: {{ $userName }}</h3>
                <table class="table table-bordered mt-4">
                    <tr>
                        <td><strong>Date:</strong></td>
                        <td>{{ $date }}</td>
                    </tr>
                    <tr>
                        <td><strong>Bill ID:</strong></td>
                        <td>{{ $id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Particular:</strong></td>
                        <td>{{ $particular }}</td>
                    </tr>
                    <tr>
                        <td><strong>Debit:</strong></td>
                        <td>{{ round($debit, 2) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Credit:</strong></td>
                        <td>{{ round($credit, 2) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Discount:</strong></td>
                        <td>{{ round($discount, 2) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Balance:</strong></td>
                        <td>{{ round($balance, 2) }}</td>
                    </tr>
                </table>
            </div>

            <!-- Charts Section -->
            <div class="charts-section" style="width:50%; display: flex; gap: 30px;">
                
                <!-- Balance Chart -->
                <div class="mt-4 mb-4" style="width: 100%;">
                    <canvas id="balance-chart" style="width:100% !important; height:300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/js/chartjs.js') }}"></script>
    <script>
        // Mock Data - Replace this with the data from the controller
        let balance = {{ round($balance, 2) }};
        let date = '{{ $date }}';

        // Set graph color based on balance
        let chartColor = balance < 0 ? 'red' : '#2ecc71';

        // Prepare chart data for Balance
        const balanceChartData = {
            labels: [date],  // Show the date below the graph
            datasets: [{
                label: 'Balance',
                backgroundColor: [chartColor],
                data: [balance],
                borderWidth: 1
            }]
        };

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                callbacks: {
                    label: function (tooltipItem) {
                        return tooltipItem.dataset.label + ': ' + tooltipItem.yLabel.toFixed(2);
                    }
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontSize: 10
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontSize: 12,
                        autoSkip: true,
                        fontWeight: 'bold',  // Make the date bold
                    }
                }]
            }
        };

        // Create Balance chart
        new Chart(document.getElementById('balance-chart'), {
            type: 'bar',
            data: balanceChartData,
            options: chartOptions
        });
    </script>
    @endpush
@endsection
