@extends('layouts.admin')
@section('title')Редактировать категорию - | @parent @stop
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Редактировать категорию</h1>
            <a href="{{ route('admin.categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Все категории</a>
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
                <h6 class="m-0 font-weight-bold text-primary">Редактировать: </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
                        </div>
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" name="color" id="color" value="{{ $category->color }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $category->description }}">
                        </div>
                        <input type="hidden" name="data" value="{{ now()->format('d-m-Y') }}">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection