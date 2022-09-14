@extends('layouts.user')
@section('content')
      <!-- HERO SECTION-->
      <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(userpanel/img/hero-banner-alt.jpg)">
          <div class="container py-5">
            <div class="row px-4 px-lg-5">
              <div class="col-lg-6">
                <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark" href="{{route('shop')}}">Browse collections</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
          </header>
          <div class="row">
            
            <div class="col-md-4"><a class="category-item" href="{{route('categoriesShop',$category[0]->id)}}"><img class="img-fluid" src="{{asset('uploads/category/'.$category[0]->image)}}" alt=""/><strong class="category-item-title">{{$category[0]->category_name}}</strong></a>
            </div>
            <div class="col-md-4"><a class="category-item mb-4" href="{{route('categoriesShop',$category[1]->id)}}"><img class="img-fluid" src="{{asset('uploads/category/'.$category[1]->image)}}" alt=""/><strong class="category-item-title">{{$category[1]->category_name}}</strong></a>
            <a class="category-item" href="{{route('categoriesShop',$category[2]->id)}}"><img class="img-fluid" src="{{asset('uploads/category/'.$category[2]->image)}}" alt=""/><strong class="category-item-title">{{$category[2]->category_name}}</strong></a>
            </div>
            <div class="col-md-4"><a class="category-item" href="{{route('categoriesShop',$category[3]->id)}}"><img class="img-fluid" src="{{asset('uploads/category/'.$category[3]->image)}}" alt=""/><strong class="category-item-title">{{$category[3]->category_name}}</strong></a>
            </div>
          </div>
        </section>
        <!-- TRENDING PRODUCTS-->
        <section class="py-5">
          <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
          </header>
          <div class="row">
            <!-- PRODUCT-->
            @foreach ($product as $pro)
                
          
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="product text-center">
                <div class="position-relative mb-3">
                  <div class="badge text-white bg-"></div><a class="d-block" href="#"><img class="img-fluid w-100" src="{{asset('uploads/products/'.$pro->image)}}" alt="..."></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                      <ul class="mb-0 list-inline">
                        
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{route('shop')}}">Browse More Items</a></li>
                      </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="{{route('shopdetails',$pro->id)}}">{{$pro->product_name}}</a></h6>
                <p class="small text-muted">${{$pro->price}}</p>
              </div>
            </div>
            @endforeach
            </div>
        </section>
        <!-- SERVICES-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center gy-3">
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Free shipping</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Festivaloffers</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- NEWSLETTER-->
        <section class="py-5">
          <div class="container p-0">
            <div class="row gy-3">
              <div class="col-lg-6">
                <h5 class="text-uppercase">Let's be friends!</h5>
                <p class="text-sm text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
              </div>
              <div class="col-lg-6">
                <form action="#">
                  <div class="input-group">
                    <input class="form-control form-control-lg" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                    <button class="btn btn-dark" id="button-addon2" type="submit">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
      @endsection
