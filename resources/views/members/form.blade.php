<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Manh Hung
 * Date: 11/18/2017
 * Time: 11:48 PM
 */
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{--{{ Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) }}--}}
            <input name="name" class="form-control" placeholder="Name" type="text" value="<?php if (isset($member)) echo $member->name; ?>"/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
{{--            {{ Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) }}--}}
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if (isset($member)) echo $member->email; ?>"/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>