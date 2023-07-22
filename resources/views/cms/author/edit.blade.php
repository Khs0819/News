@extends('cms.parent')

@section('title', 'الناشرين')

@section('sub-title', 'تعديل ناشر')

@section('styles')

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title float-left">تعديل بيانات ناشر</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>

                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="first_name">الأسم الأول</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            value="{{ $authors->user->first_name }}" placeholder="أدخل الاسم الأول">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="last_name">الأسم الاخير</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            value="{{ $authors->user->last_name }}" placeholder="أدخل الاسم الأخير">
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="email">الايميل</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $authors->email }}" placeholder="أدخل الايميل">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>المدينة</label>
                                        <select class="form-control select2" id="city_id" name="city_id"
                                            style="width: 100%;">
                                            <option selected value="{{ $authors->user->city->id }}">
                                                {{ $authors->user->city->name }} </option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="mobile">رقم الهاتف</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            value="{{ $authors->user->mobile }}" placeholder="أدخل رقم الهاتف">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="address">العنوان</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $authors->user->address }}" placeholder="أدخل العنوان">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="status"> Status</label>
                                        <select class="form-select form-select-sm" name="status" style="width: 100%;"
                                            id="status" aria-label=".form-select-sm example">
                                            <option selected> {{ $authors->user->status }} </option>
                                            <option value="فعال">فعال </option>
                                            <option value="غير فعال">غير فعال</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="gender">الجنس</label>
                                        <select class="form-select form-select-sm" name="gender" style="width: 100%;"
                                            id="gender" aria-label=".form-select-sm example">
                                            <option selected> {{ $authors->user->gender }} </option>
                                            <option value="ذكر">ذكر </option>
                                            <option value="أنثى">أنثى </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="image">الصورة الشخصية</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="Enter Date of Admin">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="date">تاريخ الميلاد </label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            value="{{ $authors->user->date }}" placeholder="أدخل تاريخ الميلاد">
                                    </div>

                                </div>



                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="button" onclick="performUpdate({{ $authors->id }})"
                                        class="btn btn-primary">تعديل</button>
                                    <a href="{{ route('authors.index') }}" type="button" class="btn btn-info">الرجوع</a>

                                </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->


                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('scripts')
    <script>
        function performUpdate(id) {

            let formData = new FormData();
            formData.append('first_name', document.getElementById('first_name').value);
            formData.append('last_name', document.getElementById('last_name').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('city_id', document.getElementById('city_id').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('image', document.getElementById('image').files[0]);

            storeRoute('/dashboard/update-authors/' + id, formData);
        }
    </script>
@endsection
