
@extends('layouts.adminlayout')
@section('title','Editing  '.$product->product_name)


@section('modal')

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-data">

      </div>

    </div>
  </div>
</div>

@endsection


@section('content')
<div class="row justify-content-center">
<div class="col-lg-8">
	<div class="card">
    <div class="card-header">
      <div class="row">

        <div class="col-lg-4">
        <a class="btn btn-info" href="{{route('products.index')}}">back</a>
        </div>
        <div class="col-lg-8">
          <h5 class="card-title text-right">EDIT {{$product->product_name}}</h5>

        </div>
      </div>

    </div>
    <div class="card-body table-responsive">
    <form id="submitform" action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PUT')

     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="product_name">Product Name</label>
          <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="product_name" placeholder="Enter Product Name"  value="{{old('product_name',$product->product_name)}}" required>
            @error('product_name')
           <small class="form-error">{{ $message }}</small>
           @enderror
          </div>






          <div class="row">
            <div class="col-lg-10">
              <div class="form-group">
                <label for="category">Category</label>
                <select data-placeholder="Select a Category" name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                  <option></option>
                  @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($product->category_id == $category->id) selected  @endif>{{$category->category_name}}</option>
                  @endforeach
                </select>
                @error('category')
                <small class="form-error">{{ $message }}</small>
                @enderror
              </div>
            </div>

              <div class="col-lg-2" style="margin-top: 28px;">
                <button onclick="CategoryPopup('{{route('categories.store')}}')" type="button" class="btn btn-secondary"><i class="fa fa-plus"></i></button>
              </div>

          </div>






          <div class="row">
            <div class="col-lg-10">
              <div class="form-group">
                  <label for="size">Size</label>
                  <select data-placeholder="Select a Size" name="size" id="size" class="form-control @error('size') is-invalid @enderror" required>
                    <option></option>
                    @foreach ($sizes as $size)
                      <option value="{{$size->id}}" @if (old('size',$product->size_id) == $size->id) selected  @endif>{{$size->name}}</option>
                    @endforeach
                  </select>
                  @error('size')
                  <small class="form-error">{{ $message }}</small>
                  @enderror
                </div>
            </div>
            <div class="col-lg-2" style="margin-top: 28px">
                <button onclick="SizePopup('{{route('sizes.store')}}')" type="button" class="btn btn-info"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="row d-none">
          <div class="col-lg-12 mb-3">
            <label for="show_in">Show In: </label>
            <select class="form-control  @error('show_in') is-invalid @enderror" name="show_in" id="show_in">
              <option value="">-select a module-</option>
              <option value="ecom" @if($product->type == 'ecom') selected @endif>E-commerce And Inventory Both</option>
              <option value="pos" @if($product->type == 'pos') selected @endif>On Inventory Module</option>
            </select>
            @error('show_in')
                  <small class="form-error">{{ $message }}</small>
            @enderror
            <p id="show_in_msg" class="alert alert-danger mt-3"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="mfg">Manufacturing Date (optional)</label>
              <input type="text" class="form-control @error('mfg') is-invalid @enderror" name="mfg" id="mfg" placeholder="Select Manufacturing Date" value="{{old('mfg',$product->mfg)}}">
                  @error('mfg')
                  <small class="form-error">{{ $message }}</small>
                  @enderror
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="exp">Expire Date (optional)</label>
              <input type="text" class="form-control @error('exp') is-invalid @enderror" name="exp" id="exp" placeholder="Select Expire Date" value="{{old('exp',$product->exp)}}">
                  @error('exp')
                  <small class="form-error">{{ $message }}</small>
                  @enderror
            </div>


            <div class="form-group mb-5">
              <strong>Is E-commerce Price Confidential</strong> <br>
              <div class="onoffswitch">
                <input type="checkbox" name="is_price_confidential" class="onoffswitch-checkbox" id="price-confidential" tabindex="0" value="1" @if($product->is_price_confidential == true) checked @endif>
                <label class="onoffswitch-label" for="price-confidential">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>

            </div>






            @if(!empty($product->gallery_image))
            <div class="form-group">
            <h5>Previous Gallery Image</h5>
             @php $gallery_image_array = json_decode($product->gallery_image) @endphp

              @foreach ($gallery_image_array as $item)
            <form action="{{route('products.removegalleryimage',$product->id)}}" method="POST" style="display: inline-block;margin-right: 10px;border: 1px solid #ddd;padding: 10px;border-radius: 5px;">
              @csrf
             <input type="hidden" value="{{$item}}" name="gal_image">
              <img style="width: 70px;border-radius: 100%" src="{{asset('uploads/gallery/thumb/'.$item)}}" alt="">
              <button onclick="return confirm('Are You Sure You Want To Delete This Gallery Image?')" type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
              </form>
              @endforeach
            </div>
            @endif
          </div>
        </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-10">
              <div class="form-group">
                <label for="subcategory">Product Types</label>
                <select data-placeholder="--Select Product Types--" name="product_type" id="product_type" class="form-control @error('product_type') is-invalid @enderror"  required>
                  <option></option>
                  @foreach ($product_types_collection as $single_types)
                  <option value="{{$single_types->id}}" @if (old('product_type',$product->product_type_id) == $single_types->id) selected  @endif>{{$single_types->name}}</option>

                  @endforeach
                </select>
                @error('product_type')
                <small class="form-error">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-lg-2" style="margin-top: 28px">
              <button onclick="productTypesPopup('{{route('product_types.store')}}')" type="button" class="btn btn-dark"><i class="fa fa-plus"></i></button>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-10">
              <div class="form-group">
                <label for="brand">Brand</label>
                <select data-placeholder="--Select a Brand--" name="brand" id="brand" class="form-control @error('brand') is-invalid @enderror" name="brand" required>
                  <option></option>
                  @foreach ($brands as $brand)
                  <option value="{{$brand->id}}" @if (old('brand',$product->brand_id) == $brand->id) selected  @endif>{{$brand->brand_name}}</option>
                    @endforeach
                </select>
                @error('brand')
                <small class="form-error">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-lg-2" style="margin-top: 28px;">
              <button onclick="BrandPopup('{{route('brands.store')}}')" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
            </div>
          </div>



          <div class="form-group">
            <label for="image">Product Image</label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="product_image" >
            @error('image')
            <small class="form-error">{{ $message }}</small>
            @enderror

          </div>
          <div class="form-group">
            <img style="padding: 10px;"  class="img-thumbnail rounded" src="{{asset('uploads/products/thumb/'.$product->image)}}" id="product_image_show" alt="">
          </div>


          <div class="form-group">
            <strong>In Stock</strong> <br>
            <div class="onoffswitch">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="in-stock" tabindex="0" value="1" @if($product->in_stock == true) checked @endif>
              <label class="onoffswitch-label" for="in-stock">
                  <span class="onoffswitch-inner"></span>
                  <span class="onoffswitch-switch"></span>
              </label>
          </div>

          </div>

          <div class="form-group mt-5" style="border: 1px solid #ccc;padding: 10px;">

          <h5 class="mt-3 mb-3">Product Image Gallery</h5>

          <div class="input-group hdtuto control-group lst increment" >
            <input type="file" name="gallery_image[]" class="myfrm form-control">
            <div class="input-group-btn">
              <button class="btn btn-success" id="AddImage" type="button"><i class="fas fa-plus"></i></button>
            </div>
          </div>


          <div class="clone hide">
            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
              <input type="file" name="gallery_image[]" class="myfrm form-control">
              <div class="input-group-btn">
                <button class="btn btn-danger" id="removeImage" type="button"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </div>
        </div>

        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label for="description">Product Description</label>
            <input id="description" type="hidden" name="description"  value="{{old('description',$product->description)}}">
            <trix-editor input="description" id="desc"></trix-editor>

          </div>
        </div>

          <div class="col-lg-12">
            <div class="form-group">
              <button type="submit" class="btn btn-success" id="pdupdate">Update</button>
            </div>
          </div>


      </div>
    </form>
    </div>
  </div>
