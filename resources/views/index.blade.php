@extends('layouts.index-layout')
@section('title') @parent @stop
@section('content')

    <section class="py-6">
        <div class="container">
            <div class="row gx-2 mt-7">
                @forelse ($goodslist as $goods)
                    <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
                        <div class="card card-span h-100">
                            <div class="position-relative block_img__product"> 
                                <img class="img-fluid rounded-3 w-100" src="{{ Storage::disk('public')->url($goods->image) }}"  onerror="this.onerror=null; this.src='{{ asset('assets/img/noimage.jpg') }}'" alt="product" />
                                <div class="card-actions">
                                    <div class="badge badge-foodwagon bg-primary p-3">
                                        <div class="d-flex flex-between-center">
                                            <div class="text-white fs-3">{{ $goods->price }}</div>
                                            <div class="d-block text-white fs-2">&euro;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <h5 class="fw-bold text-1000 text-truncate">{{ $goods->title }}</h5>
                                <p class="btn border-danger text-danger">Добавить в корзину</p>
                             </div>
                            <a class="stretched-link" href="{{ route('goods.show', ['goods' => $goods ]) }}"></a>
                        </div>
                    </div>
                @empty
                    <h2 class="text-gradient"> Товаров нет</h2>
                @endforelse
                <div class="text-center">
                    <a class="btn btn-danger" href="{{ route('/goods') }}"> Все товары<i class="fas fa-chevron-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-0 bg-primary-gradient">
        <div class="container">
            <div class="row justify-content-center g-0">
                <div class="col-xl-9">
                    <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                        <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">How does it work</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                    src="{{ asset('assets/img/gallery/location.png') }}" height="112" alt="..." />
                                <h5 class="mt-4 fw-bold">Select location</h5>
                                <p class="mb-md-0">Choose the location where your food will be delivered.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                    src="{{ asset('assets/img/gallery/order.png') }}" height="112" alt="..." />
                                <h5 class="mt-4 fw-bold">Choose order</h5>
                                <p class="mb-md-0">Check over hundreds of menus to pick your favorite food</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                    src="{{ asset('assets/img/gallery/pay.png') }}" height="112" alt="..." />
                                <h5 class="mt-4 fw-bold">Pay advanced</h5>
                                <p class="mb-md-0">It's quick, safe, and simple. Select several methods of payment
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                    src="{{ asset('assets/img/gallery/meals.png') }}" height="112" alt="..." />
                                <h5 class="mt-4 fw-bold">Enjoy meals</h5>
                                <p class="mb-md-0">Food is made and delivered directly to your home.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-10">
                    <div class="card card-span shadow-warning" style="border-radius: 35px;">
                        <div class="card-body py-5">
                            <div class="row justify-content-evenly">
                                <div class="col-md-3">
                                    <div
                                        class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between">
                                        <img src="{{ asset('assets/img/icons/discounts.png') }}" width="100" alt="..." />
                                        <div class="d-flex d-lg-block d-xl-flex flex-center">
                                            <h2 class="fw-bolder text-1000 mb-0 text-gradient">Daily<br
                                                    class="d-none d-md-block" />Discounts </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 hr-vertical">
                                    <div
                                        class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between">
                                        <img src="{{ asset('assets/img/icons/live-tracking.png') }}" width="100"
                                            alt="..." />
                                        <div class="d-flex d-lg-block d-xl-flex flex-center">
                                            <h2 class="fw-bolder text-1000 mb-0 text-gradient">Live Tracking</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 hr-vertical">
                                    <div
                                        class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between">
                                        <img src="{{ asset('assets/img/icons/quick-delivery.png') }}" width="100"
                                            alt="..." />
                                        <div class="d-flex d-lg-block d-xl-flex flex-center">
                                            <h2 class="fw-bolder text-1000 mb-0 text-gradient">Quick Delivery </h2>
                                        </div>
                                    </div>
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
