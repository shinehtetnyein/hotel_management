@extends('admin.layout')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h4 class="card-title mt-5 text-center text-light">Register User</h4>
                        <h4 class="card-title mt-5 text-center text-light">{{ $users }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-dark">
                    <div class="card-body ">
                        <h4 class="card-title mt-5 text-center text-light">Pending<h4>
                                <h4 class="card-title mt-5 text-center text-light">{{ $pendings }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-dark">
                    <div class="card-body ">
                        <h4 class="card-title mt-5 text-center text-light">Check In</h4>
                        <h4 class="card-title mt-5 text-center text-light">{{ $check_in }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-dark">
                    <div class="card-body ">
                        <h4 class="card-title mt-5 text-center text-light">Check Out</h4>
                        <h4 class="card-title mt-5 text-center text-light">{{ $check_out }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="w-50 m-5 card p-3">
            <h1 class="m-5">Check In</h1>
            <canvas id="checkIn"></canvas>
        </div>

        <div class="w-50 m-5 card p-3">
            <h1 class="m-5">Check Out</h1>
            <canvas id="checkOut"></canvas>
        </div>
        {{-- chart library --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('checkIn').getContext('2d');
            var ordersChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: @json($checkInDays),
                    datasets: [{
                        label: 'Total Check In',
                        data: @json($checkIn_totals),
                        backgroundColor: ['red', 'blue', 'purple', 'blue', 'green', ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
                }

            });
            var ctx1 = document.getElementById('checkOut').getContext('2d');
            var ordersChart = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: @json($checkOutDays),
                    datasets: [{
                        label: 'Total Check Out',
                        data: @json($checkOut_totals),
                        backgroundColor: ['red', 'blue', 'purple', 'blue', 'green', ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
                }

            });
        </script>

    </div>
@endsection
