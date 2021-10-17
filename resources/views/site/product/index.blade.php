@section('site_title')
    <title>مانیاد | محصول ({{$product['name']}})</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>محصول ({{$product['name']}})</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-details-area ptb-100">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12">
                <div class="product-details-image">
                    <img src="{{$product->image->original}}" alt="image">
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="product-details-desc">
                    <h3>{{$product['name']}}</h3>
                    آلبوم :
                    <a style="color: red" href="{{$product->album->path()}}" class="rating-count">{{$product->album->name}}</a>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="tab products-details-tab">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <ul class="tabs">
                                <li><a href="#">
                                        <div class="dot"></div> توضیحات
                                    </a></li>

                                <li><a href="#">
                                        <div class="dot"></div> ویژگی ها
                                    </a></li>

                                <li><a href="#">
                                        <div class="dot"></div> گالری
                                    </a></li>

                                <li><a href="#">
                                        <div class="dot"></div> نظرات
                                    </a></li>
                            </ul>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="tab_content">

                                @include('site.product.text')

                                @include('site.product.attributes')

                                @include('site.product.gallery')

                                @include('site.product.comments.index')

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.product.related')

</section>

@section('site_js')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?explicit&hl=fa" async defer></script>
@endsection

@include('site.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        $('#registerCommentForm').validate({

            rules: {
                name: {
                    required: true
                },

                email: {
                    required: true,
                    email: true
                },

                mobile: {
                    required: true,
                    checkMobile: true
                },

                site: {
                    checkUrl: true
                },

                message: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام را وارد کنید"
                },

                email: {
                    required: "لطفا ایمیل را وارد کنید",
                    email: "لطفا ایمیل را صحیح را وارد کنید"
                },

                mobile: {
                    required: "لطفا تلفن همراه را وارد کنید",
                    checkMobile: "لطفا تلفن همراه را صحیح وارد کنید"
                },

                site: {
                    checkUrl: "لطفا سایت را صحیح وارد کنید"
                },

                message: {
                    required: "لطفا نظر را وارد کنید"
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
