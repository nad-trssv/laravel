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
                                <th width="50px">Image</th>
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
                                    <td class="p-0 pt-2"><img src="{{ Storage::disk('public')->url($goods->image) }}" width="100%;" onerror="this.onerror=null; this.src='{{ asset('assets/img/noimage.jpg') }}'" alt="{{ $goods->title }}"></td>
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
                                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $goods->id }}" rel="{{ $goods->id }}" class="deleteProduct btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Удалить</span>
                                        </a>
                                    </td>
                                </tr>

                                <!-- delete product Modal-->
                                <div class="modal fade" id="deleteModal{{ $goods->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Удалить товар?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Выбирая кнопку "Удалить" вы подтверждаете удаление товара.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
                                                <a class="delete btn btn-primary" href="javascript:;" rel="{{ $goods->id }}">Удалить {{$goods->title}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('js')
<script>
    $(function (){
        $(".delete").on('click', function() {
            let id = $(this).attr('rel');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: '/admin/goods/' + id,
                    complete: function () {
                        location.reload();
                    }
                })
        })
    });
</script>
@endpush