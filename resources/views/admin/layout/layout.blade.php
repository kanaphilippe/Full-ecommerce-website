<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Velonic - Bootstrap 5 Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
        <meta content="Techzaa" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('admin/images/favicon.ico') }}">

        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="{{ url('admin/vendor/daterangepicker/daterangepicker.css') }}">

        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css">
        
        <script src="{{ url('admin/ckeditor/ckeditor.js') }}"></script>

        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.css" />
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/43.3.0/ckeditor5-premium-features.css" />





    <script type="module" src="{{ URL::asset('assets/vendor/ckeditor5.js') }}"></script>

        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

         <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
         <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        

        <!-- Vector Map css -->
        <link rel="stylesheet" href="{{ url('admin/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">

        <!-- Theme Config Js -->
        <script src="{{ url('admin/js/config.js') }}"></script>

        <!-- App css -->
        <link href="{{ url('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{ url('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">

            
            <!-- ========== Topbar Start ========== -->
                @include('admin.layout.header')
            <!-- ========== Topbar End ========== -->
            

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layout.sidebar')
            <!-- ========== Left Sidebar End ========== -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            @yield('content')

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                <h5 class="text-white m-0">Theme Settings</h5>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="p-3">
                        <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light" value="light">
                                    <label class="form-check-label" for="layout-color-light">
                                        <img src="{{ url('admin/images/layouts/light.png') }}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark" value="dark">
                                    <label class="form-check-label" for="layout-color-dark">
                                        <img src="{{ url('admin/images/layouts/dark.png') }}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>

                        <div id="layout-width">
                            <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-fluid" value="fluid">
                                        <label class="form-check-label" for="layout-mode-fluid">
                                            <img src="{{ url('admin/images/layouts/light.png') }}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                                </div>

                                <div class="col-4">
                                    <div id="layout-boxed">
                                        <div class="form-check form-switch card-switch mb-1">
                                            <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-boxed" value="boxed">
                                            <label class="form-check-label" for="layout-mode-boxed">
                                                <img src="{{ url('admin/images/layouts/boxed.png') }}" alt="" class="img-fluid">
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-light" value="light">
                                    <label class="form-check-label" for="topbar-color-light">
                                        <img src="{{ url('admin/images/layouts/light.png') }}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                    <label class="form-check-label" for="topbar-color-dark">
                                        <img src="{{ url('admin/images/layouts/topbar-dark.png') }}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>

                        <div>
                            <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-light" value="light">
                                        <label class="form-check-label" for="leftbar-color-light">
                                            <img src="{{ url('admin/images/layouts/sidebar-light.png') }}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                        <label class="form-check-label" for="leftbar-color-dark">
                                            <img src="{{ url('admin/images/layouts/light.png') }}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-default" value="default">
                                        <label class="form-check-label" for="leftbar-size-default">
                                            <img src="{{ url('admin/images/layouts/light.png') }}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
                                        <label class="form-check-label" for="leftbar-size-compact">
                                            <img src="{{ url('admin/images/layouts/compact.png') }}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
                                        <label class="form-check-label" for="leftbar-size-small">
                                            <img src="{{ url('admin/images/layouts/sm.png') }}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                                </div>


                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                        <label class="form-check-label" for="leftbar-size-full">
                                            <img src="{{ url('admin/images/layouts/full.png') }}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-position">
                            <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                            <div class="btn-group checkbox" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                                <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-soft-primary w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                    </div>
                    <div class="col-6">
                        <a href="https://1.envato.market/velonic" target="_blank" role="button" class="btn btn-primary w-100">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>        
        
        <!-- Vendor js -->
        <script src="{{ url('admin/js/vendor.min.js') }}"></script>

        <!-- Daterangepicker js -->
        <script src="{{ url('admin/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ url('admin/vendor/daterangepicker/daterangepicker.js') }}"></script>
        
        <!-- Apex Charts js -->
        <script src="{{ url('admin/vendor/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Vector Map js -->
        <script src="{{ url('admin/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ url('admin/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

        <!-- Dashboard App js -->
        <script src="{{ url('admin/js/pages/dashboard.js') }}"></script>

        <!-- Custom.js-->
        <script src="{{ url('admin/js/custom.js') }}"></script>
        <!-- Datatables js -->
        <script src="{{ url('admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('admin/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ url('admin/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
         <script src="{{ url('admin/DataTables/datatables.js') }}"></script>
       
        <!--sweat alert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(function(){
                $("#cmspages").DataTable();
                $("#subadmins").DataTable();
                $("#categories").DataTable();
                $("#products").DataTable();
                $("#brands").DataTable();
                $("#banners").DataTable();
                $("#coupons").DataTable();
                $("#users").DataTable();
                $("#orders").DataTable();
                $("#orderDetails").DataTable();
                $("#shipping").DataTable();
                $("#rating").DataTable();
                $("#subscribers").DataTable();
            });
       </script>

        <!-- App js -->
        <script src="{{ url('admin/js/app.min.js') }}"></script>

        <!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>-->
        <!--<script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'powerpaste advcode table lists checklist',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
        });
        </script>-->
        <!--<script src="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.umd.js"></script>-->



        <!--<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
        }
    }
