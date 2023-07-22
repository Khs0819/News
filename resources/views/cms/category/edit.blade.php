@extends('cms.parent')

@section('title', 'الفئات')

@section('main_title', '')

@section('sub_title', 'تعديل فئة')

@section('styles')

@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title float-left">تعديل بيانات فئة</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">اسم الفئة</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $categories->name }}" placeholder="ادخل اسم الدولة" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">الحالة</label>
                                        <select class="form-select form-select-sm" name="status" style="width: 100%;"
                                            id="status" aria-label=".form-select-sm example">
                                            <option selected> {{ $categories->status }} </option>
                                            @if ('فعال'== $categories->status) <option value="غير فعال">غير فعال </option> @endif
                                            @if ('غير فعال'== $categories->status) <option value="فعال"> فعال </option> @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">وصف الفئة</label>
                                            <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                                                placeholder="أدخل وصف الفئة" cols="50">{{ $categories->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick=" performUpdate({{ $categories->id }})"
                                    class="btn btn-primary">تعديل</button>
                                <a href="{{ route('categories.index') }}" type="button" class="btn btn-secondary">الغاء</a>

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
        function performUpdate(id) {

            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('description', document.getElementById('description').value);

            storeRoute('/dashboard/update-categories/' + id, formData);
        }
    </script>
@endsection
