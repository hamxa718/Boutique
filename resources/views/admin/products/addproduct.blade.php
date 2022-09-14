@extends('layouts.admin')

@section('content')
<div class="jumbotron">
  @if(isset($product))
  <h4>Edit Product Form</h4>
  <div class="container">
 @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
    
<form method="post" action="{{route('productUpdate',$product->id)}}" enctype="multipart/form-data">
  @csrf
  <label for="exampleInputEmail1">Select Category for this item</label>
  <select name="category_name" class="form-control" aria-label="Default select example">
    <option  value="{{$product->category_id}}">Select Category for this item</option>
    @foreach($allCategory as $cat)
    <option  value="{{$cat->id}}">{{$cat->category_name}}</option>
    @endforeach
  </select>
  <br>
  <label for="exampleInputEmail1">Select Category type</label>
  <select name="category_type" class="form-control" aria-label="Default select example">
    <option  value="{{$product->category_type}}">{{$product->category_type}}</option>
    @if($product->category_type == "new")
    <option  value="feature">feature</option>
    @else
    <option  value="new">new</option>
   @endif
    
  </select>
  <br>
  <div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" value="{{$product->product_name}}" class="form-control" name="product_name" placeholder="Enter Product Name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Product Price</label>
    <input type="number" class="form-control" value="{{$product->price}}" id="exampleInputPassword1" name="price" placeholder="Enter Product Price">
    
  </div>
  <div class="form-group">
      <div class="form-outline">
          <label class="form-label" for="textAreaExample">Product Description</label>
          <textarea class="form-control"  id="textAreaExample1" name="descrip" rows="4"> {{$product->description}}</textarea>
         
        </div>
      </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Product stock</label>
              <input type="number" class="form-control" id="exampleInputPassword1"  value="{{$product->stock}}"   name="stock" placeholder="Enter Product Stock">
               
            </div>
        <br>
    
    <div class="row">
      <table class="table table-bordered">
          <tr>
             
              <th>Select Image</th>
          </tr>
          <tbody>
              <tr>
                  <td>
                      <img src="{{asset('uploads/products/'.$product->image)}}" alt="" id="img_0" style="height: 150px;width: 150px;">
                  </td>
                  <td>
                      <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input"  name="image" id="gallery_0"   accept="image/*">
                              <label class="custom-file-label" for="category-image">Choose file</label>
                          </div>
                          {!! $errors->first('product_image_first', '<p class="help-block">:message</p>') !!}
                      </div>
                  </td>
              </tr>
          </tbody>
      </table>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
  </div>
  @else
<h4>Add Product Form</h4>
 @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
   <br>
<div class="container">
  
    <form method="POST" action="{{route('productSubmit')}}" enctype="multipart/form-data">
        @csrf
        
  <label for="exampleInputEmail1">Select Category for this item</label>
        <select name="category_name" class="form-control" aria-label="Default select example" required>
          <option disabled selected hidden >Select Category for this item</option>
          @foreach($allCategory as $cat)
          <option  value="{{$cat->id}}">{{$cat->category_name}}</option>
          @endforeach
        </select>
        <br>
        
  <label for="exampleInputEmail1">Select Category type</label>
        <select name="category_type" class="form-control" aria-label="Default select example" required >
          <option  disabled selected hidden>Select Category type</option>
          
          <option  value="new">new</option>
          <option  value="feature">feature</option>
          
        </select>
        <br>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Name</label>
          <input type="text" class="form-control"  value="{{old('product_name')}}" name="product_name" placeholder="Enter Product Name">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Product Price</label>
          <input type="number" class="form-control" id="exampleInputPassword1"  value="{{old('price')}}"   name="price" placeholder="Enter Product Price">
           
        </div>
       
        <div class="form-group">
            <div class="form-outline">
                <label class="form-label" for="textAreaExample">Product Description</label>
                <textarea class="form-control" id="textAreaExample1" name="descrip"  rows="4">  {{old('descrip')}}</textarea>
              
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Product stock</label>
                <input type="number" class="form-control" id="exampleInputPassword1"  value="{{old('stock')}}"   name="stock" placeholder="Enter Product Stock">
                 
              </div>
              <br>
              <div class="form-group">
                <label for="exampleFormControlFile1">Product Image</label>
                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
              </div>
          </div>
        
          
        <button type="submit" class="btn btn-primary">Submit</button> 
      </form>

</div>
@endif
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script type="text/javascript">

 var i = 0;
  $("#add-btn").click(function(){
    ++i;
    
  $("#dynamicAddRemove").append('<tr><td><input type="text" name="title[]" placeholder="Enter Variant" class="form-control" /><br><input type="text" name="price[]" placeholder="Enter Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
  });
  $(document).on('click', '.remove-tr', function(){  
  $(this).parents('tr').remove();
  });  
 
    $('#myselect').select2({
      width: '100%',
      placeholder: "Select an Option",
      allowClear: true
    });
    $('#myselectsecond').select2({
      width: '100%',
      placeholder: "Select an Option",
      allowClear: true
    });
    $('#myselectthird').select2({
      width: '100%',
      placeholder: "Select an Option",
      allowClear: true
    });
  

@endsection
