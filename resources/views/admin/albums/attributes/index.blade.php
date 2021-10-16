@section('admin_title')
    <title>پنل مدیریت مانیاد | ویژگی آلبوم ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('albums.index')}}">مدیریت
                                آلبوم ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('albums.attributes.index',$album['id'])}}">مدیریت
                                ویژگی های آلبوم ({{$album->name}})</a></li>
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
                            <h3 class="card-title mb-3">مدیریت ویژگی های آلبوم ({{$album->name}})</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($attributes))

                                    @foreach($attributes as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>

                                            <td>
                                                <a target="_blank"
                                                   href="{{route('albums.attributes.edit',[$album['id'],$value->id])}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('albums.attributes.destroy', [$album['id'],$value->id]) }}"
                                                   onclick="destroyAlbumAttribute(event,{{ $album['id'] }}, {{ $value->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form
                                                    action="{{ route('albums.attributes.destroy', [$album['id'],$value->id]) }}"
                                                    method="post"
                                                    id="destroy-AlbumAttribute-{{ $album['id'] }}-{{ $value->id }}">
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
                            {!! $attributes->links() !!}
                        </div>

                        <div class="card-footer">
                            <a target="_blank" href="{{route('albums.attributes.create',[$album['id']])}}" class="btn btn-primary">ایجاد ویژگی های آلبوم ({{$album['name']}})</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">

    function destroyAlbumAttribute(event, album_id, id) {
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
                document.getElementById(`destroy-AlbumAttribute-${album_id}-${id}`).submit()
            }
        })
    }
</script>
