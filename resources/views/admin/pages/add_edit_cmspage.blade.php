@extends('admin.layout.layout')
@section('content')



<!-- Form row -->
        <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Add Cms Page!</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Welcome <strong>{{ Auth::guard('admin')->user()->name}} ({{Auth::guard('admin')->user()->type}})!</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Add CMS</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                                
                        <form name="cmsForm" id="cmsForm" @if(empty($cmspage['id'])) action="{{ url('admin/add-edit-cms-page') }}"
                        @else action="{{ url('admin/add-edit-cms-page/'.$cmspage['id']) }}"
                        @endif 
                        method="post">@csrf
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="title" class="form-label">Title*</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Page Title" @if(!empty($cmspage['title'])) value="{{ $cmspage['title'] }}" @endif>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="url" class="form-label">URL*</label>
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter Page Url" @if(!empty($cmspage['url'])) value="{{ $cmspage['url'] }}" @endif>
                                </div>
                            </div>
                                <h5 class="mb-3 mt-4">Description*</h5>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="editor" name="description" style="height: 100px">@if(!empty($cmspage['description'])) {{ $cmspage['description'] }} @endif</textarea>
                                    <label for="description"></label>
                                </div>
                                <br>
                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title*</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title"
                                    placeholder="Enter Meta Title" @if(!empty($cmspage['meta_title'])) value="{{ $cmspage['meta_title'] }}" @endif>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="meta_description" class="form-label">Meta Description*</label>
                                    <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" @if(!empty($cmspage['meta_description'])) value="{{ $cmspage['meta_description'] }}" @endif>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="meta_keywords" class="form-label">Meta Keywords*</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" @if(!empty($cmspage['meta_keywords'])) value="{{ $cmspage['meta_keywords'] }}" @endif>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <!-- Footer Start -->
    @include('admin.layout.footer')
    <!-- end Footer -->

</div>
        <!-- end row -->

@endsection