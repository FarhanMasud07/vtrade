@extends('layouts.adminlayout')
@section('title','Inventory marketingreport')
@section('content')

  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="card-title">Daily Marketing Sales Report</h5>
                    </div>
                    <div class="col-lg-8">
                        <a href="{{route('marketingreport.create')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-plus"></i> New</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <form action="{{route('marketingreport.datewiseview')}}" method="POST">
                    @csrf
                      <div class="row mb-3 justify-content-center">
                        <div class="col-lg-1">
                          <div class="form-group">
                            <strong>FROM : </strong>
                          </div>
                        </div>
                        <div class="col-lg-3">

                          <div class="form-group">
                            <input type="text" class="form-control @error('start') is-invalid @enderror" name="start" id="start" placeholder="Select Start Date" value="{{Carbon\Carbon::now()->toDateString()}}">
                                @error('start')
                                <small class="form-error">{{ $message }}</small>
                                @enderror
                          </div>
                        </div>
                        <div class="col-lg-1">
                          <div class="form-group">
                            <strong>To : </strong>
                          </div>
                        </div>

                        <div class="col-lg-3">
                          <div class="form-group">
                            <input type="text" class="form-control @error('end') is-invalid @enderror" name="end" id="end" placeholder="Select End Date" value="{{Carbon\Carbon::now()->toDateString()}}">
                            @error('end')
                            <small class="form-error">{{ $message }}</small>
                            @enderror
                          </div>
                        </div>


                        <div class="col-lg-2">
                          <div class="form-group">
                            <button type="submit" class="btn btn-info">filter</button>
                          </div>

                        </div>
                      </div>
                    </form>

                    <div class="row">
                      <div class="col-lg-12">
                        <h3 class="mt-3 mb-5 text-uppercase text-center">Last 10 Marketing  Activity</h3>
                        <table class="table">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Date</th>
                              <th scope="col">Employee</th>
                              <th scope="col">Area</th>
                              <th scope="col">Order</th>
                              <th scope="col">Delivery</th>
                              <th scope="col">Market</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>

                              @foreach ($marketingreport as $key => $item)

                                  <td>{{$key+1}}</td>
                                  <td>{{$item->at->format('d-F-Y')}}</td>
                                  <td>{{$item->employee->name}}</td>
                                  <td>{{$item->area}}</td>
                                  <td>{{$item->order}}</td>
                                  <td>{{$item->delivery}}</td>
                                  <td>{{$item->market}}</td>
                                  <td><a  class="btn btn-warning btn-sm" href="{{route('marketingreport.edit',$item->id) }}"><i class="fas fa-edit"></i></a> | <form action="{{route('marketingreport.destroy',$item->id) }}" method="POST" style="display: inline-block">
                                  @csrf
                                  @method('DELETE')
                                  <button onclick="return confirm('Are You Sure Want Move this to Trash?')" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                  </form></td>

                              </tr>


                              @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>

            </div>
        </div>





    </div>
  </div>

@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/flatpicker.min.css')}}">
@endpush

@push('js')
<script>
  sessionStorage.clear();
  $('#user').select2({
width: '100%',
  theme: "bootstrap"
});
</script>
<script src="{{asset('assets/js/flatpicker.min.js')}}"></script>
<script>
  $("#start").flatpickr({dateFormat: 'Y-m-d'});
  $("#end").flatpickr({dateFormat: 'Y-m-d'});
</script>

@endpush


