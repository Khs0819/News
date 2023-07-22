@extends('cms.parent')

@section('title', 'الفئة')

@section('main_title', '')

@section('sub_title', 'عرض الفئة')


@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('categories.create') }}" type="button" class="btn btn-primary">اضافة فئة جديدة</a>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                        <thead>
                            <tr class="bg-info">
                                <th>رقم المعرف</th>
                                <th>اسم الفئة</th>
                                <th>الحالة</th>
                                <th>عدد المقالات</th>
                                <th>الوصف</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><span
                                            @if ($category->status == 'فعال') class="badge bg-success" @else class="badge bg-danger" @endif>{{ $category->status }}</span>
                                    </td>
                                    <td><span class="badge bg-yellow">({{ $category->articles_count }})</span></td>
                                    <td>
                                        <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                                            placeholder="أدخل وصف الفئة" cols="50" readonly>{{ $category->description }}</textarea>
                                    </td>
                                    <td>
                                        <div class="btn group">
                                            <a href="{{ route('categories.edit', $category->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button type="button" onclick="performDestroy({{ $category->id }} , this)"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            {{ $categories->links() }}
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/dashboard/categories/' + id;
            confirmDestroy(url, referance);
        }
    </script>
@endsection
