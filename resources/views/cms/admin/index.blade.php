@extends('cms.parent')

@section('title', 'المتحكمين')

@section('sub-title', 'عرض المتحكمين')

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
                            {{-- <h3 class="card-title"> Index Data of Admin</h3> --}}
                            <a href="{{ route('admins.create') }}" type="button" class="btn btn-info">اضافة أدمن جديد</a>

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
                                        <th>رقم الهاتف</th>
                                        <th>الحالة</th>
                                        <th>الجنس</th>
                                        <th>المدينة</th>
                                        <th>الاعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        {{-- <td><span class="tag tag-success">Approved</span></td> --}}

                                        <tr>
                                            <td>{{ $admin->id }}</td>

                                            <td>
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('storage/images/admin/' . $admin->user->image) }}"
                                                    width="60" height="60" alt="User Image">
                                            </td>
                                            <td>{{ $admin->user->first_name . ' ' . $admin->user->last_name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->user->mobile ?? '' }}</td>
                                            <td>{{ $admin->user->status ?? '' }}</td>
                                            <td>{{ $admin->user->gender ?? '' }}</td>
                                            <td><span class="badge bg-info">({{ $admin->user->city->name ?? '' }})</td>

                                            <td>
                                                <div class="btn group">
                                                    <a href="{{ route('admins.edit', $admin->id) }}" type="button"
                                                        class="btn btn-info">
                                                        <i class="fas fa-edit"></i>
                                                        {{-- <i class="far fa-edit"></i> --}}
                                                    </a>
                                                    <button type="button"
                                                        onclick="performDestroy({{ $admin->id }} , this)"
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
                    {{ $admins->links() }}
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
            let url = '/dashboard/admins/' + id;
            confirmDestroy(url, referance);
        }
    </script>
@endsection
