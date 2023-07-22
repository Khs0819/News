@extends('cms.parent')

@section('title', 'السلايدر')

@section('main_title', '')

@section('sub_title', 'عرض السلايدر')


@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('sliders.create') }}" type="button" class="btn btn-primary">اضافة سلايدر جديد</a>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                        <thead>
                            <tr class="bg-info">
                                <th>رقم المعرف</th>
                                <th>الصوررة</th>
                                <th>عنوان السلايدر</th>
                                <th>وصف السلايدر</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>
                                        <img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/slider/' . $slider->image) }}" width="60"
                                            height="60" alt="User Image">
                                    </td>
                                    <td>{{ $slider->title }}</td>
                                    <td>
                                        <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                                            placeholder="أدخل وصف الفئة" cols="50" readonly>{{ $slider->description }}</textarea>
                                    </td>
                                    <td>
                                        <div class="btn group">
                                            <a href="{{ route('sliders.edit', $slider->id) }}" type="button"
                                                class="btn btn-info">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button type="button" onclick="performDestroy({{ $slider->id }} , this)"
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
            {{ $sliders->links() }}
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/dashboard/sliders/' + id;
            confirmDestroy(url, referance);
        }
    </script>
@endsection
