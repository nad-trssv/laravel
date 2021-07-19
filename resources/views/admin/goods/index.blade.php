@extends('layouts.admin')
@section('title')Список товаров - | @parent @stop
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список товаров</h1>
            <a href="{{ route('admin.goods.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Добавить товар</a>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @if (session()->has('success'))
            <div class="mb-0 alert alert-success">{{ session()->get('success') }}</div>
        @endif
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Товары</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="200px">Название</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Дата добавления</th>
                                <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($goodslist as $goods)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $goods->title }}</td>
                                    <td>&euro;&nbsp;{{ $goods->price }}</td>
                                    <td>
                                        {{ $goods->status }}
                                    </td>
                                    <td>{{ $goods->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.goods.edit', ['good' => $goods]) }}" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Ред.</span>
                                        </a>
                                        &nbsp; &nbsp;
                                        <a href="#" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Удалить</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
