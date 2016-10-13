@extends('layouts.dashboard')
@section('title',trans('network.network'))
@section('page_heading',trans('network.network'))
@section('section')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dhcp" data-whatever="@dhcp">{{trans('network.dhcp')}}</button>

{!! Form::open(array('route' => 'dhcp','method'=>'POST')) !!}
{{ csrf_field() }}

<div class="modal fade" id="dhcp" tabindex="-1" role="dialog" aria-labelledby="dhcp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">{{trans('network.dhcp')}}</h4>
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
