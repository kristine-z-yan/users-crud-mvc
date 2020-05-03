
<a href="/" class="btn btn-info">< Go Back</a>
<h2>Add New User</h2>
<div>
    <?php if($_SESSION['message']):?>
        <div class="alert">
            <?php echo $_SESSION['message']?>
            <?php unset($_SESSION['message']);?>
        </div>
    <?php endif;?>
    <form action="/store" method="post">
    <div class="form-group<?php if(isset($_SESSION['errors']['first_name'])) echo ' has-error' ?>">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" class="form-control form-single" name="first_name" placeholder="First Name" value="<?php echo $_SESSION['values']['first_name'] ?>">
        <?php if($_SESSION['errors']['first_name']):?>
        <span class="text-danger">
            <strong><?php echo $_SESSION['errors']['first_name']?></strong>
            <?php unset($_SESSION['errors']['first_name'])?>
        </span>
        <?php endif; ?>
    </div>
    <div class="form-group <?php if(isset($_SESSION['errors']['last_name'])) echo ' has-error' ?>">
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" class="form-control form-single" name="last_name" placeholder="Last Name" value="<?php echo $_SESSION['values']['last_name'] ?>">
        <?php if($_SESSION['errors']['last_name']):?>
            <span class="text-danger">
            <strong><?php echo $_SESSION['errors']['last_name']?></strong>
            <?php unset($_SESSION['errors']['last_name'])?>
        </span>
        <?php endif; ?>
    </div>
    <div class="form-group <?php if(isset($_SESSION['errors']['email'])) echo ' has-error' ?>">
        <label for="email">Email address</label>
        <input type="email" class="form-control form-single" id="email" name="email" placeholder="name@example.com" value="<?php echo $_SESSION['values']['email'] ?>">
        <?php if($_SESSION['errors']['email']):?>
            <span class="text-danger">
            <strong><?php echo $_SESSION['errors']['email']?></strong>
            <?php unset($_SESSION['errors']['email'])?>
        </span>
        <?php endif; ?>
    </div>
    <div class="form-group <?php if(isset($_SESSION['errors']['country_id'])) echo ' has-error' ?>">
        <label for="country">Country</label>
        <select class="form-control form-single" id="country" name="country_id">
            <option value="0" disabled selected>Select Country</option>
            <?php foreach($this->countries as $country): ?>
                <option value="<?php echo $country->id ?>" <?php if($_SESSION['values']['country_id'] == $country->id) echo 'selected'?>><?php echo $country->name ?></option>
            <?php endforeach; ?>
        </select>
        <?php if($_SESSION['errors']['country_id']):?>
            <span class="text-danger">
            <strong><?php echo $_SESSION['errors']['country_id']?></strong>
            <?php unset($_SESSION['errors']['country_id'])?>
        </span>
        <?php endif; ?>
    </div>
    <div class="form-group input-fields-wrap <?php if(isset($_SESSION['errors']['roles'])) echo ' has-error' ?>">
        <label for="roles">Roles</label>
        <button class="btn btn-info add-field-button">Add More Roles</button>
        <div class="form-control-static">
            <input type="text" class="form-control roles form-multiple" name="roles[]" value="<?php echo $_SESSION['values']['roles'][0]?>">
        </div>
        <?php if($_SESSION['values']['roles']):?>
            <?php for($i=1; $i < count($_SESSION['values']['roles']); $i++):?>
                <div class="form-control-static">
                    <input type="text" class="form-control roles form-multiple" name="roles[]" value="<?php echo $_SESSION['values']['roles'][$i]?>">
                    <a href="#" class="remove-field">Remove role</a>
                </div>
            <?php endfor;?>
        <?php endif; ?>
        <?php if($_SESSION['errors']['roles']):?>
            <span class="text-danger">
                <strong><?php echo $_SESSION['errors']['roles']?></strong>
                <?php unset($_SESSION['errors']['roles'])?>
            </span>
        <?php endif; ?>
    </div>

    <div class="form-group text-right">
        <button type="submit" id="create-user" class="btn btn-success">Create</button>
    </div>
    </form>
</div>
