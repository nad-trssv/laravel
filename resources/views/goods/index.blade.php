@extends('layouts.main')
@section('title') Товары - @parent @stop
@section('content')
    <section class="py-6">
        <div class="container">
            <div class="row gx-2 mt-7">
                @foreach ($goodslist as $goods)
                    <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
                        <div class="card card-span h-100">
                            <div class="position-relative"> <img class="img-fluid rounded-3 w-100"
                                    src="{{ asset('assets/img/gallery/discount-item-1.png') }}" alt="product" />
                                <div class="card-actions">
                                    <div class="badge badge-foodwagon bg-primary p-3">
                                        <div class="d-flex flex-between-center">
                                            <div class="text-white fs-3">{{ $goods['price'] }}</div>
                                            <div class="d-block text-white fs-2">&euro;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <h5 class="fw-bold text-1000 text-truncate"><?= $goods['title'] ?></h5>
                                <p class="btn border-danger text-danger">Добавить в корзину</p>
                            </div>
                            <a class="stretched-link" href="{{ route('goods.show', ['id' => $loop->iteration]) }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
