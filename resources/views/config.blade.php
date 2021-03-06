@extends ('layouts.dashboard')
@section('title',trans('config.peak_time_config'))
@section('page_heading',trans('config.peak_time_config'))
@section('section')

<div class="row">
	<div class="col-sm-12">

		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@elseif ($message = Session::get('dangerous'))
		<div class="alert alert-dangerous">
			<p>{{ $message }}</p>
		</div>
		@endif


		@section ('cotable_panel_title',trans('config.all_peak_time_config'))
		@section ('cotable_panel_body')
		<p class="pull-right">
        <a class="btn btn-success" href="{{ route('config.create') }}">{{trans('config.create_new_config')}}</a>
        </p>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>{{trans('config.day')}}</th>
					<th>{{trans('config.start_time')}}</th>
					<th>{{trans('config.end_time')}}</th>
					<th>{{trans('config.state')}}</th>
					<th width="150px">{{trans('config.action')}}</th>
				</tr>
			</thead>
		<tbody>
			@foreach ($peaks as $peak)

			@if  ($peak->state == 'peak')
			<tr class="danger">
				@if ($peak ->day == 'weekday')
				<th><p class="text-muted">{{trans('config.weekday')}}</p></th>
				@elseif  ($peak -> day == 'weekend')
				<th><p class="text-info">{{trans('config.weekend')}}</p></th>
				@elseif  ($peak -> day == 'holiday')
				<th><p class="text-warning">{{trans('config.holiday')}}</p></th>
				@endif
				<td><p class="text-info">{{ $peak->start }}</p></td>
		        <td><p class="text-info">{{ $peak->end }}</p></td>
		        <td><p class="text-info">{{trans('config.peak')}}</p></td>
		        <td>
		        <!--    <a class="btn btn-primary" href="{{ route('config.edit',$peak->id) }}">{{trans('config.edit')}}</a> -->
		            {!! Form::open(['method' => 'DELETE','route' => ['config.destroy', $peak->id],'style'=>'display:inline']) !!}
		            {!! Form::submit(trans('config.delete'), ['class' => 'btn btn-danger']) !!}
		            {!! Form::close() !!}
		        </td>
		    </tr>
			@elseif ($peak->state == 'half_peak')
			<tr class="success">
				@if ($peak ->day == 'weekday')
				<th><p class="text-muted">{{trans('config.weekday')}}</p></th>
				@elseif  ($peak -> day == 'weekend')
				<th><p class="text-info">{{trans('config.weekend')}}</p></th>
				@elseif  ($peak -> day == 'holiday')
				<th><p class="text-warning">{{trans('config.holiday')}}</p></th>
				@endif
		        <td><p class="text-info">{{ $peak->start }}</p></td>
		        <td><p class="text-info">{{ $peak->end }}</p></td>
		        <td><p class="text-info">{{trans('config.half_peak')}}</p></td>
		        <td>
		            <!--    <a class="btn btn-primary" href="{{ route('config.edit',$peak->id) }}">{{trans('config.edit')}}</a> -->
		            {!! Form::open(['method' => 'DELETE','route' => ['config.destroy', $peak->id],'style'=>'display:inline']) !!}
		            {!! Form::submit(trans('config.delete'), ['class' => 'btn btn-danger']) !!}
		            {!! Form::close() !!}
		        </td>
		    </tr>

			@endif
			@endforeach
		</tbody>
		</table>

		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))


	</div>
</div>
</div>

@stop
