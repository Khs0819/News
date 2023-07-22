@extends('cms.parent')

@section('title', 'الناشرين')

@section('sub-title', 'عرض الناشرين')

@section('styles')

@endsection

@section('content')
    {{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title"> Index Data of author</h3> --}}
                            <a href="{{ route('authors.create') }}" type="button" class="btn btn-info">اضافة ناشر جديد</a>

                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                                <thead>
                                    <tr class="bg-info">
                                        <th>رقم المعرف</th>
                                        <th>الصورة</th>
                                        <th>الاسم الكامل</th>
                                        <th>الايميل</th>
                                        <th>المقالات</th>
                                        <th>الحالة</th>
                                        <th>الجنس</th>
                                        <th>المدينة</th>
                                        <th>الاعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($authors as $author)
                                        {{-- <td><span class="tag tag-success">Approved</span></td> --}}

                                        <tr>
                                            <td>{{ $author->id }}</td>

                                            <td>
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('storage/images/author/' . $author->user->image) }}"
                                                    width="60" height="60" alt="User Image">
                                            </td>
                                            <td>{{ $author->user->first_name . ' ' . $author->user->last_name }}</td>
                                            <td>{{ $author->email }}</td>
                                            <td><a href="{{ route('indexArticle', ['id' => $author->id]) }}"
                                                    class="btn btn-info">({{ $author->articles_count }})
                                                    article/s</a> </td>
                                            <td>{{ $author->user->status ?? '' }}</td>
                                            <td>{{ $author->user->gender ?? '' }}</td>
                                            <td><span class="badge bg-info">({{ $author->user->city->name ?? '' }})</td>

                                            <td>
                                                <div class="btn group">
                                                    <a href="{{ route('authors.edit', $author->id) }}" type="button"
                                                        class="btn btn-info">
                                                        <i class="fas fa-edit"></i>
                                                        {{-- <i class="far fa-edit"></i> --}}
                                                    </a>
                                                    <button type="button"
                                                        onclick="performDestroy({{ $author->id }} , this)"
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
                    <!-- /.card -->
                    {{ $authors->links() }}
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection


@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/dashboard/authors/' + id;
            confirmDestroy(url, referance);
        }
    </script>
@endsection
