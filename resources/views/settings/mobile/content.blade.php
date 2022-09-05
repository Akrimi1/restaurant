@extends('layouts.settings.default')
@push('css_lib')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    {{--dropzone--}}
    <link rel="stylesheet" href="{{asset('plugins/dropzone/bootstrap.min.css')}}">
    {{--Color Picker--}}
    <link rel="stylesheet" href="{{asset('plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<style>
.note-editor.note-frame{
    display:none;
}
</style>
@endpush
@section('settings_title',trans('lang.app_setting_mobile'))
@section('settings_content')
    @include('flash::message')
    @include('adminlte-templates::common.errors')
    <div class="clearfix"></div>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                <li class="nav-item">
                    <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-cog mr-2"></i>{{trans('Content')}}</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
             @foreach($getdata as $key=>$value)
             {!! Form::open(['url' => ['settings/mobile/content/update'], 'method' => 'POST','files'=>'true']) !!}
            <div class="row">
                <h5 class="col-12 pb-4"><i class="mr-3 fa fa-pencil"></i>{!! trans('lang.app_setting_content') !!}</h5>
                
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="logo">Logo</label></div>
                  <div class="col-md-8">
                      <div><img src="http://92.42.110.51/~karri/api/assets/images/{{ $value['logo'] }}" height="100px" width="100px"></div>
                      <input type="file" class="form-control-file" id="" name="logo" value="<?php echo $value['logo']; ?>" placeholder="Logo"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert Logo") }}
                        </div>
                  </div>
                  </div>
                <div class="form-group row col-6">
                </div>
                 <!-- Walkthrough 1 title -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthrough1_title">Walkthrough1 Title</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="walkthrough1_title" value="<?php echo $value['walkthrough1_title']; ?>" placeholder="Walkthrough1 Title"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert Walkthrough Title") }}
                        </div>
                  </div>
                  </div>
                  <!-- Walkthrough 2 title -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthrough2_title">Walkthrough1 Title</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="walkthrough2_title" value="<?php echo $value['walkthrough2_title']; ?>" placeholder="Walkthrough2 Title"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert Walkthrough Title") }}
                        </div>
                  </div>
                  </div>
                  
                   <!-- Walkthrough 1 content -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthrough1_content">Walkthrough1 Content</label></div>
                  <div class="col-md-8">
                      <textarea class="form-control" id="editor" name="walkthrough1_content" value="" placeholder="Walkthrough1 Content">{!! $value['walkthrough1_content'] !!}</textarea>
                    <div class="form-text text-muted">
                            {{ trans("Insert Walkthrough Content") }}
                        </div>
                  </div>
                  </div>
                  
                     <!-- Walkthrough 2 content -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthrough2_content">Walkthrough2 Content</label></div>
                  <div class="col-md-8">
                      <textarea class="form-control" id="editor1" name="walkthrough2_content" value="" placeholder="Walkthrough2 Content">{!! $value['walkthrough2_content'] !!}</textarea>
                    <div class="form-text text-muted">
                            {{ trans("Insert Walkthrough Content") }}
                        </div>
                  </div>
                  </div>
                
                  <!-- Walkthrough 3 title -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthrough3_title">Walkthrough3 Title</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="walkthrough3_title" value="<?php echo $value['walkthrough3_title']; ?>" placeholder="Walkthrough3 Title"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert Walkthrough Title") }}
                        </div>
                  </div>
                  </div>
                  <!-- Walkthrough 4 title -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthrough4_title">Walkthrough4 Title</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="walkthrough4_title" value="<?php echo $value['walkthrough4_title']; ?>" placeholder="Walkthrough4 Title"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert Walkthrough Title") }}
                        </div>
                  </div>
                  </div>
                 
                <!-- Walkthrough 3 content -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthrough3_content">Walkthrough3 Content</label></div>
                  <div class="col-md-8">
                      <textarea class="form-control" id="editor2" name="walkthrough3_content" value="" placeholder="Walkthrough3 Content">{!! $value['walkthrough3_content'] !!}</textarea>
                    <div class="form-text text-muted">
                            {{ trans("Insert Walkthrough Content") }}
                        </div>
                  </div>
                  </div>
                  
                     <!-- Walkthrough 4 content -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthrough4_content">Walkthrough4 Content</label></div>
                  <div class="col-md-8">
                      <textarea class="form-control" id="editor3" name="walkthrough4_content" value="" placeholder="Walkthrough4 Content">{!! $value['walkthrough4_content'] !!}</textarea>
                    <div class="form-text text-muted">
                            {{ trans("Insert Walkthrough Content") }}
                        </div>
                  </div>
                  </div>
                  
                 <!-- Add Location title -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="addLocation_title">Location Title</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="addLocation_title" value="<?php echo $value['addLocation_title']; ?>" placeholder="Location Title"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert Location Title") }}
                        </div>
                  </div>
                  </div>
                  <!-- No Card title -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="noCard_title">No Card Title</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="noCard_title" value="<?php echo $value['noCard_title']; ?>" placeholder="No Card Title"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert No Card Title") }}
                        </div>
                  </div>
                  </div>

                   <!-- Add Location content -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="addLocation_content">Add Location Content</label></div>
                  <div class="col-md-8">
                      <textarea class="form-control" id="editor4" name="addLocation_content" placeholder="Add Location Content">{!! $value['addLocation_content'] !!}</textarea>
                    <div class="form-text text-muted">
                            {{ trans("Insert Location Content") }}
                        </div>
                  </div>
                  </div>
                  
                     <!-- No Card content -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="noCard_content">No Card Content</label></div>
                  <div class="col-md-8">
                      <textarea class="form-control" id="editor5" name="noCard_content" value="" placeholder="No Card Content">{!! $value['noCard_content'] !!}</textarea>
                    <div class="form-text text-muted">
                            {{ trans("Insert No Card Content") }}
                        </div>
                  </div>
                  </div>
                  <!-- Empty Order title -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="emptyOrder_title">Empty Order Title</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="emptyOrder_title" value="<?php echo $value['emptyOrder_title']; ?>" placeholder="Empty Order Title"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert Empty Order Title") }}
                        </div>
                  </div>
                  </div>
                
                 <div class="form-group row col-6">
                 </div>
                    <!-- Empty Order content -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="emptyOrder_content">Empty Order Content</label></div>
                  <div class="col-md-8">
                      <textarea class="form-control" id="editor6" name="emptyOrder_content" value="" placeholder="Empty Order Content"> {!! $value['emptyOrder_content'] !!}</textarea>
                    <div class="form-text text-muted">
                            {{ trans("Insert Empty order Content") }}
                        </div>
                  </div>
                  </div>
             
                <!-- Submit Field -->
                <div class="form-group mt-4 col-12 text-right">
                    <button type="submit" class="btn btn-{{setting('theme_color')}}">
                        <i class="fa fa-save"></i> {{trans('lang.save')}} {{trans('lang.app_setting')}}
                    </button>
                    <a href="{!! route('users.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
                </div>
            </div>
            {!! Form::close() !!}
             @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
@endsection
@push('scripts_lib')
    <!-- iCheck -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
    <!-- select2 -->
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    {{--dropzone--}}
    <script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
     <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
 <script>
        ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
     <script>
        ClassicEditor
            .create( document.querySelector( '#editor3' ) )
            .catch( error => {
                console.error( error );
            } );
            
             ClassicEditor
            .create( document.querySelector( '#editor4' ) )
            .catch( error => {
                console.error( error );
            } );
            
             ClassicEditor
            .create( document.querySelector( '#editor5' ) )
            .catch( error => {
                console.error( error );
            } );
            
             ClassicEditor
            .create( document.querySelector( '#editor6' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script type="text/javascript">
        // $("input[name$='color']").colorpicker({
        $(".colorpicker-component, input[name$='color']").colorpicker({
            customClass: 'colorpicker',
            format: 'hex',
            sliders: {
                saturation: {
                    maxLeft: 200,
                    maxTop: 200
                },
                hue: {
                    maxTop: 200
                },
                alpha: {
                    maxTop: 200
                }
            }
        });
        Dropzone.autoDiscover = false;
        var dropzoneFields = [];
    </script>
@endpush
