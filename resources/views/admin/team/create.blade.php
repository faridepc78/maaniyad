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
                        <li class="breadcrumb-item"><a href="{{route('team.index')}}">مدیریت اعضای تیم</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('team.create')}}">ایجاد
                                اعضای تیم</a></li>
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
                            <h3 class="card-title">ایجاد اسلایدر ها</h3>
                        </div>

                        <form id="store_team_form" action="{{route('team.store')}}"
                              method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام عضو تیم *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام عضو تیم را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="job">شغل(سمت) عضو تیم *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('job') is-invalid @enderror"
                                           value="{{ old('job') }}" id="job" name="job"
                                           placeholder="لطفا شغل(سمت) عضو تیم را وارد کنید"
                                           autocomplete="job" autofocus>

                                    @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="telegram">تلگرام عضو تیم</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('telegram') is-invalid @enderror"
                                           value="{{ old('telegram') }}" id="telegram" name="telegram"
                                           placeholder="در صورت تمایل تلگرام عضو تیم را وارد کنید"
                                           autocomplete="telegram" autofocus>

                                    @error('telegram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="instagram">اینستاگرام عضو تیم</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('instagram') is-invalid @enderror"
                                           value="{{ old('instagram') }}" id="instagram" name="instagram"
                                           placeholder="در صورت تمایل اینستاگرام عضو تیم را وارد کنید"
                                           autocomplete="instagram" autofocus>

                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="linkedin">لینکدین عضو تیم</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('linkedin') is-invalid @enderror"
                                           value="{{ old('linkedin') }}" id="linkedin" name="linkedin"
                                           placeholder="در صورت تمایل لینکدین عضو تیم را وارد کنید"
                                           autocomplete="linkedin" autofocus>

                                    @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="facebook">فیسبوک عضو تیم</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('facebook') is-invalid @enderror"
                                           value="{{ old('facebook') }}" id="facebook" name="facebook"
                                           placeholder="در صورت تمایل فیسبوک عضو تیم را وارد کنید"
                                           autocomplete="facebook" autofocus>

                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="twitter">تویتر عضو تیم</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('twitter') is-invalid @enderror"
                                           value="{{ old('twitter') }}" id="twitter" name="twitter"
                                           placeholder="در صورت تمایل تویتر عضو تیم را وارد کنید"
                                           autocomplete="twitter" autofocus>

                                    @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">ایمیل عضو تیم</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" id="email" name="email"
                                           placeholder="در صورت تمایل ایمیل عضو تیم را وارد کنید"
                                           autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر عضو تیم *</label>
                                    <input accept=".jpg,.jpeg,.png" type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           autofocus id="image" name="image">

                                    @error('image')
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

        $('#store_team_form').validate({

            rules: {
                name: {
                    required: true
                },

                job: {
                    required: true
                },

                telegram: {
                    checkUrl: true
                },

                instagram: {
                    checkUrl: true
                },

                linkedin: {
                    checkUrl: true
                },

                facebook: {
                    checkUrl: true
                },

                twitter: {
                    checkUrl: true
                },

                email: {
                    email: true
                },

                image: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام عضو تیم را وارد کنید"
                },

                job: {
                    required: "لطفا شغل(سمت) عضو تیم را وارد کنید"
                },

                telegram: {
                    checkUrl: "لطفا تلگرام عضو تیم را صحیح وارد کنید"
                },

                instagram: {
                    checkUrl: "لطفا اینستاگرام عضو تیم را صحیح وارد کنید"
                },

                linkedin: {
                    checkUrl: "لطفا لینکدین عضو تیم را صحیح وارد کنید"
                },

                facebook: {
                    checkUrl: "لطفا فیسبوک عضو تیم را صحیح وارد کنید"
                },

                twitter: {
                    checkUrl: "لطفا تویتر عضو تیم را صحیح وارد کنید"
                },

                email: {
                    email: "لطفا ایمیل عضو تیم را صحیح وارد کنید"
                },

                image: {
                    required: "لطفا تصویر عضو تیم را انتخاب کنید"
                }
            }

        });

    });

</script>
