<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ $title}}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/logo/site-logo-2.png')}}">
   
    
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
    <link href="{{asset('text-editor/assets/summernote-lite.css')}}" rel="stylesheet"> 
</head>
<body class="app sidebar-mini rtl">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <main class="app-content"  id="app">
        {{$slot}}
    </main>
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{asset('text-editor/assets/summernote-lite.js')}}"></script>
    <script src="{{asset('text-editor/assets/lang/summernote-es-ES.js')}}"></script>
    <script>
      $('.summernote').summernote({
        height: 150,
     });
     $('.delete').click(function(event){
        event.preventDefault();
           
        $.ajaxSetup({
            headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var ele = $(this);
        ele.html('removing...');
        

            $.ajax({
            type: "POST",
            url: "{{URL::to('notification/delete')}}",
            data:{id: ele.attr("data-id")},
            success: function (response) {
                location.reload(); 
                        
            }
        });
    });
    </script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
   @stack('scripts')
</body>
</html>