</script>

<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>-->


<!--<script type="importmap">
{
    "imports": {
        "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
        "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
    }
}
</script>

<script type="module">
import {
    ClassicEditor,
    Essentials,
    Paragraph,
    Bold,
    Italic,
    Font,
    Link,
    Image,
    ImageUpload,
    Table,
    // Add additional plugins here
    BlockQuote,
    Code,
    CodeBlock,
    List,
    MediaEmbed,
    Highlight,
    HorizontalLine,
    SpecialCharacters,
    Strikethrough,
    Underline,
    FontSize,
    FontColor,
    FontBackgroundColor,
    // ... up to 72 plugins
} from 'ckeditor5';

ClassicEditor
    .create(document.querySelector('#editor'), {
        plugins: [
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font,
            Link,
            Image,
            ImageUpload,
            Table,
            BlockQuote,
            Code,
            CodeBlock,
            List,
            MediaEmbed,
            Highlight,
            HorizontalLine,
            SpecialCharacters,
            Strikethrough,
            Underline,
            FontSize,
            FontColor,
            FontBackgroundColor,
            // ... add all other plugins here
        ],
        toolbar: [
            'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'strikethrough',
            'link','image', 'imageUpload', 'blockQuote', '|',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
            'insertTable', 'mediaEmbed', 'codeBlock', '|',
            'highlight', 'horizontalLine', 'specialCharacters', '|',
            // Add more toolbar items as needed
        ],
        image: {
            toolbar: [
                'imageTextAlternative', '|',
                'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight'
            ]
        }
    })
    .then(editor => {
        window.editor = editor;
    })
    .catch(error => {
        console.error(error);
    });
</script>-->

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'), {
      toolbar: {
        items: [
          'heading', '|',
          'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
          'link', 'bulletedList', 'numberedList', 'todoList', '|',
          'alignment', '|', 'outdent', 'indent', '|',
          'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
          'code', 'codeBlock', 'htmlEmbed', '|',
          'pageBreak', 'horizontalLine', '|',
          'undo', 'redo', 'removeFormat', 'findAndReplace', 'selectAll'
        ]
      },
      image: {
        toolbar: [
          'imageTextAlternative', 'imageStyle:full', 'imageStyle:side', 'linkImage'
        ]
      },
      table: {
        contentToolbar: [
          'tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties'
        ]
      },
      mediaEmbed: {
        previewsInData: true
      },
      htmlEmbed: {
        showPreviews: true
      },
      language: 'en'
    })
    .then(editor => {
      console.log('Editor was initialized', editor);
    })
    .catch(error => {
      console.error(error);
    });
</script>

    </body>
</html> 