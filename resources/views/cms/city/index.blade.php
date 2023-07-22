@extends('cms.parent')

@section('title', 'المدينة')

@section('main_title', '')

@section('sub_title', 'عرض المدينة')


@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('cities.create') }}" type="button" class="btn btn-primary">اضافة مدينة جديدة</a>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                        <thead>
                            <tr class="bg-info">
                                <th>رقم المعرف</th>
                                <th>اسم المدينة</th>
                                <th>الشارع</th>
                                <th>الدولة</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->street }}</td>
                                    <td> <span class="badge bg-success ">{{ $city->country->name }}</span></td>
                                    <td>
                                        <div class="btn group">
                                            <a href="{{ route('cities.edit', $city->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button type="button" onclick="performDestroy({{ $city->id }} , this)"
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
            {{ $cities->links() }}
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/dashboard/cities/' + id;
            confirmDestroy(url, referance);
        }
    </script>
@endsection
