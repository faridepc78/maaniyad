@section('admin_title')
    <title>پنل مدیریت مانیاد | نظرات مشتریان</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('feedbacks.index')}}">مدیریت نظرات مشتریان</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('feedbacks.edit',$feedback->id)}}">ویرایش
                                نظر مشتری ({{$feedback->name}})</a></li>
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
                            <h3 class="card-title">ویرایش نظر مشتری ({{$feedback->name}})</h3>
                        </div>

                        <form id="update_feedback_form" action="{{route('feedbacks.update',$feedback->id)}}"
                              method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام مشتری *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$feedback->name) }}" id="name" name="name"
                                           placeholder="لطفا نام مشتری را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="job">شغل مشتری *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('job') is-invalid @enderror"
                                           value="{{ old('job',$feedback->job) }}" id="job" name="job"
                                           placeholder="لطفا شغل مشتری را وارد کنید"
                                           autocomplete="job" autofocus>

                                    @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">نظر مشتری *</label>
                                    <textarea onkeyup="this.value=removeSpaces(this.value)" placeholder="لطفا نظر مشتری را وارد کنید" rows="5" style="resize: vertical"
                                              class="form-control @error('text') is-invalid @enderror"
                                              id="text"
                                              name="text" autocomplete="text"
                                              autofocus>{{ old('text',$feedback->text) }}</textarea>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر مشتری</label>
                                    <img width="50" src="{{$feedback->profile}}"
                                         alt="{{$feedback->profile}}">
                                    <input accept=".jpg,.jpeg,.png" type="file" class="form-control @error('image') is-invalid @enderror"
                                           autofocus id="image" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">بروزرسانی</button>
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

        $('#update_feedback_form').validate({

            rules: {
                name: {
                    required: true
                },

                job: {
                    required: true
                },

                text: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام مشتری را وارد کنید"
                },

                job: {
                    required: "لطفا شغل مشتری را وارد کنید"
                },

                text: {
                    required: "لطفا نظر مشتری را وارد کنید"
                }
            }

        });

    });

</script>
