@extends('layouts.main')
@section('title') Товары - @parent @stop
@section('content')


<section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card card-span mb-3 shadow-lg">
            <div class="card-body py-0">
              <div class="row justify-content-center">
                <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-md-0"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-start rounded-md-top-0" src="{{ asset('assets/img/gallery/'.$productOne->image) }}"  onerror="this.onerror=null; this.src='assets/img/gallery/discount-item-1.png'" alt="..."></div>
                <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                  <h1 class="card-title mt-xl-5 mb-4"> {{ $productOne->title  }} </h1>
                  <p class="fs-2 fw-bold">Цена: <span class="text-primary"> &euro; {{ $productOne->price  }}</span></p>
                  <p><strong> Категория: {{ optional($productOne->category)->title }}</strong></p>
                  <p class="fs-1">Get the best fried chicken smeared with a lip smacking lemon chili flavor. Check out best deals for fried chicken.</p>
                  <div class="d-grid bottom-0"><a class="btn btn-lg btn-primary mt-xl-6" href="#!">Добавить в корзину</a></div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="py-0">
    <div class="bg-holder"
        style="background-image:url({{ asset('assets/img/gallery/cta-two-bg.png') }});background-position:center;background-size:cover;">
    </div>
    <div class="container">
        <div class="row flex-center">
            <div class="col-xxl-9 py-7 text-center">
                <h1 class="fw-bold mb-4 text-white fs-6">Are you ready to order <br />with the best deals? </h1>
                <a class="btn btn-danger" href="#"> PROCEED TO ORDER<i class="fas fa-chevron-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
