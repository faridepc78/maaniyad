@section('site_title')
    <title>مانیاد | درخواست نمایندگی فروش</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>درخواست نمایندگی فروش</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="contact-area ptb-100">
    <div class="container">

        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="contact-form">

                    <form id="AgencyForm" method="post" action="{{route('agency-send')}}">

                        @csrf

                        <div class="row">

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('company_name')}}" autocomplete="company_name" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="company_name" id="company_name"
                                           class="form-control @error('company_name') is-invalid
                                           @enderror" placeholder="نام فروشگاه یا شرکت *">

                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('name')}}" autocomplete="name" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="name" id="name" class="form-control @error('name') is-invalid
                                           @enderror" placeholder="نام مالک یا مدیر *">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('site')}}" autocomplete="site" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="site" id="site" class="form-control @error('site') is-invalid
                                           @enderror" placeholder="سایت فروشگاه">

                                    @error('site')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('province')}}" autocomplete="province" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="province" id="province"
                                           class="form-control @error('province') is-invalid
                                           @enderror" placeholder="استان *">

                                    @error('province')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('city')}}" autocomplete="city" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="city" id="city" class="form-control @error('city') is-invalid
                                           @enderror" placeholder="شهر *">

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('experience')}}" autocomplete="experience" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="experience" id="experience"
                                           class="form-control @error('experience') is-invalid
                                           @enderror" placeholder="سابقه فعالیت به سال *">

                                    @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('area')}}" autocomplete="area" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="area" id="area" class="form-control @error('area') is-invalid
                                           @enderror" placeholder="متراژ فروشگاه یا نمایشگاه فروش">

                                    @error('area')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('main_brands')}}" autocomplete="main_brands" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="main_brands" id="main_brands"
                                           class="form-control @error('main_brands') is-invalid
                                           @enderror" placeholder="برند های حوضه کاغذ دیواری">

                                    @error('main_brands')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('other_brands')}}" autocomplete="other_brands" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="other_brands" id="other_brands"
                                           class="form-control @error('other_brands') is-invalid
                                           @enderror" placeholder="برندهای سایر حوزه های تزیینات داخلی">

                                    @error('other_brands')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('instagram')}}" autocomplete="instagram" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="instagram" id="instagram"
                                           class="form-control @error('instagram') is-invalid
                                           @enderror" placeholder="صفحه اینستاگرام">

                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('telegram')}}" autocomplete="telegram" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="telegram" id="telegram"
                                           class="form-control @error('telegram') is-invalid
                                           @enderror" placeholder="کانال تلگرام">

                                    @error('telegram')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('email')}}" autocomplete="email" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)" type="text" name="email"
                                           id="email" class="form-control @error('email') is-invalid
                                           @enderror"
                                           placeholder="ایمیل">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('phone')}}" autocomplete="phone" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid
                                           @enderror" placeholder="تلفن ثابت *">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('mobile')}}" autocomplete="address" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid
                                           @enderror" placeholder="تلفن همراه *">

                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input value="{{old('address')}}" autocomplete="address" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="address" id="address" class="form-control @error('address') is-invalid
                                           @enderror" placeholder="آدرس فروشگاه یا شرکت *">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group mr-2 mt-4">
                                    {!! app('captcha')->display(); !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block" role="alert">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn">ارسال پیام <span></span></button>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            @include('site.layout.common')

        </div>
    </div>

    <div class="bg-map"><img src="{{asset('assets/frontend/images/bg-map.png')}}" alt="image"></div>
</section>

@section('site_js')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?explicit&hl=fa" async defer></script>
@endsection

@include('site.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        $('#AgencyForm').validate({

            rules: {
                company_name: {
                    required: true
                },

                name: {
                    required: true
                },

                site: {
                    checkUrl: true
                },

                province: {
                    required: true
                },

                city: {
                    required: true
                },

                experience: {
                    required: true,
                    number: true
                },

                address: {
                    required: true
                },

                phone: {
                    required: true
                },

                mobile: {
                    required: true,
                    checkMobile: true
                },

                email: {
                    email: true
                }
            },

            messages: {
                company_name: {
                    required: "لطفا نام فروشگاه یا شرکت را وارد کنید"
                },

                name: {
                    required: "لطفا نام مالک یا مدیر را وارد کنید"
                },

                site: {
                    checkUrl: "لطفا سایت را صحیح وارد کنید"
                },

                province: {
                    required: "لطفا استان را وارد کنید"
                },

                city: {
                    required: "لطفا شهر را وارد کنید"
                },

                experience: {
                    required: "لطفا سابقه فعالیت به سال را وارد کنید",
                    number: "لطفا سابقه فعالیت به سال را صحیح وارد کنید"
                },

                address:{
                    required: "لطفا آدرس فروشگاه یا شرکت را وارد کنید"
                },

                phone: {
                    required: "لطفا تلفن ثابت را وارد کنید",
                },

                mobile: {
                    required: "لطفا تلفن همراه را وارد کنید",
                    checkMobile: "لطفا تلفن همراه را صحیح وارد کنید"
                },

                email: {
                    email: "لطفا ایمیل را صحیح را وارد کنید"
                }
            },
            submitHandler: function (form) {
                if (grecaptcha.getResponse()) {
                    form.submit();
                } else {
                    toastr['info']('لطفا ریکپچا را کامل کنید', 'پیام');
                }
            }

        });

    });

</script>
