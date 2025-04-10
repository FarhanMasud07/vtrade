@extends('layouts.adminlayout')
@section('title','Challan')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            @can('challan.create')
                            <a class="btn btn-primary btn-sm" href="{{route('challan.create')}}"><i class="fas fa-plus"></i> New Challan</a>
                            @endcan
                        </div>
                        <h5 class="card-title text-left">All Challan</h5>
                    </div>

                </div>
                <div class="card-body table-responsive">


                    <table class="table table-bordered  table-hover mt-3" id="jq_datatables">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Challan ID</th>
                            <th>Challan Date</th>
                            <th>Delivery Date</th>
                            <th>Customer</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
@endpush

@push('js')

    <!-- Success Alert After Product  Delete -->
    @if(Session::has('delete_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Your Data has Been Deleted Successfully',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <script src="{{asset('assets/js/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
            $('#jq_datatables').DataTable({
                "order": [[1, 'desc']],
                searchDelay: 1200,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: '{!! route('challan.index') !!}',
                columns: [
                    {data:'DT_RowIndex',name:'DT_RowIndex',orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'challan_date', name: 'challan_date'},
                    {data: 'delivery_date', name: 'delivery_date'},
                    {data: 'customer', name: 'customer',},
                    {data: 'created_at', name: 'created_at',},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


    </script>

@endpush
