<style rel="stylesheet" type="text/css">
    .invalid-feedback{
        display: block;
    }
    .help-block{
        margin-top: 80px;
    }

    label.error {
        color: red !important;
        font-size: 14px !important;
        display: block !important;
        margin-top: 5px !important;
        text-align: right !important;
    }
</style>

<div class="comment-respond">
    <h3 class="comment-reply-title">نظر خود را بیان کنید</h3>

    <form id="registerCommentForm" class="comment-form" method="post" action="{{route('blog.register_comment',\Vinkla\Hashids\Facades\Hashids::encode($post['id']))}}">

        @csrf

        <p class="comment-notes">
            <span id="email-notes">ایمیل و تلفن همراه شما منتشر نخواهد شد.</span>
            قسمت های مورد نیاز علامت گذاری شده اند
            <span class="required">*</span>
        </p>

        <p class="comment-form-comment">
            <label for="message">نظر<span class="required">*</span></label>
            <textarea placeholder="لطفا نظر خود را وارد کنید" class="@error('message') is-invalid
                                           @enderror" onkeyup="this.value=removeSpaces(this.value)"
                      autocomplete="message" autofocus name="message"
                      id="message" cols="45" rows="7"
                      maxlength="1000000">{{old('message')}}</textarea>

            @error('message')
            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
            @enderror
        </p>

        <p class="comment-form-email">
            <label for="email">ایمیل <span class="required">*</span></label>
            <input placeholder="لطفا ایمیل خود را وارد کنید" value="{{old('email')}}" onkeyup="this.value=removeSpaces(this.value)" autocomplete="email" autofocus
                   type="text" id="email" class="@error('email') is-invalid
                                           @enderror"
                   name="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
            @enderror
        </p>

        <p class="comment-form-author">
            <label for="name">نام <span class="required">*</span></label>
            <input placeholder="لطفا نام خود را وارد کنید" value="{{old('name')}}" onkeyup="this.value=removeSpaces(this.value)" autocomplete="name" autofocus
                   class="@error('name') is-invalid
                                           @enderror" type="text" id="name" name="name">

            @error('name')
            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
            @enderror
        </p>

        <p class="comment-form-email">
            <label for="site">سایت </label>
            <input value="{{old('site')}}" onkeyup="this.value=removeSpaces(this.value)" autocomplete="site" autofocus
                   type="text" id="site" class="@error('site') is-invalid
                                           @enderror"
                   name="site">

            @error('site')
            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
            @enderror
        </p>

        <p class="comment-form-author">
            <label for="mobile">تلفن همراه <span class="required">*</span></label>
            <input placeholder="لطفا تلفن همراه خود را وارد کنید" value="{{old('mobile')}}" onkeyup="this.value=removeSpaces(this.value)" autocomplete="mobile"
                   autofocus
                   class="@error('mobile') is-invalid
                                           @enderror" type="text" id="mobile" name="mobile">

            @error('mobile')
            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
            @enderror
        </p>

        <div class="row-cols-md-5">
            {!! app('captcha')->display(); !!}
            @if ($errors->has('g-recaptcha-response'))
                <span style="display: block!important;" class="help-block" role="alert">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
            @endif
        </div>

        <p style="@if (!$errors->has('g-recaptcha-response')) margin-top: 100px @else margin-top: 20px @endif" class="form-submit">
            <input type="submit" class="submit" value="ارسال نظر">
        </p>
    </form>
</div>
