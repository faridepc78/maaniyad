<div class="tabs_item">
    <div class="products-details-tab-content">
        <div class="product-review-form">

            @include('site.product.comments.form')

            <div class="comments-area">
                <h3 class="comments-title">{{$count_comments}} نظر:</h3>

                <ol class="comment-list">

                    @if (count($comments))

                        @foreach($comments as $value)

                            <li class="comment" style="border: 1px dotted gray">

                                <article class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="{{$value->gravatar}}" class="avatar" alt="{{$value->gravatar}}">
                                            <b class="fn">{{$value->name}}</b>
                                            <span class="says">می گوید:</span>
                                        </div>

                                        <div class="comment-metadata">
                                            <time>{{\Morilog\Jalali\CalendarUtils::strftime('j F Y || H:i:s', strtotime($value['created_at']))}}</time>
                                        </div>
                                        <p>{{$value['site']}}</p>
                                    </footer>

                                    <div class="comment-content">
                                        <p>{{$value['message']}}</p>
                                    </div>
                                </article>

                                @if ($value['answer']!=null || !empty($value['answer']))
                                    <ol class="children">
                                        <li class="comment">
                                            <article class="comment-body">
                                                <footer class="comment-meta">
                                                    <div class="comment-author vcard">
                                                        <img src="{{$value->admin_profile}}" class="avatar"
                                                             alt="{{$value->admin_profile}}">
                                                        <b class="fn">{{$value['admin_name']}}</b>
                                                        <span class="says">می گوید:</span>
                                                    </div>

                                                    <div class="comment-metadata">
                                                        <time>{{\Morilog\Jalali\CalendarUtils::strftime('j F Y || H:i:s', strtotime($value['updated_at']))}}</time>
                                                    </div>
                                                </footer>

                                                <div class="comment-content">
                                                    <p>{{$value['answer']}}</p>
                                                </div>

                                            </article>
                                        </li>
                                    </ol>
                                @endif

                            </li>

                            <br><br>

                        @endforeach

                    @endif

                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            {!! $comments->links() !!}
                        </div>
                    </div>

                </ol>

{{--                <div class="review-item">--}}
{{--                    <div class="rating">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="far fa-star"></i>--}}
{{--                    </div>--}}
{{--                    <h3>حسن</h3>--}}
{{--                    <span><strong>مدیر سایت</strong> در <strong>21 دی 1398</strong></span>--}}
{{--                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.</p>--}}

{{--                    <a href="#" class="review-report-link">گزارش دادن</a>--}}
{{--                </div>--}}

{{--                <div class="review-item">--}}
{{--                    <div class="rating">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="far fa-star"></i>--}}
{{--                    </div>--}}
{{--                    <h3>حسن</h3>--}}
{{--                    <span><strong>مدیر سایت</strong> در <strong>21 دی 1398</strong></span>--}}
{{--                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.</p>--}}

{{--                    <a href="#" class="review-report-link">گزارش دادن</a>--}}
{{--                </div>--}}

            </div>

        </div>
    </div>
</div>
