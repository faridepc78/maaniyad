@section('admin_title')
    <title>پنل مدیریت مانیاد | سوالات متداول</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('faqs.index')}}">مدیریت سوالات متداول</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('faqs.create')}}">ایجاد
                                سوالات متداول</a></li>
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
                            <h3 class="card-title">ایجاد سوالات متداول</h3>
                        </div>

                        <form id="store_faq_form" action="{{route('faqs.store')}}"
                              method="post">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام سوال *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام سوال را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="value">توضیحات سوال *</label>
                                    <textarea rows="5" style="resize: vertical"
                                              placeholder="لطفا توضیحات سوال را وارد کنید"
                                              onkeyup="this.value=removeSpaces(this.value)"
                                              class="form-control @error('value') is-invalid @enderror" id="value"
                                              name="value" autocomplete="value" autofocus>{{ old('value') }}</textarea>

                                    @error('value')
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

        $('#store_faq_form').validate({

            rules: {
                name: {
                    required: true
                },

                value: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام سوال را وارد کنید"
                },

                value: {
                    required: "لطفا توضیحات سوال را وارد کنید"
                }
            }

        });

    });

</script>
