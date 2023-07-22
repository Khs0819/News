
@extends('cms.parent')

@section('title' , 'الدولة')

@section('main_title' , '')

@section('sub_title' , 'تعديل دولة')


@section('styles')

@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title float-left">تعديل بيانات دولة</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">اسم الدولة</label>
                  <input type="text" value="{{ $countries->name }}" class="form-control" id="name" name="name" placeholder="ادخل اسم الدولة">
                </div>
                <div class="form-group">
                  <label for="code">الكود</label>
                  <input type="text" value="{{ $countries->code }}" class="form-control" id="code" name="code" placeholder="ادخل كود الدولة">
                </div>

              </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick=" performUpdate({{ $countries->id }})" class="btn btn-primary">تعديل</button>
                <a href="{{ route('countries.index') }}" type="button" class="btn btn-secondary">الغاء</a>

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

function performUpdate(id){

let formData = new FormData();

formData.append('name',document.getElementById('name').value);
formData.append('code',document.getElementById('code').value);

storeRoute('/dashboard/update-countries/' +id , formData);
}
</script>
@endsection
