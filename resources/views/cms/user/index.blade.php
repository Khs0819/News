@extends('dashboard.parent')

@section('title', 'الطلاب ')

@section('left-title', 'عرض الطلاب ')

@section('active title', 'عرض الطلاب ')


@section('styles')
    <style>

    </style>
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title"> عرض الطلاب </h3> --}}

                            <div class="card-tools">
                                <form action="" method="get">
                                    <div class="row">
                                        <div class="input-icon col-md-2">
                                            <input type="text" class="form-control" placeholder="بحث باستخدام الاسم"
                                                name='name_ar'
                                                @if (request()->name_ar) value={{ request()->name_ar }} @endif />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" placeholder="البحث باستخدام الحالة "
                                                name='status'
                                                @if (request()->status) value={{ request()->status }} @endif />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>

                                        <div class="input-icon col-md-2">
                                            <input type="text" class="form-control" placeholder=" 1-2-3-4 رقم المجموعة"
                                                name='group_id'
                                                @if (request()->group_id) value={{ request()->group_id }} @endif />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                        <div class="input-icon col-md-2">
                                            <input type="text" class="form-control" placeholder="بحث باستخدام رقم الجوال"
                                                name='mobile1'
                                                @if (request()->mobile1) value={{ request()->mobile1 }} @endif />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>

                                        <div class="input-icon col-md-2">
                                            <input type="year" class="form-control" placeholder=" سنة التسجيل"
                                                name='created_at'
                                                @if (request()->created_at) value={{ request()->created_at }} @endif />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>

                                        <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                                        <a href="{{ route('users.index') }}" class="btn btn-danger">إنهاء البحث</a>

                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <div class="col-md-5 col-4">

                                        <a href="{{ route('users.create') }}"><button type="button"
                                                class="btn  btn-primary">انشاء طالب جديد </button></a>
                                        <a href="{{ route('user-exports-excel') }}"><button type="button"
                                                class="btn  btn-success">تصدير إكسيل </button></a>

                                    </div>

                                </form>
                                {{-- <a href="{{route('users.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء طالب جديد </button></a> --}}
                            </div>
                            <br>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                                <thead>
                                    <tr class="bg-info">
                                        <th> رقم الطالب </th>
                                        <th> اسم الطالب </th>
                                        <th> تاريخ الميلاد </th>
                                        <th> الحالة </th>
                                        <th> اسم المجموعة </th>
                                        <th> الأيميل </th>
                                        <th> التقيم </th>
                                        <th> رقم الجوال </th>
                                        <th> أحوال الطلاب </th>

                                        <th> الاعدادات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        {{-- @foreach ($user->group as $groups) --}}

                                        <tr>
                                            <td>
                                                <span class="badge bg-yellow"> {{ $user->group_name }}
                                                    {{ now()->year }}-{{ $user->id }}
                                            </td>
                                            {{-- <td>{{$user->who}}</td> --}}
                                            {{-- <td>
                                     <img class="img-circle img-bordered-sm" src="{{asset('images/admin_who/'.$user->image_who)}}" width="60" height="60" alt="User Image">
                                    </td> --}}
                                            <td>{{ $user->name_ar }}</td>
                                            <td>{{ $user->date_of_birth }}</td>
                                            <td>
                                                @if ($user->status == 'active')
                                                    <span class="badge badge-primary"> نشيط</span>
                                                @elseif ($user->status == 'blackList')
                                                    <span class="badge badge-secondary">قائمة سوادء</span>
                                                @elseif ($user->status == 'finished')
                                                    <span class="badge badge-success">خريج</span>
                                                @endif
                                            </td>
                                            <td><span class="badge bg-yellow"> {{ $user->group_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="{{ route('indexuser', ['id' => $user->id]) }}"
                                                    class="btn btn-success">({{ $user->user_evaluations_count }})
                                                    التقيم</a>
                                            </td>
                                            <td>{{ $user->mobile1 }}</td>
                                            <td><a href="{{ route('indexCondition', ['id' => $user->id]) }}"
                                                    class="btn btn-info">({{ $user->condition_count }})
                                                    حالة بيان الطالب</a> </td>


                                            <td>
                                                <div class="btn">
                                                    <button type="button" class="btn btn-primary  dropdown-toggle"
                                                        data-toggle="dropdown">الإعدادات</button>
                                                    <div class="dropdown-menu" role="menu">
                                                        @can('Edit-user')
                                                            <a class="dropdown-item"
                                                                href="{{ route('users.edit', $user->id) }}"><i
                                                                    class="far fa-edit ml-2"></i>تعديل</a>
                                                        @endcan
                                                        @can('Show-user')
                                                            <a class="dropdown-item"
                                                                href="{{ route('users.show', $user->id) }}"><i
                                                                    class=" fas fa-info ml-2"></i>تفاصيل الطالب</a>
                                                        @endcan
                                                        {{-- <a class="dropdown-item" href="{{route('conditions.index',$user->id)}}"><i class="fas fa-eye ml-2"></i>عرض بيان الطالب</a> --}}

                                                        @can('Delete-user')
                                                            <a class="dropdown-item"
                                                                onclick="performDestroy({{ $user->id }},this)"
                                                                href="#"><i class="fas fa-trash-alt ml-2"></i>حذف</a>
                                                        @endcan
                                                    </div>
                                                </div>
                                                {{-- <div class="btn">
                      <a href="{{route('users.edit',$user->id)}}" class="btn btn-info" title="Edit">
                                        تعديل
                                        </a>

                                        <a href="#" onclick="performDestroy({{$user->id}}, this)" class="btn btn-danger" title="Delete">
                                            حذف
                                        </a>

                                        <a href="{{route('users.show',$user->id)}}" class="btn btn-success" title="Show">
                                            معلومات
                                        </a>
                    </div> --}}
                        </div>

                        </td>
                        </tr>
                        @endforeach
                        {{-- @endforeach --}}

                        </tbody>
                        </table>

                        <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
                            </span>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script>
        function performDestroy(id, reference) {
            let url = '/dashboard/users/' + id;
            confirmDestroy(url, reference);
        }
    </script>
@endsection
