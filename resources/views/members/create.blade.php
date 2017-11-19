<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Manh Hung
 * Date: 11/18/2017
 * Time: 11:49 PM
 */
?>
@extends('layout.default')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Member</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('members.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <?php if (count($errors)) { ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <?php } else { ?>
        <div class="alert alert-danger" id="area_show_err" style="display: none"></div>
    <?php } ?>

    {{ Form::open(array('route' => 'members.store','method'=>'POST')) }}
        {{csrf_field()}}
        @include('members.form')
    {{ Form::close() }}
    {{--<form action="{{url('store')}}" method="POST">--}}
        {{--@include('members.form')--}}
    {{--</form>--}}
@endsection
