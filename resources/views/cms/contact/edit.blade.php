
@extends('cms.parent')

@section('title' , 'التواصل')

@section('main_title' , '')

@section('sub_title' , 'تعديل التواصل')


@section('styles')

@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title float-left">تعديل بيانات التواصل</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="full_name">اسم الالتواصل</label>
                        <input type="text" value="{{ $contacts->full_name }}" class="form-control" id="full_name" name="full_name" placeholder="ادخل الاسم الكامل">
                      </div>
                    <div class="form-group col-md-6">
                        <label for="phone">رقم الهاتف</label>
                        <input type="text" value="{{ $contacts->phone }}" class="form-control" id="phone" name="phone" placeholder="ادخل رقم الهاتف">
                      </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email">الايميل</label>
                        <input type="email" value="{{ $contacts->email }}" class="form-control" id="email" name="email" placeholder="ادخل الايميل">
                      </div>
                    <div class="form-group col-md-6">
                        <label for="message"> الرسالة</label>
                        <textarea class="form-control" style="resize: none;" id="message" name="message" rows="4"
                            placeholder="أدخل الرسالة " cols="50">{{ $contacts->message }}</textarea>
                    </div>
                </div>
              </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick=" performUpdate({{ $contacts->id }})" class="btn btn-primary">تعديل</button>
                <a href="{{ route('contacts.index') }}" type="button" class="btn btn-secondary">الغاء</a>

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

            formData.append('full_name', document.getElementById('full_name').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('message', document.getElementById('message').value);

storeRoute('/dashboard/update-contacts/' +id , formData);
}
</script>
@endsection