</div>
</div>


@endsection
@push('css')
<link rel="stylesheet" href="{{asset('assets/css/trix.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/flatpicker.min.css')}}">
<style>
  #show_in_msg{
    display: none;
  }

  .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice__remove{
    color: #000 !important;
  }
</style>
@endpush

@push('js')
<script src="{{asset('assets/js/trix.js')}}"></script>
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script src="{{asset('assets/js/flatpicker.min.js')}}"></script>
<script>
let brandlisturl = '{{route('brandlist')}}';
let categorylisturl = '{{route('categorylist')}}';
let product_types_list_url = '{{route('product_types_list')}}';
let sizelisturl = '{{route('sizelist')}}';
function BrandImageShow(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#brand_image').attr('src', e.target.result).show();
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#show_in").change(function(){
    let s_value = $("#show_in").val();
    if(s_value === 'ecom'){
      $("#show_in_msg").text('N.B: Product Can be Accessed In both Inventory And Ecommerce Module').show();
    }else if(s_value === 'pos'){
      $("#show_in_msg").text('N.B: Product Can be Accessed Only For Inventory Module').show();
    }else{
      $("#show_in_msg").text('').hide();
    }
});



$('#submitform').submit(function(){
    $("#pdupdate").html('<i class="fas fa-spinner fa-spin"></i> Please Wait........').addClass("disabled");
});







