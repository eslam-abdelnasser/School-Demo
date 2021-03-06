@extends('admin.layout')

@section('title', trans('admin/school.education_levels'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/school.education_levels'))


{{-- End Breadcums--}}


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('admin/school.add_new_education_level')}} </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <ul class="nav nav-tabs tabs-left">


                                @foreach($languages as $language)
                                    <li class="{{$loop->iteration == 1 ? 'active' : ''}}">
                                        <a href="#{{$language->name}}" data-toggle="tab">  {{trans('admin/services.'.$language->name )}} </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['education-levels.store'] , 'method' => 'post']) }}
                            <div class="tab-content">

                                @foreach($languages as $language)
                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$language->name}}">
                                        <div class="portlet-body form">


                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label> {{trans('admin/services.title')}} {{trans('admin/services.'.$language->name )}} </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="title_{{$language->label}}" value="{{old('title_'.$language->label)}}" id="title_{{$language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/services.title')}} "> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label> {{trans('admin/services.description')}} {{trans('admin/services.'.$language->name )}} </label>
                                                    <div class="input-group">
                                                        <textarea class="my-editor" name="description_{{$language->label}}" id="description_{{$language->label}}" placeholder="Description">
                                                             {{old('description_'.$language->label)}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn blue">{{trans('admin/services.submit')}}</button>
                                <button type="button" class="btn default">{{trans('admin/services.cancel')}}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection


{{-- Start javascript --}}
@section('js')

    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <script>
        @foreach($languages as $language)
          $("#title_{{$language->label}}").on('change', function (e) {

            $("#slug_{{$language->label}}").val($("#title_{{$language->label}}").val());
        });

        @endforeach
    </script>
@endsection

{{-- end javascript --}}