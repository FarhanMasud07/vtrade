@extends('layouts.adminlayout')
@section('title','Create Inventory Customer')

@section('content')
<div class="row">
<div class="col-lg-12">
	<div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-4">
                <a class="btn btn-info btn-sm" href="{{route('customers.index')}}"><i class="fa fa-angle-left"></i> back</a>
                </div>
                <div class="col-lg-8">
                    <h5 class="card-title float-right">Add New Customer</h5>
                </div>
            </div>
        </div>
    <div class="card-body">
    <div class="row justify-content-center">
        <div class="col-lg-8">
    <form action="{{route('customers.store')}}" method="POST" style="border: 1px solid #ddd;padding: 20px;border-radius: 5px">
        @csrf
        <div class="row">

        <div class="col-lg-6">

            <div class="form-group">
                <label for="name">Customer Name<span>*</span></label>
            <input type="text" id="name" placeholder="Enter Your Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>

                @error('name')
                <small class="form-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="proprietor">Proprietor Name<span>(optional)</span></label>
            <input type="text" id="proprietor" placeholder="Enter Proprietor Name" class="form-control @error('proprietor') is-invalid @enderror" name="proprietor" value="{{old('proprietor')}}">

                @error('proprietor')
                <small class="form-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="inventory_email">Email<span>(optional)</span></label>
                <input type="text" id="inventory_email" placeholder="Enter Your Email" class="form-control @error('inventory_email') is-invalid @enderror" name="inventory_email" value="{{old('inventory_email')}}">
                @error('inventory_email')
                <small class="form-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
            <input type="text" id="phone" placeholder="Enter Your phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}">
                @error('phone')
                <small class="form-error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="company">Company<span>(optional)</span></label>
            <input type="text" id="company" placeholder="Enter Your Company Name" class="form-control @error('company') is-invalid @enderror" name="company" value="{{old('company')}}">
                @error('company')
                <small class="form-error">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="section">Customer Section<span>*</span></label>
                <select name="section" id="section" class="form-control @error('section') is-invalid @enderror" required>
                    <option value="">--Select Section--</option>
                    @foreach ($sections as $item)
                        <option value="{{$item->id}}" @if($item->name === 'Wholesale') selected @endif>{{$item->name}}</option>
                    @endforeach

                </select>
                @error('section')
                <small class="form-error">{{ $message }}</small>
                @enderror
            </div>


        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="address">Address<span>*</span></label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address"  rows="4" placeholder="Enter Your Addres" required>{{old('address')}}</textarea>

                @error('address')
                <small class="form-error">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="division">Division<span>*</span></label>
                <select name="division" id="division" class="form-control @error('division') is-invalid @enderror" required>
                    <option value="">Select Division</option>
                    @foreach ($divisions as $item)
                    <option value="{{$item->id}}" {{ (old("division") == $item->id ? "selected": "") }}>{{$item->name}}</option>
                    @endforeach

                </select>
                @error('division')
                <small class="form-error">{{ $message }}</small>
                @enderror
            </div>



        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>

    </div>
</form>
</div>
</div>
    </div>
  </div>
</div>
</div>


@endsection

@push('css')

@endpush


@push('js')
<script>

$('#division').select2({
    width: '100%',
    theme: "bootstrap",
    placeholder: "Select a Division",
});

</script>
@endpush