function CategoryImageShow(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#cat_image').attr('src', e.target.result).show();
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function SubCategoryImageShow(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#subcat_image').attr('src', e.target.result).show();
    }
    reader.readAsDataURL(input.files[0]);
  }
}




function SizePopup(url){
  $("#productModalLabel").text('Add New Size');
  $("#modal-data").html(`<form id="size_form"> <div class="form-group">
        <label for="size_name">Size</label>
      <input type="text" class="form-control" name="size_name" id="size_name" placeholder="Enter Size Name" required>
      <small class="text-danger size_name_err"></small>
      </div> <button type="button" id="size_form_button" onclick="addSize('${url}')" class="btn btn-success">+ Add</button></div> </form>`);
  $('#productModal').modal('show');
}

function addSize(url){
  $(".text-danger").hide().text("");
	$(".red-border").removeClass("red-border");
	$('#size_form_button').html('<i class="fas fa-spinner fa-spin"></i> Please Wait...').attr('disabled',true);
	let frm  = $("#size_form");
  let formData = new FormData(frm[0]);

  axios.post(url,formData)
		.then(res => {
      $('#size_form_button').text('+ Add').attr('disabled',false);
		  $('#productModal').modal('hide');
      getSizeOptions();
       toastr.success(res.data);
		})

		.catch(err => {
			let errors = err.response.data.errors;
			Object.keys(errors).forEach(function(value){
				$("#"+value+"").addClass("red-border");
				$("."+value+"_err").text(errors[value][0]);
      })
      $('#size_form_button').text('+ Add').attr('disabled',false);
			})

			$(".text-danger").show();
}

function CategoryPopup(url){
  $("#productModalLabel").text('Add New Category');
  $("#modal-data").html(`<form enctype="multipart/form-data" id="category_form"><div class="form-group">
        <label for="category_name">Category Name</label>
      <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name">

      <small class="text-danger category_name_err"></small>

      </div>

      <div class="form-group">
        <label for="category_image">Category Image</label>
        <input onchange="CategoryImageShow(this)" type="file" class="form-control" name="category_image" id="category_image">
        <img  style="padding: 10px;display:none" class="img-thumbnail rounded" src="" id="cat_image" alt="">
        <small class="text-danger category_image_err"></small>
      </div>

      <div class="form-group">

      </div> <button type="button" id="category_form_button" onclick="addCategory('${url}')" class="btn btn-success">+ Add</button></div> </form>`);
  $('#productModal').modal('show');


}




function addCategory(url){
  $(".text-danger").hide().text("");
	$(".red-border").removeClass("red-border");
	$('#category_form_button').html('<i class="fas fa-spinner fa-spin"></i> Please Wait...').attr('disabled',true);
	let frm  = $("#category_form");
  let formData = new FormData(frm[0]);

  axios.post(url,formData)
		.then(res => {
      $('#category_form_button').text('+ Add').attr('disabled',false);
		  $('#productModal').modal('hide');
       toastr.success(res.data);
       getCategoryOptions();
		})

		.catch(err => {
			let errors = err.response.data.errors;
			Object.keys(errors).forEach(function(value){
				$("#"+value+"").addClass("red-border");
				$("."+value+"_err").text(errors[value][0]);
      })
      $('#category_form_button').text('+ Add').attr('disabled',false);
			})

			$(".text-danger").show();
}


function productTypesPopup(url){
    $("#productModalLabel").text('Add New Product Types');
    $("#modal-data").html(`<form id="product_type_form">
  <div class="form-group">
        <label for="product_type_name">Product Types</label>
      <input type="text"  class="form-control" name="name" id="product_type_name" placeholder="Enter Product Types" required>
      <small class="text-danger product_type_name_err"></small>
      </div>
      <div class="form-group">
        <label for="product_type_image">Product Type Image</label>
        <input onchange="SubCategoryImageShow(this)" type="file" class="form-control" name="image" id="product_type_image" required>
        <small class="text-danger product_type_image_err"></small>
        <img  style="padding: 10px;display:none" class="img-thumbnail rounded" src="" id="subcat_image" alt="">


      </div> <button type="button" id="product_type_form_button" onclick="addProductTypes('${url}')" class="btn btn-success">+ Add</button></div> </form>`);
    $('#productModal').modal('show');
}

