@section('admin_title')
    <title>پنل مدیریت مانیاد | درخواست ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('agencies.index')}}">مدیریت درخواست ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('agencies.single',$agency->id)}}">مشاهده
                                درخواست ({{$agency->name}})</a></li>
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
                            <h3 class="card-title">مشاهده درخواست ({{$agency->name}})</h3>
                        </div>

                        <div class="card-body">

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="company_name">نام فروشگاه یا شرکت</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->company_name }}" id="company_name">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name">نام مالک یا مدیر</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->name }}" id="name">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="site">سایت فروشگاه</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->site }}" id="site">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="province">استان</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->province }}" id="province">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="city">شهر</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->city }}" id="city">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="experience">سابقه فعالیت به سال</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->experience }}" id="experience">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="area">متراژ فروشگاه یا نمایشگاه فروش</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->area }}" id="area">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="main_brands">برندهای حوزه کاغذ دیواری</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->main_brands }}" id="main_brands">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="other_brands">برندهای سایر حوزه های تزیینات داخلی</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->other_brands }}" id="other_brands">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="instagram">صفحه اینستاگرام</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->instagram }}" id="instagram">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="telegram">کانال تلگرام</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->telegram }}" id="telegram">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="phone">تلفن ثابت</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->phone }}" id="phone">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="mobile">تلفن همراه</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->mobile }}" id="mobile">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="email">ایمیل</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $agency->email }}" id="email">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="type">وضعیت</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="@lang($agency->type)" id="type">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="address">آدرس فروشگاه یا شرکت</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{$agency['address']}}" id="address">
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('admin.layout.footer')
