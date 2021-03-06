@section('admin_title')
    <title>پنل مدیریت مانیاد | آلبوم ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('albums.index')}}">مدیریت
                                آلبوم ها</a></li>
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
                            <h3 class="card-title mb-3">مدیریت آلبوم ها</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>اسلاگ</th>
                                    <th>زیر دسته ها</th>
                                    <th>تصویر</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($albums))

                                    @foreach($albums as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->slug}}</td>

                                            @if (count($value->sub))
                                                <td>
                                                    <a href="{{route('albums.show',$value->id)}}">
                                                        <i class="fa fa-eye text-success"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td><i class="fa fa-close text-warning"></i></td>
                                            @endif

                                            <td>
                                                @if (!empty($value->image->files))
                                                    <img class="img-size-64" src="{{$value->image->original}}"
                                                         alt="{{$value->image->original}}">
                                                @else
                                                    <p class="text text-danger">ندارد</p>
                                                @endif
                                            </td>

                                            <td>
                                                <a target="_blank" href="{{route('albums.edit',$value->id)}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td><a href="{{ route('albums.destroy', $value->id) }}"
                                                   onclick="destroyAlbum(event, {{ $value->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('albums.destroy', $value->id) }}"
                                                      method="post" id="destroy-Album-{{ $value->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach

                                @else

                                    <div class="alert alert-danger text-center">
                                        <p>اطلاعات این بخش ثبت نشده است</p>
                                    </div>

                                @endif

                            </table>

                        </div>

                        <div class="pagination mt-3">
                            {!! $albums->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">

    function destroyAlbum(event, id) {
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
                document.getElementById(`destroy-Album-${id}`).submit()
            }
        })
    }
</script>
