@extends('layouts.app')


@section('content')

@include('admin.includes.errors')

    <div class="panel panel-default">
    	<div class="panel-heading">
    		edit blog settings
    	</div>
    	
    	<div class="panel-body">
		    <form action="{{ route('settings.update')}}" method="post" >
    			{{ csrf_field() }}
				<div class="form-group">
				    <label for="name">site name</label>
                    <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
				</div>
				<div class="form-group">
                        <label for="name">address</label>
                        <input type="text" name="address" value="{{ $settings->address }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">contact phone</label>
                    <input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">contact email</label>
                    <input type="text" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
                </div>
				<div class="form-group">
				     <div class="text-center">
					     <button class="btn btn-success" type="submit">update site settings</button>
					 </div>
				</div>
    		</form>
    	</div>
    </div>			
@stop














