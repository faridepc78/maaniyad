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
                        <li class="breadcrumb-item"><a href="{{route('albums.index')}}">مدیریت آلبوم ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('albums.create')}}">ایجاد
                                آلبوم ها</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">ایجاد آلبوم ها</h3>
                        </div>

                        <form id="store_album_form" action="{{route('albums.store')}}"
                              method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام آلبوم *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام آلبوم را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ آلبوم *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug') }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ آلبوم را وارد کنید"
                                           autocomplete="slug" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="parent_id">والد آلبوم</label>
                                    <select class="form-control  @error('parent_id') is-invalid @enderror"
                                            id="parent_id"
                                            name="parent_id">
                                        <option selected disabled value="">والد آلبوم را در صورت تمایل انتخاب کنید
                                        </option>

                                        @if (count($getParents))

                                            @foreach($getParents as $value)

                                                <option
                                                    @if ($value->id==old('parent_id'))
                                                    selected="selected"
                                                    @endif
                                                    value="{{$value->id}}">{{$value->name}}</option>

                                            @endforeach

                                        @endif

                                    </select>

                                    @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر آلبوم</label>
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
                                    <label for="text">توضیحات آلبوم</label>
                                    <textarea rows="10" style="resize: vertical" onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('text') is-invalid @enderror"
                                           id="text" name="text"
                                           placeholder="در صورت تمایل توضیحات آلبوم را وارد کنید"
                                              autocomplete="text" autofocus>{{ old('text') }}</textarea>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
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

        $('#store_album_form').validate({

            rules: {
                name: {
                    required: true
                },

                slug: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام آلبوم را وارد کنید"
                },

                slug: {
                    required: "لطفا اسلاگ آلبوم را وارد کنید"
                }
            }

        });

    });

</script>
