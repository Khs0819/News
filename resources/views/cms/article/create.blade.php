@extends('cms.parent')

@section('title', 'المقالات')

@section('main_title', '')

@section('sub_title', 'اضافة مقال')


@section('styles')

@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title float-left">اضافة بيانات مقال</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">

                                <input type="text" name="author_id" id="author_id" value="{{ $id }}"
                                    class="form-control form-control-solid" hidden />

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="category_id">الفئة</label>
                                        <select class="form-control select2" id='category_id' name='category_id'
                                            style="width: 100%;">
                                            {{-- <option selected="selected">Alabama</option> --}}
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">صورة المقال</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="Enter Date of Admin">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="title">عنوان المقال</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="ادخل عنوان المقال">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="short_description">الوصف المختصر</label>
                                        <input type="text" class="form-control" id="short_description"
                                            name="short_description" placeholder="ادخل الوصف المختصر">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="full_description"> الوصف المفصل</label>
                                        <textarea class="form-control" style="resize: none;" id="full_description" name="full_description" rows="4"
                                            placeholder="أدخل الوصف المفصل للمقال" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="performStore()" class="btn btn-primary">حفظ</button>
                                <a href="{{ route('indexArticle', $id) }}" type="button" class="btn btn-secondary">رجوع</a>

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
            formData.append('short_description', document.getElementById('short_description').value);
            formData.append('full_description', document.getElementById('full_description').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('category_id', document.getElementById('category_id').value);
            formData.append('author_id', document.getElementById('author_id').value);

            store('/dashboard/articles', formData);
        }
    </script>

@endsection
