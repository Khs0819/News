@extends('cms.parent')

@section('title', 'الدول')

@section('main_title', '')

@section('sub_title', 'اضافة دولة')


@section('styles')

@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title float-left">اضافة بيانات الدولة</h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">اسم الدولة</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="ادخل اسم الدولة">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="code">الكود</label>
                                        <input type="text" class="form-control" id="code" name="code"
                                            placeholder="ادخل كود الدولة">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="performStore()" class="btn btn-primary">حفظ</button>
                                <a href="{{ route('countries.index') }}" type="button" class="btn btn-secondary">رجوع</a>

                            </div>
                        </form>
                    </div>




                </div>


            </div>

        </div>
    </section>
@endsection

@section('scripts')

    <script>
        function performStore() {

            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('code', document.getElementById('code').value);

            store('/dashboard/countries', formData);
        }
    </script>

@endsection
