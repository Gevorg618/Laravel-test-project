$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var allUsers = [];
    var userId;

    index()
    $(document).on('click', '.editUser', function () {
        var index = $(this).attr('data-user-index');
        userId = allUsers[index].id
        $('#userName').val(allUsers[index].name);
        $('#userEmail').val(allUsers[index].email);
        $('#exampleModal').modal('show')

    });

    $('#save').on('click', function () {
        var data = {
            'name': $('#userName').val(),
            'email': $('#userEmail').val(),
        };
        var roleId = $('#userRoles').find(":selected").val()

        update(userId, data, roleId)
    });

    $('.create').on('click', function () {
        var data = {
            'name': $('#username').val(),
            'email': $('#useremail').val(),
            'passwrod': $('#userpassword').val()
        };


        created(data)

    });

    $(document).on('click', '.delete', function () {
        var id = $(this).attr("data-user-id");
        del(id)
    })


    function index() {
        $.ajax({
            url: '/admin/users',
            method: 'get',
            success: function (users) {
                users.forEach(function (user, index) {
                    allUsers = users
                    $('#usersTable').append('' +
                        '<tr>\n' +
                        '  <th scope="row">' + user.id + '</th>\n' +
                        '  <td>' + user.name + '</td>\n' +
                        '  <td>' + user.email + '</td>\n' +

                        '  <td><button data-user-index="' + index + '" class="editUser btn btn-primary">Edit</button></td>\n' +
                        '  <td><button class="btn btn-danger delete"  data-user-id="' + user.id + '">Delete</button></td>\n' +
                        '</tr>'
                    )

                })
            }
        })


    }

    function update(id, data, roleId) {
        $.ajax({
            url: '/admin/users/update',
            method: 'post',
            data: {
                userId: id,
                data: data,
                roleId: roleId
            },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message)
                } else {
                    toastr.error('error')
                }
            }
        })

    }
    function  created(data) {
        $.ajax({
            url: '/admin/users/store',
            method: 'post',
            data: {

                data: data,

            },

            success: function (response) {
                if (response.success) {
                    toastr.success(response.message)
                } else {
                    toastr.success('User Created')
                }
            }
        })
    }

    function del(id) {
        $.ajax({
            url: '/admin/users/delete' ,
            method: 'post',

            data: {
                userId: id,
            },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message)
                } else {
                    toastr.error('error')
                }
            }
        })
    }


})


