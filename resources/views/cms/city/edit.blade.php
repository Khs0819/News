@extends('cms.parent')

@section('title', 'المدينة')

@section('main_title', '')

@section('sub_title', 'تعديل مدينة')


@section('styles')

@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title float-left">تعديل بيانات مدينة</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>الدولة</label>
                                        <select class="form-control select2" id="country_id" name="country_id"
                                            style="width: 100%;">
                                            <option value="{{ $cities->country->id }}" selected>
                                                {{ $cities->country->name }} </option>
                                            @foreach ($countries as $country)
                                                @if ($cities->country->id != $country->id)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">اسم المدينة</label>
                                        <input type="text" value="{{ $cities->name }}" class="form-control" id="name"
                                            name="name" placeholder="ادخل اسم المدينة">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="street">الشارع</label>
                                        <input type="text" value="{{ $cities->street }}" class="form-control" id="street"
                                            name="street" placeholder="ادخل كود المدينة">
                                    </div>
                                </div>


                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick=" performUpdate({{ $cities->id }})"
                                    class="btn btn-primary">تعديل</button>
                                <a href="{{ route('cities.index') }}" type="button" class="btn btn-secondary">الغاء</a>

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
            formData.append('street', document.getElementById('street').value);
            formData.append('country_id', document.getElementById('country_id').value);

            storeRoute('/dashboard/update-cities/' + id, formData);
        }
    </script>
@endsection
