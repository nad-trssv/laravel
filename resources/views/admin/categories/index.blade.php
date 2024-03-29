@extends('layouts.admin')
@section('title')Список категорий - | @parent @stop
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список категорий</h1>
            <a href="{{ route('admin.categories.create') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Добавить категорию</a>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @if (session()->has('success'))
                <div class="mb-0 alert alert-success">{{ session()->get('success') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="mb-0 alert alert-danger">{{ session()->get('error') }}</div>
            @endif
        </div>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Категории</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="1px"></th>
                                <th>Название категории</th>
                                <th>Дата обновления</th>
                                <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categorylist as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td width="1px" style="background-color:{{ $category->color }};"></td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">
                                            {{ $category->title }} ( Товаров: {{ optional($category->goods)->count() }} )
                                        </a>
                                    </td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Ред.</span>
                                        </a>
                                        &nbsp; &nbsp;
                                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $category->id }}" rel="{{ $category->id }}" class=" btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Удалить</span>
                                        </a>
                                    </td>
                                </tr>

                                <!-- delete product Modal-->
                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                <a class="delete btn btn-primary" href="javascript:;" rel="{{ $category->id }}">Удалить {{$category->title}}</a>
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
                    url: '/admin/categories/' + id,
                    complete: function () {
                        location.reload();
                    }
                })
        })
    });
</script>
@endpush