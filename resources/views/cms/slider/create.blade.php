@extends('cms.parent')

@section('title', 'السلايدر')

@section('main_title', '')

@section('sub_title', 'اضافة سلايدر')


@section('styles')

@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title float-left">اضافة بيانات السلايدر</h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="title">عنوان السلايدر</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="ادخل عنوان السلايدر">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">صورة السلايدر</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="Enter Date of Admin">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="description"> الوصف المفصل</label>
                                        <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                                            placeholder="أدخل الوصف " cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="performStore()" class="btn btn-primary">حفظ</button>
                                <a href="{{ route('sliders.index') }}" type="button" class="btn btn-secondary">رجوع</a>

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
            formData.append('title', document.getElementById('title').value);
            formData.append('description', document.getElementById('description').value);
            formData.append('image', document.getElementById('image').files[0]);

            store('/dashboard/sliders', formData);
        }
    </script>

@endsection
