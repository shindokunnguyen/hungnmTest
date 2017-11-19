<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Manh Hung
 * Date: 11/18/2017
 * Time: 11:47 PM
 */
?>
@extends('layout.default')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Member CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn " href="{{route('members.create')}}">Create Member</a>
            </div>
        </div>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Operation</th>
        </tr>
        <?php $i = 1; ?>
        <?php if (!isset($members)) { ?>
            <tr>
                <td colspan="4"> Not record to found ! </td>
            </tr>
        <?php } else { ?>
            @foreach($members as $memb)
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>{{$memb->name}}</td>
                    <td>{{$memb->email}}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('members.show',$memb->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('members.edit',$memb->id) }}">Edit</a>
                        {{ Form::open(['method' => 'DELETE','route' => ['members.destroy', $memb->id],'style'=>'display:inline']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        <?php } ?>

    </table>
    {{--{{$members->render()}}--}}
@endsection