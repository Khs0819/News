@extends('cms.parent')

@section('title', 'المقالات')

@section('main_title', '')

@section('sub_title', 'عرض المقال')


@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                        <thead>
                            <tr class="bg-info">
                                <th>رقم المعرف</th>
                                <th>عنوان المقال</th>
                                <th>صورة المقال</th>
                                <th>الوصف المختصر</th>
                                <th>الفئة</th>
                                <th>الوصف المفصل</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>
                                        <img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/article/' . $article->image) }}" width="60"
                                            height="60" alt="User Image">
                                    </td>
                                    <td>{{ $article->short_description }}</td>
                                    <td> <span class="badge bg-success">{{ $article->category->name }}</span></td>

                                    <td>
                                        <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                                            placeholder="أدخل وصف الفئة" cols="50" readonly>{{ $article->full_description }}</textarea>
                                    </td>
                                    <td>
                                        <div class="btn group">
                                            <a href="{{ route('articles.edit', $article->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button type="button" onclick="performDestroy({{ $article->id }} , this)"
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
            {{ $articles->links() }}
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/dashboard/articles/' + id;
            confirmDestroy(url, referance);
        }
    </script>
@endsection
