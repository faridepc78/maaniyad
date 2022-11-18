@section('site_title')
    <title>مانیاد | تماس با ما</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>تماس با ما</h2>
                    <p>اگر ایده ای دارید ، می خواهیم در مورد آن بشنویم.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="contact-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">ارسال پیام</span>
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="contact-form">

                    <form id="contactUsForm" method="post" action="{{route('contact-us-send')}}">

                        @csrf

                        <div class="row">

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('name')}}" autocomplete="name" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)"
                                           type="text" name="name" id="name" class="form-control @error('name') is-invalid
                                           @enderror" placeholder="نام *">

                                    @error('name')
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
                                           placeholder="ایمیل *">

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
                                           onkeyup="this.value=removeSpaces(this.value)" type="text" name="phone"
                                           id="phone" class="form-control @error('phone') is-invalid
                                           @enderror"
                                           placeholder="تلفن همراه *">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input value="{{old('subject')}}" autocomplete="subject" autofocus
                                           onkeyup="this.value=removeSpaces(this.value)" type="text" name="subject"
                                           id="subject" class="form-control @error('subject') is-invalid
                                           @enderror"
                                           placeholder="موضوع *">

                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea onkeyup="this.value=removeSpaces(this.value)" autocomplete="text"
                                              autofocus name="text" class="form-control @error('text') is-invalid
                                           @enderror" id="text" cols="30" rows="6"
                                              placeholder="پیام *">{{old('text')}}</textarea>

                                    @error('text')
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

        $('#contactUsForm').validate({

            rules: {
                name: {
                    required: true
                },

                email: {
                    required: true,
                    email:true
                },

                phone: {
                    required: true,
                    checkMobile: true
                },

                subject: {
                    required: true
                },

                text: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام را وارد کنید"
                },

                email: {
                    required: "لطفا ایمیل را وارد کنید",
                    email:"لطفا ایمیل را صحیح را وارد کنید"
                },

                phone: {
                    required: "لطفا تلفن همراه را وارد کنید",
                    checkMobile: "لطفا تلفن همراه را صحیح وارد کنید"
                },

                subject: {
                    required: "لطفا موضوع را وارد کنید"
                },

                text: {
                    required: "لطفا پیام را وارد کنید"
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
