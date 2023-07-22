@extends('cms.parent')

@section('title', 'المدن')

@section('main_title', '')

@section('sub_title', 'اضافة مدينة')


@section('styles')

@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title float-left">اضافة بيانات المدينة</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="country_id">الدولة</label>
                                        <select class="form-control select2" id='country_id' name='country_id'
                                            style="width: 100%;">
                                            {{-- <option selected="selected">Alabama</option> --}}
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">اسم المدينة</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="ادخل اسم المدينة">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="street">الشارع</label>
                                        <input type="text" class="form-control" id="street" name="street"
                                            placeholder="ادخل اسم الشارع">
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="performStore()" class="btn btn-primary">حفظ</button>
                                <a href="{{ route('cities.index') }}" type="button" class="btn btn-secondary">رجوع</a>

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
            formData.append('street', document.getElementById('street').value);
            formData.append('country_id', document.getElementById('country_id').value);

            store('/dashboard/cities', formData);
        }
    </script>

@endsection
