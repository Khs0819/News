@extends('cms.parent')

@section('title', 'الدولة')

@section('main_title', '')

@section('sub_title', 'عرض الدولة')


@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get" style="margin-bottom:2%;">
                        <div class="row">
                            <div class="input-icon col-md-2">
                                <input type="text" class="form-control" placeholder="البحث باسم الدولة" name='name'
                                    @if (request()->name) value={{ request()->name }} @endif />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>

                            <div class="input-icon col-md-2">
                                <input type="number" class="form-control" placeholder="البحث بكود الدولة" name='code'
                                    @if (request()->code) value={{ request()->code }} @endif />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>


                            <div class="col-md-4">
                                <button class="btn btn-success btn-md" type="submit"> فلترة</button>
                                <a href="{{ route('countries.index') }}" class="btn btn-danger"> انهاء الفلترة</a>
                                {{-- @can('Create-City') --}}

                                <a href="{{ route('countries.create') }}"><button type="button"
                                        class="btn btn-md btn-primary"> اضافة دولة جديدة </button></a>
                                {{-- @endcan --}}
                            </div>

                        </div>
                    </form>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                        <thead>
                            <tr class="bg-info">
                                <th>رقم المعرف</th>
                                <th>اسم الدولة</th>
                                <th>كود الدولة</th>
                                <th>عدد المدن</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                                <tr>
                                    <td>{{ $country->id }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->code }}</td>
                                    <td><span class="badge bg-success ">({{ $country->cities_count }}) مدن</span></td>
                                    <td>
                                        <div class="btn group">
                                            <a href="{{ route('countries.edit', $country->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button type="button" onclick="performDestroy({{ $country->id }} , this)"
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
            {{ $countries->links() }}
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/dashboard/countries/' + id;
            confirmDestroy(url, referance);
        }
    </script>
@endsection
