
<a href="/" class="btn btn-info">< Go Back</a>
<h2>Add New User</h2>
<div>
    <form action="/store" method="post">

    <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" class="form-control form-single" name="first_name" placeholder="First Name">
<!--        @if ($errors->has('first_name'))-->
        <span class="help-block">
<!--            <strong>{{ $errors->first('first_name') }}</strong>-->
        </span>
<!--        @endif-->
    </div>
    <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" class="form-control form-single" name="last_name" placeholder="Last Name">
<!--        @if ($errors->has('last_name'))-->
        <span class="help-block">
<!--            <strong>{{ $errors->first('last_name') }}</strong>-->
        </span>
<!--        @endif-->
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control form-single" id="email" name="email" placeholder="name@example.com">
<!--        @if ($errors->has('email'))-->
        <span class="help-block">
<!--            <strong>{{ $errors->first('email') }}</strong>-->
        </span>
<!--        @endif-->
    </div>
    <div class="form-group">
        <label for="country">Country</label>
        <select class="form-control form-single" id="country" name="country_id">
            <option value="0" disabled selected>Select Country</option>
            <?php foreach($this->countries as $country): ?>
                <option value="<?php echo $country->id ?>"><?php echo $country->name ?></option>
            <?php endforeach; ?>
        </select>
<!--        @if ($errors->has('country_id'))-->
        <span class="help-block">
<!--            <strong>{{ $errors->first('country_id') }}</strong>-->
        </span>
<!--        @endif-->
    </div>
    <div class="form-group input-fields-wrap">
        <label for="roles">Roles</label>
        <button class="add-field-button">Add More Roles</button>
        <input type="text" class="form-control roles form-multiple" name="roles[]">
<!--        @if ($errors->has('roles'))-->
        <span class="help-block">
<!--            <strong>{{ $errors->first('roles') }}</strong>-->
        </span>
<!--        @endif-->
    </div>

    <div class="form-group text-right">
        <button type="submit" id="create-user" class="btn btn-success">Create</button>
    </div>
    </form>
</div>
