@section('admin_title')
    <title>پنل مدیریت مانیاد | تیم</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('team.index')}}">مدیریت
                                اعضای تیم</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-3">مدیریت اعضای تیم</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>شغل(سمت)</th>
                                    <th>شبکه های اجتماعی</th>
                                    <th>تصویر</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($team))

                                    @foreach($team as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->job}}</td>

                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#socialTeam{{$value['id']}}">
                                                    <i class="fa fa-eye text-success"></i>
                                                </a>
                                            </td>

                                            <td><img class="img-bordered" style="width: 100px;height: 100px"
                                                     src="{{$value->image->original}}"
                                                     alt="{{$value->image->original}}"></td>
                                            <td>
                                                <a target="_blank" href="{{route('team.edit',$value->id)}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td><a href="{{ route('team.destroy', $value->id) }}"
                                                   onclick="destroyTeam(event, {{ $value->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('team.destroy', $value->id) }}"
                                                      method="post" id="destroy-Team-{{ $value->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade mt-lg-5"
                                             id="socialTeam{{$value['id']}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            شبکه های اجتماعی عضو تیم
                                                            ({{$value->name}})
                                                        </h6>

                                                        <a style="color: red;cursor: pointer"
                                                           data-dismiss="modal" aria-label="Close">
                                                            <i style="color: red" class="fa fa-close"></i>
                                                        </a>

                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="col-md-12 form-row">

                                                            <div class="form-group col-md-6">
                                                                <label for="telegram">
                                                                    تلگرام
                                                                </label>
                                                                <input id="telegram" class="form-control text-left" readonly
                                                                       value="{{$value->telegram}}">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="instagram">
                                                                    اینستاگرام
                                                                </label>
                                                                <input id="instagram" class="form-control text-left" readonly
                                                                       value="{{$value->instagram}}">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-12 form-row">

                                                            <div class="form-group col-md-6">
                                                                <label for="linkedin">
                                                                    لینکدین
                                                                </label>
                                                                <input id="linkedin" class="form-control text-left"
                                                                       readonly value="{{$value->linkedin}}">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="facebook">
                                                                    فیسبوک
                                                                </label>
                                                                <input id="facebook" class="form-control text-left"
                                                                       readonly value="{{$value->facebook}}">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-12 form-row">

                                                            <div class="form-group col-md-6">
                                                                <label for="twitter">
                                                                    تویتر
                                                                </label>
                                                                <input id="twitter" class="form-control text-left"
                                                                       readonly value="{{$value->twitter}}">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="email">
                                                                    ایمیل
                                                                </label>
                                                                <input id="email" class="form-control text-left"
                                                                       readonly value="{{$value->email}}">
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                @else

                                    <div class="alert alert-danger text-center">
                                        <p>اطلاعات این بخش ثبت نشده است</p>
                                    </div>

                                @endif

                            </table>

                        </div>

                        <div class="pagination mt-3">
                            {!! $team->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function destroyTeam(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'آیا از حذف اطمینان دارید ؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgb(221, 51, 51)',
            cancelButtonColor: 'rgb(48, 133, 214)',
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`destroy-Team-${id}`).submit()
            }
        })
    }
</script>
