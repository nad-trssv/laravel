@extends('layouts.admin')
@section('title')Редактировать товар - | @parent @stop
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Редактирование товара</h1>
            <a href="{{ route('admin.goods.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Все товары</a>
        </div>

        @if ($errors->any())
            @foreach($errors->all() as $error)
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="mb-0 alert alert-danger">{{ $error }}</div>    
                </div>
            @endforeach
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Редактировать: </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.goods.update', ['good' => $good] ) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="category_id">Категория:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    @if ($good->category_id === $category->id) selected @endif>
                                    {{ $category->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Заголовок:</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $good->title }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Изображение:</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div><br>
                        <div class="form-group">
                            <label for="status">Статус:</label>
                            <select name="status" id="status" class="form-control">
                                <option @if( $good->status == 'DRAFT') selected @endif>DRAFT</option>
                                <option @if( $good->status == 'PUBLISHED') selected @endif>PUBLISHED</option>
                                <option @if( $good->status == 'BLOCKED') selected @endif>BLOCKED</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена:</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ $good->price }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
