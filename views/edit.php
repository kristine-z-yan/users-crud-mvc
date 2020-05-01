<a href="/" class="btn btn-info">< Go Back</a>
<h2>Edit User</h2>
<form action="/update" method="post">
    <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" class="form-control form-single" name="first_name" placeholder="First Name" value="<?php echo $this->user->first_name ?>">
<!--            @if ($errors->has('first_name'))-->
<!--                <span class="help-block">-->
<!--                <strong>{{ $errors->first('first_name') }}</strong>-->
<!--            </span>-->
<!--            @endif-->
    </div>
    <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" class="form-control form-single" name="last_name" placeholder="Last Name" value="<?php echo $this->user->last_name ?>">
<!--            @if ($errors->has('last_name'))-->
<!--            <span class="help-block">-->
<!--                <strong>{{ $errors->first('last_name') }}</strong>-->
<!--            </span>-->
<!--            @endif-->
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control form-single" id="email" name="email" placeholder="name@example.com" value="<?php echo $this->user->email ?>">
<!--            @if ($errors->has('email'))-->
<!--                <span class="help-block">-->
<!--                <strong>{{ $errors->first('email') }}</strong>-->
<!--            </span>-->
<!--            @endif-->
    </div>
    <div class="form-group">
        <label for="country">Country</label>
        <select class="form-control form-single" id="country" name="country_id">
            <option value="0" disabled selected>Select Country</option>
            <?php foreach($this->countries as $country): ?>
                <option value="<?php echo $country->id ?>" selected="<?php if($this->user->country_id == $country->id) 'selected'?>"><?php echo $country->name ?></option>
            <?php endforeach; ?>
        </select>
<!--            @if ($errors->has('country_id'))-->
<!--                <span class="help-block">-->
<!--                <strong>{{ $errors->first('country_id') }}</strong>-->
<!--            </span>-->
<!--            @endif-->
    </div>
    <div class="form-group input-fields-wrap">
        <label for="roles">Roles</label>
        <button class="add-field-button">Add More Roles</button>
        <?php foreach($this->user->roles as $role) :?>
            <input type="text" class="form-control roles form-multiple" name="roles[]" value="<?php echo $role?>">
        <?php endforeach;?>
    </div>
    <div class="form-group text-right">
        <button type="submit" id="edit-user" class="btn btn-success">Update</button>
    </div>
</form>
