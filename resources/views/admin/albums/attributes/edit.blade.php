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
                                                       href="{{route('albums.attributes.edit',[$album->id,$attribute->id])}}">ویرایش
                                ویژگی ({{$attribute->name}}) - آلبوم ({{$album->name}})</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-success">

                        <div class="card-header">
                            <h3 class="card-title">ویرایش
                                ویژگی ({{$attribute->name}}) - آلبوم ({{$album->name}})</h3>
                        </div>

                        <form id="update_album_attribute_form" action="{{route('albums.attributes.update',[$album->id,$attribute['id']])}}"
                              method="post">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام ویژگی آلبوم *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$attribute->name) }}" id="name" name="name"
                                           placeholder="لطفا نام ویژگی آلبوم را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">بروزرسانی</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        $('#update_album_attribute_form').validate({

            rules: {
                name: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام ویژگی آلبوم را وارد کنید"
                }
            }

        });

    });

</script>
