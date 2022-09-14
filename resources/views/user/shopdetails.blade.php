@extends('layouts.user')
@section('content')

<section class="py-5">
  
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-6">
        <!-- PRODUCT SLIDER-->
        <div class="row m-sm-0">
          
          <div class="col-sm-10 order-1 order-sm-2">
            <div class="swiper product-slider">
              <div class="swiper-wrapper">
                <div class="swiper-slide h-auto"><a class="glightbox product-view" href="{{asset('uploads/products/'.$product->image)}}" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="{{asset('uploads/products/'.$product->image)}}" alt="..."></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- PRODUCT DETAILS-->
      <div class="col-lg-6">
        <ul class="list-inline mb-2 text-sm">
          <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
          <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
          <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
          <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
          <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
        </ul>
        <h1>{{$product->product_name}}</h1>
        <p class="text-muted lead">${{$product->price}}</p>
        <div class="row align-items-stretch mb-4">
          @if (session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
          @endif
          @if (session()->has('delete'))
    <div class="alert alert-danger">
        {{ session()->get('delete') }}
    </div>
    @endif
    
          {{-- @if(Auth::check())
          @if (Auth::user()->role_id == 0)
          <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-primary"  >View Product</a></li>
          
          
          @elseif($cart->where('id',$product->id)->count())
          
          <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-danger" >Already In Cart</a></li>
          @else
          <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{route('addToCart',$product->id)}}">Add to cart</a></li>
          @endif
          @else
          @if($cart->where('id',$product->id)->count() )
          
          <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-danger" >Already In Cart</a></li>
          @else
          
          <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{route('addToCart',$product->id)}}">Add to cart</a></li>
          @endif
          @endif --}}
          <ul class="list-unstyled small d-inline-block">
            <br>
          <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ms-2" href="#!">{{$category->category_name}}</a></li>
          <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Stock:</strong><a class="reset-anchor ms-2" href="#!">{{$product->stock ??'not available' }}</a></li>
          
          <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Size : </strong>
            
            <select style="width: 20%; margin-left:70px; margin-top:-27px; height:35px  " name="category_type" class="form-control" aria-label="Default select example" required >
              <option  disabled selected hidden>Select Size</option>
              @forelse($product_size as $size)
              <option  value="new"> {{$size->variation_title  ??'not available' }}</option>
              @empty  <option  value="new">not available</option>
              @endforelse
            </select></li>          
          <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">color : </strong>
         
          <select style="width: 20%; margin-left:70px; margin-top:-27px; height:35px  " name="category_type" class="form-control" aria-label="Default select example" required >
            <option  disabled selected hidden>Select Color</option>
            @forelse($product_color as $color)
            <option  value="new"> {{$color->variation_title  ??'not available' }}</option>
            @empty  <option  value="new">not available</option>
            @endforelse
          </select></li> 
        </ul>
        
      </div>
      <div class="col-lg-6">
      <div class="row align-items-stretch mb-4 gx-0">
        <div class="col-sm-7">
          <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
            <div class="quantity">
              <form method="post" action="{{route('addtocartwithqty')}}">
                @csrf
              <input class="form-control border-0 shadow-0 p-0" name="qty" type="text" value="1" max ="10">
              
              <input class="form-control border-0 shadow-0 p-0" name="product_id" type="hidden" value="{{$product->id}}">
             
            </div>
          </div>
        </div>
        <div class="col-sm-5"><button type="submit" class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" >Add to cart</button></div>
      </form>
      </div>
    </div>
      </div>
    <!-- DETAILS TABS-->
    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
      <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
      <li class="nav-item"><a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
    </ul>
    <div class="tab-content mb-5" id="myTabContent">
      <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
        <div class="p-4 p-lg-5 bg-white">
          <h6 class="text-uppercase">Product description </h6>
          <p class="text-muted text-sm mb-0">{{$product->description}}</p>
        </div>
      </div>
      <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <div class="p-4 p-lg-5 bg-white">
          <div class="row">
            <div class="col-lg-8">
              <div class="d-flex mb-3">
                <div class="flex-shrink-0"><img class="rounded-circle" src="img/customer-1.png" alt="" width="50"/></div>
                <div class="ms-3 flex-shrink-1">
                  <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                  <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                  <ul class="list-inline mb-1 text-xs">
                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                  </ul>
                  <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </div>
              <div class="d-flex">
                <div class="flex-shrink-0"><img class="rounded-circle" src="img/customer-2.png" alt="" width="50"/></div>
                <div class="ms-3 flex-shrink-1">
                  <h6 class="mb-0 text-uppercase">Jane Doe</h6>
                  <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                  <ul class="list-inline mb-1 text-xs">
                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                  </ul>
                  <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
@endsection
