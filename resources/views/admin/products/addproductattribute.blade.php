@extends('layouts.admin')

@section('content')

<div class="container">
  @if (session()->has('delete'))
  <div class="alert alert-danger">
      {{ session()->get('delete') }}
  </div>
  @endif
  @if (count($errors) > 0)
<div class = "alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif

  <form action="{{route('storeProductAttribute')}}" method="post">
    @csrf
  <input name="product_id" value="{{$product->id}}" type="hidden">
  <label for="exampleInputEmail1">Select Attribute</label>
  <select name="attribute_type" class="form-control select_change" aria-label="Default select example">
    <option value="" disabled selected>Select Attribute</option>
   
    <option  value="size">Size</option>
    <option  value="color">color</option>
 
    
  </select>
  <br>
  <table class="table table-bordered" id="dynamicAddRemove">  
  </tr>
  <tr>
  <th>Product Variant</th>
  <th>Action</th>
  </tr>      
    <tr class="size">
            <td>
              <select name="variant_name" class="form-control" aria-label="Default select example">
                <option value="" disabled selected>Select Variant</option>
                <optgroup label="Select The Size">
                <option  value="small">small</option>
                <option  value="medium">medium</option>
                <option  value="large">large</option>
              </optgroup>
               <optgroup label="Or Select The Color">
                <option  value="black">black</option>
                <option  value="white">white</option>
                <option  value="silver">silver</option>
              </optgroup>
                
              </select>
              <br>
              <input type="text" name="price" placeholder="Enter Price" class="form-control" />
            </td>
            <td>
              <button type="button" class="btn btn-danger remove-tr">Remove</button></td>
            
           
             </table> 
             <button type="submit" class="btn btn-primary">Add Attribute</button> 
            </form>
<br>
            <table class="table table-bordered" id="dynamicAddRemove">  
            </tr>
            <tr>
              
            <th>Product Attribute</th>
            <th>Product variant</th>
            <th>Product Price</th>
            <th>Action</th>
            </tr>     
           
            @if(isset($productdetails))
            @forelse($productdetails as $detail) 
              <tr>
                <td>{{$detail->variation}}</td>
                <td>{{$detail->variation_title}}</td>
                <td>{{$detail->variation_price}}</td>
               
            <td><a href="{{route('editProduct',$detail->id)}}" class="btn btn-primary">Edit </a>
              <a href="{{route('destroyProductAttribute',$detail->id)}}" class="btn btn-danger">Delete </a></td>
              </tr>
              @empty
              <tr>
                <td colspan="3">no data found</td>
              </tr>
              @endforelse
                     @endif 
                     
             </table> 
          </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script type="text/javascript">
  $('.size').hide();
$(".select_change").change(function(){
  // console.log($(this).val())
  // if($(this).val() == 0){
  //   $('.size').hide();
  // }
    $('.size').show();
});

  $(document).on('click', '.remove-tr', function(){  
  $(this).parents('tr').hide();
  });
</script>
@endsection
