@extends('layouts.admin')
@section('title')Добавить товар - | @parent @stop
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавление товара</h1>
            <a href="{{ route('admin.goods.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Все товары</a>
        </div>
        <!-- DataTales Example -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @if ($errors->any())
                @foreach($errors->all() as $error)
                <div class="mb-0 alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Новый товар: </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.goods.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option @if(old('category') === 'Category 1') selected @endif>Category 1</option>
                                <option @if(old('category') === 'Category 2') selected @endif>Category 2</option>
                                <option @if(old('category') === 'Category 3') selected @endif>Category 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
