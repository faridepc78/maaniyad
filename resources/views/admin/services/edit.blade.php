@section('admin_title')
    <title>پنل مدیریت مانیاد | خدمات</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('services.index')}}">مدیریت خدمات</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('services.edit',$service->id)}}">ویرایش
                                خدمت ({{$service->name}})</a></li>
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
                            <h3 class="card-title">ویرایش خدمت ({{$service->name}})</h3>
                        </div>

                        <form id="update_service_form" action="{{route('services.update',$service->id)}}"
                              method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام خدمت *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$service->name) }}" id="name" name="name"
                                           placeholder="لطفا نام خدمت را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ خدمت *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug',$service->slug) }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ خدمت را وارد کنید"
                                           autocomplete="slug" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="icon">آیکون خدمت *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('icon') is-invalid @enderror"
                                           value="{{ old('icon',$service->icon) }}" id="icon" name="icon"
                                           placeholder="لطفا آیکون خدمت را وارد کنید"
                                           autocomplete="icon" autofocus>

                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bio">بیو خدمت *</label>
                                    <textarea onkeyup="this.value=removeSpaces(this.value)"
                                              placeholder="لطفا بیو خدمت را وارد کنید" rows="5" style="resize: vertical"
                                              class="form-control @error('bio') is-invalid @enderror"
                                              id="bio"
                                              name="bio" autocomplete="bio"
                                              autofocus>{{ old('bio',$service->bio) }}</textarea>

                                    @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر خدمت</label>

                                    <img class="img-bordered" style="width: 150px;height: 150px"
                                         src="{{$service->image->original}}"
                                         alt="{{$service->image->original}}">

                                    <input accept=".jpg,.jpeg,.png" type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           autofocus id="image" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">توضیحات خدمت *</label>
                                    <textarea class="form-control ckeditor @error('text') is-invalid @enderror"
                                              id="text"
                                              name="text" autocomplete="text"
                                              autofocus>{{ old('text',$service->text) }}</textarea>

                                    @error('text')
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

@section('admin_js')
    <script type="text/javascript" src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        var text_field = 'text';
        var text_error = 'لطفا توضیحات خدمت را وارد کنید';

        $('#update_service_form').validate({

            rules: {
                name: {
                    required: true
                },

                slug: {
                    required: true
                },

                icon: {
                    required: true
                },

                bio: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام خدمت را وارد کنید"
                },

                slug: {
                    required: "لطفا اسلاگ خدمت را وارد کنید"
                },

                icon: {
                    required: "لطفا آیکون خدمت را وارد کنید"
                },

                bio: {
                    required: "لطفا بیو خدمت را وارد کنید"
                }
            },
            submitHandler: function (form) {
                if (validateCkeditor(text_field, text_error) === true) {
                    form.submit();
                }
            }

        });

    });

</script>
