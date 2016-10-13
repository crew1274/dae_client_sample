@extends('layouts.dashboard')
@section('title',trans('network.network'))
@section('page_heading',trans('network.network'))
@section('section')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#wifi" data-whatever="@wifi">{{trans('network.wifi')}}</button>

{!! Form::open(array('route' => 'wifi','method'=>'POST')) !!}
{{ csrf_field() }}

<div class="modal fade" id="wifi" tabindex="-1" role="dialog" aria-labelledby="wifi">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">{{trans('network.wifi')}}</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name"class="control-label">{{trans('network.wifi_name')}}:</label>
            {!! Form::text('name', null, array('placeholder' => trans('network.wifi_name'),'class' => 'form-control')) !!}
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">{{trans('network.password')}}:</label>
            {!! Form::password('password', null, array('placeholder' => trans('network.wifi_password'),'class' => 'form-control')) !!}
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('network.close')}}</button>
        <button type="submit" class="btn btn-primary">{{trans('network.use')}}</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}


@stop
