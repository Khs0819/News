@extends('cms.parent')

@section('title', 'التواصل')

@section('main_title', '')

@section('sub_title', 'عرض التواصل')


@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('contacts.create') }}" type="button" class="btn btn-primary">اضافة تواصل جديد</a>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                        <thead>
                            <tr class="bg-info">
                                <th>رقم المعرف</th>
                                <th>الاسم الكامل</th>
                                <th>رقم الهاتف</th>
                                <th>الايميل</th>
                                <th>الرسالة</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->full_name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                                            placeholder="أدخل الرسالة" cols="50" readonly>{{ $contact->message }}</textarea>
                                    </td>
                                    <td>
                                        <div class="btn group">
                                            <button type="button" onclick="performDestroy({{ $contact->id }} , this)"
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
            {{ $contacts->links() }}
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/dashboard/contacts/' + id;
            confirmDestroy(url, referance);
        }
    </script>
@endsection
