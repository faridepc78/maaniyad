@section('site_title')
    <title>مانیاد | پست ({{$post->name}})</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>وبلاگ جداگانه</h2>
                    <p>با کارشناسان خلاق ما ملاقات کنید</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="blog-details-desc">
                    <div class="article-image">
                        <img src="{{$post->image->original}}" alt="{{$post->image->original}}">
                    </div>

                    <div class="article-content">
                        <div class="entry-meta">
                            <ul>
                                <li>
                                    <span>ارسال شده در:</span> {{\Morilog\Jalali\CalendarUtils::strftime('j F Y',$post->created_at)}}
                                </li>
                                <li><span>ارسال شده توسط:</span> مدیر سایت</li>
                            </ul>
                        </div>

                        {!! $post->text !!}
                    </div>

                    <div class="article-footer">
                        <div class="article-tags">
                            <span><i class="fas fa-bookmark"></i></span>
                            دسته بندی:
                            <a href="{{$post->category->path()}}">{{$post->category->name}}</a>
                        </div>

                        <div class="article-share">
                            <ul class="social">
                                <li><span>اشتراک گذاری:</span></li>
                                <li><a href="https://telegram.me/share/url?url={{$post->path()}}" target="_blank"><i
                                            class="fa fa-telegram"></i></a></li>
                                <li><a href="https://www.instagram.com/?url={{$post->path()}}" target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{$post->path()}}" target="_blank"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/sharer.php?u={{$post->path()}}" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?url={{$post->path()}}"
                                       target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    @include('site.blog.post.comments.index')

                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <aside class="widget-area" id="secondary">

                    @include('site.blog.common.search')

                    <section class="widget widget_zovio_posts_thumb">
                        <h3 class="widget-title">پست های مشابه</h3>

                        @if (count($related_posts))

                            @foreach($related_posts as $value)

                                <article class="item">
                                    <a href="{{$value->path()}}" class="thumb">
                                        <span style="background-image: url('{{$value->image->original}}')"
                                              class="fullimage cover" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <time>{{\Morilog\Jalali\CalendarUtils::strftime('j F Y',$value->created_at)}}</time>
                                        <h4 class="title usmall"><a href="{{$value->path()}}">{{$value->name}}</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>

                            @endforeach

                        @endif

                    </section>

                    @include('site.blog.common.categories')

                </aside>
            </div>

        </div>
    </div>
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
