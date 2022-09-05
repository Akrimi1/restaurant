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
                    <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-cog mr-2"></i>{{trans('Color')}}</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
             @foreach($getdata as $key=>$value)
             {!! Form::open(['url' => ['settings/mobile/color/update'], 'method' => 'POST']) !!}
            <div class="row">
                <h5 class="col-12 pb-4"><i class="mr-3 fa fa-pencil"></i>{!! trans('lang.app_setting_colors') !!}</h5>
                
                 <!-- Walkthrough Background Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthrough_bg_color">Walkthrough Background Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="walkthrough_bg_color" value="<?php echo $value['walkthrough_bg_color']; ?>" placeholder="Walkthrough Background Color"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert the Walkthrough Background Color") }}
                        </div>
                  </div>
                  </div>
                  <!-- Walkthrough Text Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthroughtext_color">Walkthrough Text Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="walkthroughtext_color" value="<?php echo $value['walkthroughtext_color']; ?>" placeholder="Walkthrough Text Color"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert the App Main Background Color") }}
                        </div>
                  </div>
                  </div>
                  
                  <!-- Walkthrough Icon Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="walkthroughIcon_color">Walkthrough Icon Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="walkthroughIcon_color" value="<?php echo $value['walkthroughIcon_color']; ?>" placeholder="Walkthrough Icon Color"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert the Walkthrough Icon Color") }}
                        </div>
                  </div>
                  </div>
                  
                    <!--App Background Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="main_app_color">App Background Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="main_app_color" value="<?php echo $value['main_app_color']; ?>" placeholder="App Background Color"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert the App Background Color") }}
                        </div>
                  </div>
                  </div>
                  
                    <!-- App button color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="button_color">App Button Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control" id="" name="button_color" value="<?php echo $value['button_color']; ?>" placeholder="App Button Color"> 
                    <div class="form-text text-muted">
                            {{ trans("Insert the App Button Color") }}
                        </div>
                  </div>
                  </div>
                  
                   <!-- Popup Button Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="popupButton_color">PopUp Button Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control"  id="" name="popupButton_color" value="<?php echo $value['popupButton_color']; ?>" placeholder="PopUp Button Color">
                    <div class="form-text text-muted">
                            {{ trans("Insert Popup Button Color") }}
                        </div>
                  </div>
                  </div>
                  
                   <!-- App Title Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="appTitle_color">App Title Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control"   name="appTitle_color" value="<?php echo $value['appTitle_color']; ?>" placeholder="App Title Color">
                    <div class="form-text text-muted">
                            {{ trans("Insert App Title Color") }}
                        </div>
                  </div>
                  </div>
                  
                  <!-- App SubTitle Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="appSubtitle_color">App SubTitle Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control"   name="appSubtitle_color" value="<?php echo $value['appSubtitle_color']; ?>" placeholder="App SubTitle Color">
                    <div class="form-text text-muted">
                            {{ trans("Insert App SubTitle Color") }}
                        </div>
                  </div>
                  </div>
                  
                   <!-- App Text Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="appText_Color">App Text Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control"   name="appText_Color" value="<?php echo $value['appText_Color']; ?>" placeholder="App Text Color">
                    <div class="form-text text-muted">
                            {{ trans("Insert App Text Color") }}
                        </div>
                  </div>
                  </div>
                  
                   <!-- App PopUp Text Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="popupText_color">App Popup Text Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control"   name="popupText_color" value="<?php echo $value['popupText_color']; ?>" placeholder="App Popup Text Color">
                    <div class="form-text text-muted">
                            {{ trans("Insert App Popup Text Color") }}
                        </div>
                  </div>
                  </div>
                  
                   <!-- App Profile Menu Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="profile_menu_color">App Profile Menu Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control"   name="profile_menu_color" value="<?php echo $value['profile_menu_color']; ?>" placeholder="App Profile Menu Color">
                    <div class="form-text text-muted">
                            {{ trans("Insert App Profile Menu Color") }}
                        </div>
                  </div>
                  </div>
                  
                    <!-- App Profile Menu Selected Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="profile_menu_selected_color">App Profile Menu Selected Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control"   name="profile_menu_selected_color" value="<?php echo $value['profile_menu_selected_color']; ?>" placeholder="App Profile Menu Selected Color">
                    <div class="form-text text-muted">
                            {{ trans("Insert App Profile Menu Selected Color") }}
                        </div>
                  </div>
                  </div>
                  
                 <!-- App Profile Menu Selected Color -->
                 <div class="form-group row col-6">
                  <div class="col-md-4 text-right"><label class="control-label" for="allScreenLink_color">App Link Color</label></div>
                  <div class="col-md-8">
                      <input type="text" class="form-control"   name="allScreenLink_color" value="<?php echo $value['allScreenLink_color']; ?>" placeholder="App Link Color">
                    <div class="form-text text-muted">
                            {{ trans("Insert App Link Color") }}
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
