<style rel="stylesheet" type="text/css">
    .invalid-feedback{
        display: block;
    }

    label.error {
        color: red !important;
        font-size: 14px !important;
        display: block !important;
        margin-top: 5px !important;
        text-align: right !important;
    }
</style>

<div class="review-form">
    <h3>یک نظر بنویسید</h3>

    <form id="registerCommentForm" class="comment-form" method="post" action="{{route('product.register_comment',\Vinkla\Hashids\Facades\Hashids::encode($product['id']))}}">

        @csrf

        <p class="comment-notes">
            <span id="email-notes">ایمیل و تلفن همراه شما منتشر نخواهد شد.</span>
            قسمت های مورد نیاز علامت گذاری شده اند
            <span class="required">*</span>
        </p>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="name">نام <span class="required">*</span></label>
                    <input placeholder="لطفا نام خود را وارد کنید" value="{{old('name')}}" onkeyup="this.value=removeSpaces(this.value)" autocomplete="name" autofocus
                           class="form-control @error('name') is-invalid
                                           @enderror" type="text" id="name" name="name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="email">ایمیل <span class="required">*</span></label>
                    <input placeholder="لطفا ایمیل خود را وارد کنید" value="{{old('email')}}" onkeyup="this.value=removeSpaces(this.value)" autocomplete="email" autofocus
                           type="text" id="email" class="form-control @error('email') is-invalid
                                           @enderror"
                           name="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="mobile">تلفن همراه <span class="required">*</span></label>
                    <input placeholder="لطفا تلفن همراه خود را وارد کنید" value="{{old('mobile')}}" onkeyup="this.value=removeSpaces(this.value)" autocomplete="mobile"
                           autofocus
                           class="form-control @error('mobile') is-invalid
                                           @enderror" type="text" id="mobile" name="mobile">

                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="site">سایت </label>
                    <input value="{{old('site')}}" onkeyup="this.value=removeSpaces(this.value)" autocomplete="site" autofocus
                           type="text" id="site" class="form-control @error('site') is-invalid
                                           @enderror"
                           name="site">

                    @error('site')
                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label for="message">نظر<span class="required">*</span></label>
                    <textarea placeholder="لطفا نظر خود را وارد کنید" class="form-control @error('message') is-invalid
                                           @enderror" onkeyup="this.value=removeSpaces(this.value)"
                              autocomplete="message" autofocus name="message"
                              id="message" cols="45" rows="7"
                              maxlength="1000000">{{old('message')}}</textarea>

                    @error('message')
                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12">

                {!! app('captcha')->display(); !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span style="display: block!important;" class="help-block" role="alert">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                @endif

            </div>

            <div class="col-lg-12 col-md-12">
                <button type="submit" class="default-btn">ارسال نظر <span></span></button>
            </div>
        </div>
    </form>
</div>
