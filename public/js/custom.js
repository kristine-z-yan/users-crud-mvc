$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
$(document).ready(function() {

    var maxRoles = 5; //maximum input boxes allowed
    var wrapper = $(".input-fields-wrap"); //Fields wrapper
    var addButton = $(".add-field-button"); //Add button ID

    var x = 1;
    var roleId = 1;
    $(addButton).click(function(e){
        e.preventDefault();
        if(x < maxRoles){
            x++;
            roleId++;
            $(wrapper).append('<div class="form-control-static"><input type="text" class="form-control roles form-multiple" name="roles[]" data-id="role_'+ roleId +'"/><a href="#" class="remove-field" data-id="role_'+ roleId +'">Remove role</a></div>');
        }
    });

    $(wrapper).on("click",".remove-field", function(e) {
        e.preventDefault(); $(this).parent('div').remove(); x--;
        var roles = JSON.parse(sessionStorage.getItem('roles'));
        var roleId = $(this).attr('data-id');
        if(roles[roleId]) delete roles[roleId];
        sessionStorage.setItem( 'roles', JSON.stringify(roles))

    });

    // Set inputs value from storage
    $('.form-single').each((index, item) => {
        if (sessionStorage.getItem($(item).attr('name'))) {
            if (!item.value || item.value == '0') item.value = sessionStorage.getItem($(item).attr('name'));
        }
    });

    // Set roles value from storage
    let roles = JSON.parse(sessionStorage.getItem('roles'));
    if (roles) {
        $.each(roles, function (id, role) {
            if (role) {
                if(x < maxRoles){
                    if (x == 1) {
                        $('.form-multiple[data-id="role_1"]').val(role);
                    } else {
                        $(wrapper).append('<div class="form-control-static"><input type="text" class="form-control roles form-multiple" name="roles[]" data-id="role_'+ id +'" value="'+ role +'"/><a href="#" class="remove-field" data-id="role_'+ id +'">Remove role</a></div>');
                    }
                    x++;
                }
            }
        })
    }

    function getUserFormData() {
        return {
            'first_name': $('#first-name').val(),
            'last_name': $('#last-name').val(),
            'email': $('#email').val(),
            'country_id': $('#country').val(),
            'roles': $('.roles').val(),
        };
    }

    // Create User
    $("#create-user").click(function () {

        sessionStorage.clear();

        // For ajax
        // var data = getUserFormData();
        // console.log(data);
        // $.ajax({
        //     url: '/',
        //     method: 'post',
        //     data: {data},
        //     success: function (res) {
        //         alert('User created successfully')
        //     }
        // })
    });

    // Edit User
    $("#edit-user").click(function () {

        sessionStorage.clear();

        // var id = $(this).attr('data-id');
        // var data = getUserFormData();
        // $.ajax({
        //     url: '/' + id,
        //     method: 'put',
        //     data: {data},
        //     success: function (res) {
        //        alert('User updated successfully')
        //     }
        // })
    });

    let deletedUserIndex;

    $('.delete-user').click(function(){
        deletedUserIndex = $(this).attr('data-index');
    })

    // Edit User
    $("#delete-user").click(function () {
        $.ajax({
            url: '/delete',
            method: 'post',
            data: {'index': deletedUserIndex},
            success: function (res) {
                if (res == 'deleted') {
                    alert('User deleted successfully');
                    $('#deleteUserModal').modal('hide');
                    $('#user-'+deletedUserIndex).remove();
                }
            }
        })
    });

    function hideError() {
        if ($(this.parentElement).hasClass('has-error')) {
            $(this.parentElement).removeClass('has-error');
            $('.text-danger',this.parentElement).remove();
        }
    }

    $('.form-single').on('change keyup', function() {
        sessionStorage.setItem($(this).attr('name'),$(this).val());
        hideError();
    })
    $(document).on('change keyup','.form-multiple', function () {
        if ($(this).attr('name') == 'roles[]') {
            var roles = JSON.parse(sessionStorage.getItem('roles') || '{}');
            var newRole = $(this).val();
            var roleId = $(this).attr('data-id');
            roles[roleId] = newRole;
            sessionStorage.setItem( 'roles', JSON.stringify(roles))
        }
        hideError();
    })
})
