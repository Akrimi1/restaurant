

@extends('layouts.app')
@push('css_lib')
<!-- iCheck -->
 <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
<!-- select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
{{--dropzone--}}
<link rel="stylesheet" href="{{asset('plugins/dropzone/bootstrap.min.css')}}">
@endpush
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.faq_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('lang.faq_desc')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{!! route('faqs.index') !!}">{{trans('lang.faq_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.faq_edit')}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="clearfix"></div>
  @include('flash::message')
  @include('adminlte-templates::common.errors')
  <div class="clearfix"></div>
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/privacy') }}"><i class="fa fa-list mr-2"></i>{{trans('Privacy')}}</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-pencil mr-2"></i>{{trans('Edit Privacy')}}</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      
        @foreach($privacy as $key=>$value)
      <div class="row">
          
           <?php $id = $value['id']; ?>
      {{Form::open(array('url' => ['privacy/update', $id], 'method' => 'post', 'files' => true))}}
      <div class="form-group row">
      <div class="col-md-1 text-right"><label for="content">Privacy</label></div>
      <div class="col-md-9">
           <div id="editor">
           <textarea name="content" class="form-control" rows="8" cols="100">{!! $value['content'] !!}</textarea>
           </div>
      </div>
      </div>
     <div class="form-group row">
         <div class="col-md-1"></div>
        <div class="col-md-9 text-right"> 
           <input type="submit" Value="Save" class="btn btn-primary text-right">
         </div>
    </div>
        {!! Form::close() !!}
        
      </div>
  @endforeach
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@include('layouts.media_modal')
@endsection
@push('scripts_lib')
<!-- iCheck -->
 <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<!-- select2 -->
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
{{--dropzone--}}
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    var dropzoneFields = [];
</script>
@endpush