function addProductTypes(url){
    $(".text-danger").hide().text("");
    $(".red-border").removeClass("red-border");
    $('#product_type_form_button').html('<i class="fas fa-spinner fa-spin"></i> Please Wait...').attr('disabled',true);
    let frm  = $("#product_type_form");
    let formData = new FormData(frm[0]);

    axios.post(url,formData)
        .then(res => {
            $('#productModal').modal('hide');
            $('#product_type_form_button').text('+ Add').attr('disabled',false);
            getProductTypesOptions();
            toastr.success(res.data);
        })

        .catch(err => {
            let errors = err.response.data.errors;
            Object.keys(errors).forEach(function(value){
                $("#product_type_"+value+"").addClass("red-border");
                $(".product_type_"+value+"_err").text(errors[value][0]);
            })
            $('#product_type_form_button').text('+ Add').attr('disabled',false);
        })

    $(".text-danger").show();
}



function BrandPopup(url){
  $("#productModalLabel").text('Add Brand');
  $("#modal-data").html(`<form id="brand_form"> <div class="form-group">
        <label for="brand_name">Brand Name</label>
      <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Enter Brand Name" required>
      <small class="text-danger brand_name_err"></small>
      </div> <div class="form-group">
        <label for="image">Brand Image</label>
        <input onchange="BrandImageShow(this)" type="file" class="form-control" name="image" id="image" required>
        <small class="text-danger image_err"></small>
        <img  style="padding: 10px;display:none" class="img-thumbnail rounded" src="" id="brand_image" alt="">
      </div>
      <h5 class="mb-3">Show In Frontend</h5>
      <div class="onoffswitch">
                <input type="checkbox" name="frontend" class="onoffswitch-checkbox" id="frontend" value="1" >
                <label class="onoffswitch-label" for="frontend">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div> <div class="form-group"><button type="button" id="send_form" onclick="addBrand('${url}')" class="btn btn-success">+ Add</button></div> </form>`);
  $('#productModal').modal('show');
}



function addBrand(url){
  $(".text-danger").hide().text("");
	$(".red-border").removeClass("red-border");
	$('#send_form').html('<i class="fas fa-spinner fa-spin"></i> Please Wait...').attr('disabled',true);
	let data = $("#brand_form").serialize();
  axios.post(url,data)
		.then(res => {
		  $('#productModal').modal('hide');
     toastr.success(res.data);
      getBrandOptions();
		})

		.catch(err => {
			let errors = err.response.data.errors;
			Object.keys(errors).forEach(function(value){
				$("#"+value+"").addClass("red-border");
				$("."+value+"_err").text(errors[value][0]);
      })
			})

			$('#send_form').text('+ Add').attr('disabled',false);
			$(".text-danger").show();


 }





function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}

function getBrandOptions(){
  let brandopt = "";
  axios.get(brandlisturl)
  .then(function (response) {
    response.data.forEach(function(value){
      brandopt += `<option value="${value.id}">${value.brand_name}</option>`;
    })
    // handle success
    $("#brand").html(brandopt);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })


}


function getProductTypesOptions(){
    let subcategoryopt = "";
    axios.get(product_types_list_url)
        .then(function (response) {
            response.data.forEach(function(value){
                subcategoryopt += `<option value="${value.id}">${value.name}</option>`;
            })
            // handle success
            $("#product_type").html(subcategoryopt);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })

}

function getCategoryOptions(){
  let categoryopt = "";
  axios.get(categorylisturl)
  .then(function (response) {
    response.data.forEach(function(value){
      categoryopt += `<option value="${value.id}">${value.category_name}</option>`;
    })
    // handle success
    $("#category").html(categoryopt);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })

}

function getSizeOptions(){
  let sizeopt = "";
  axios.get(sizelisturl)
  .then(function (response) {
    response.data.forEach(function(value){
      sizeopt += `<option value="${value.id}">${value.name}</option>`;
    })
    // handle success
    $("#size").html(sizeopt);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })

}



// Show Current Image On the Form Before Upload



function ProductimageURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#product_image_show').attr('src', e.target.result).show();
    }

    reader.readAsDataURL(input.files[0]);
  }
}


$("#product_image").change(function() {
  ProductimageURL(this);
});






$("#AddImage").click(function(){
      var lsthmtl = $(".clone").html();
      $(".increment").after(lsthmtl);
  });
  $("body").on("click","#removeImage",function(){
      $(this).parents(".hdtuto.control-group.lst").remove();
  });








  var colors = ["#eb4d4b", "#A3CB38", "#f1c40f", "#f39c12", "#2980b9", "#ff7979", "purple"];
  //For Addmodal


    $('#size').select2({
      width: '100%',
      theme: "bootstrap"
    });


  //For Editmodal
  $('#category').select2({
      width: '100%',
      theme: "bootstrap"
    });
    $('#subcategory').select2({
      width: '100%',
      theme: "bootstrap"
    });

    $('#brand').select2({
      width: '100%',
      theme: "bootstrap",

    });

    $("#mfg").flatpickr({dateFormat: 'Y-m-d'});
    $("#exp").flatpickr({dateFormat: 'Y-m-d'});

</script>



@endpush

