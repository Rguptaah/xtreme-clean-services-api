/* Custom Js By Codeflies*/
//==========EDIT USER FORM================//
$('#edit-user').click(function (e) {
    e.preventDefault();
    $('#edit_user_form').validate();
    if ($("#edit_user_form").valid()) {
        var task = $("#edit_user_form").attr('action');
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Please Wait...");
        // var data = $("#edit_user_form").serialize();
        var form_data = document.getElementById('edit_user_form');
        var data = new FormData(form_data);
        $.ajax({
            type: 'POST',
            url: 'api.php?task=' + task,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var obj = JSON.parse(data);
                if (obj.url != null) {
                    bootbox.alert(obj.msg, function () {
                        window.location.replace(obj.url);
                    });
                }
                else {
                    $.notify(obj.msg, obj.status);
                    $("#edit-user").html(" <i class='fa fa-check-circle'></i> Saved Succesfully");
                    location.reload(true);
                }
                $('#edit_user_form')[0].reset();
                setTimeout(function () {
                    $("#edit-user").attr("disabled", false);
                    $("#edit-user").html("Save");
                }, 2000);
            }
        });
    }
})

//=====INSERT BUTTON =========//
$("#add-task").on('click', function (e) {
    e.preventDefault();
    $("#task_form").validate({
        rules: {
            task_detail: {
                required: true
            },
            staff_id: {
                required: true
            },
            priority: {
                required: true
            },
            property_name: {
                required: true
            },
            status: {
                required: true
            },
            check_out: {
                required: true
            },
            next_check_in: {
                required: true
            }
        }
    });

    if ($("#task_form").valid()) {

        var task = $("#task_form").attr('action');
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Please Wait...");
        var data = $("#task_form").serialize();
        $.ajax({
            'type': 'POST',
            'url': 'api.php?task=' + task,
            'data': data,
            success: function (data) {
                console.log(data);
                //alert(data);
                var obj = JSON.parse(data);
                if ($('#uploadForm').length != 0) {
                    $('#uploadForm')[0].reset();
                }
                if (obj.url != null) {
                    bootbox.alert(obj.msg, function () {
                        window.location.replace(obj.url);
                    });
                }
                else {
                    $.notify(obj.msg, obj.status);
                    $("#add-task").html(" <i class='fa fa-check-circle'></i> Saved Succesfully");

                }
                $('#task_form')[0].reset();
                setTimeout(function () {
                    $("#add-task").attr("disabled", false);
                    $("#add-task").html("Save");
                }, 2000);


            }

        });

    }
});

$("#add-service").on('click', function (e) {
    e.preventDefault();
    $("#service_form").validate({
        rules: {
            title: {
                required: true
            },
            service_details: {
                required: true
            },
            image_gallery: {
                required: true,
                accept: "image/*"
            },
            status: {
                required: true
            }
        }
    });

    if ($("#service_form").valid()) {

        var task = $("#service_form").attr('action');
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Please Wait...");
        // var data = $("#service_form").serialize();
        let upload_form = document.getElementById("service_form");
        var data = new FormData(upload_form);
        $.ajax({
            type: 'POST',
            url: 'api.php?task=' + task,
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            success: function (data) {
                console.log(data);
                //alert(data);
                var obj = JSON.parse(data);
                if (obj.url != null) {
                    bootbox.alert(obj.msg, function () {
                        window.location.replace(obj.url);
                    });
                }
                else {
                    $.notify(obj.msg, obj.status);
                    // $("#add-service").html(" <i class='fa fa-check-circle'></i> Saved Succesfully");

                }
                $('#service_form')[0].reset();
                setTimeout(function () {
                    $("#add-service").attr("disabled", false);
                    $("#add-service").html("Save");
                }, 2000);


            }

        });

    }
});

$("#add-user").on('click', function (e) {
    e.preventDefault();
    $("#add_user_form").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                accept: "image/*"
            },
            password: {
                minlength: 8
            },
            confirm_password: {
                minlength: 8,
                equalTo: "#password"
            },
            role: {
                required: true
            },
            profile_pic: {
                required: true,
                accept: "image/png,image/jpg,image/jpeg,image/gif,image/webp"
            }
        }
    });

    if ($("#add_user_form").valid()) {

        var task = $("#add_user_form").attr('action');
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Please Wait...");
        // var data = $("#add_user_form").serialize();
        let upload_form = document.getElementById("add_user_form");
        var data = new FormData(upload_form);
        $.ajax({
            type: 'POST',
            url: 'api.php?task=' + task,
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            success: function (data) {
                console.log(data);
                //alert(data);
                var obj = JSON.parse(data);
                if (obj.url != null) {
                    bootbox.alert(obj.msg, function () {
                        window.location.replace(obj.url);
                    });
                }
                else {
                    $.notify(obj.msg, obj.status);
                    // $("#add-service").html(" <i class='fa fa-check-circle'></i> Saved Succesfully");

                }
                $('#add_user_form')[0].reset();
                setTimeout(function () {
                    $("#add-user").attr("disabled", false);
                    $("#add-user").html("Save");
                }, 2000);


            }

        });

    }
});
//=====UPDATE BUTTON =========//
$("#update_btn").click(function () {
    $("#update_frm").validate();

    if ($("#update_frm").valid()) {
        var task = $("#update_frm").attr('action');
        $(this).attr("disabled", true);
        $(this).html("<i class='fa fa-refresh fa-spin'></i> Please Wait...");
        var data = $("#update_frm").serialize();
        $.ajax({
            'type': 'POST',
            'url': 'master_process?task=' + task,

            'data': data,
            success: function (data) {
                console.log(data);
                //alert(data);
                var obj = JSON.parse(data);
                $('#update_frm')[0].reset();

                $("#update_btn").html("Save Details");
                $("#update_btn").removeAttr("disabled");
                if (obj.url != null) {
                    bootbox.alert(obj.msg, function () {
                        window.location.replace(obj.url);
                    });
                }
                else {
                    $.notify(obj.msg, obj.status);
                }

                setTimeout(function () {
                    $("#update_btn").attr("disabled", false);
                    $("#update_btn").html("Submit Details");
                }, 2000);
            }
        });
    }
});


//=====DELETE BUTTON =========//
$(".delete_btn").on('click', function () {
    var id = $(this).attr("data-id");
    var table = $(this).attr("data-table");
    bootbox.confirm({
        message: "Do you really want to delete this?",
        buttons:
        {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    'type': 'POST',
                    'url': 'api.php?task=master_delete',
                    'data': { 'id': id, 'table': table },
                    success: function (data) {
                        //alert(data);
                        var obj = JSON.parse(data);
                        if (obj.url != null) {
                            bootbox.alert(obj.msg, function () {
                                window.location.replace(obj.url);
                            });
                        }
                        else {
                            $.notify(obj.msg, obj.status);
                            // del_row.hide(500);
                        }
                        location.reload(true);
                    }
                });
            }
        }
    });
});


//=====DELETE BUTTON =========//
$(".multi_delete_btn").on('click', function () {
    var del_row = $($(this).closest("tr"));
    var id = $(this).attr("data-id");
    var task = $(this).attr("data-task");
    var pkey = $(this).attr("data-pkey");
    bootbox.confirm({
        message: "Data can't be recover after this are you sure?",
        buttons:
        {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    'type': 'POST',
                    'url': 'master_process?task=' + task,
                    'data': { 'id': id, 'pkey': pkey },
                    success: function (data) {
                        console.log(data);
                        //alert(data);
                        var obj = JSON.parse(data);
                        if (obj.url != null) {
                            bootbox.alert(obj.msg, function () {
                                window.location.replace(obj.url);
                            });
                        }
                        else {
                            $.notify(obj.msg, obj.status);
                            del_row.hide(500);
                        }
                    }
                });
            }
        }
    });
});

//=====STATUS BUTTON =========//
$(".status_btn").on('click', function () {
    var table = $(this).attr('data-table');
    var data_status = $(this).attr('data-status');
    var all_student = [];
    $('input[class="chk"]:checked').each(function () {
        all_student.push($(this).attr('value'));
    });
    var ct = all_student.length;

    if (ct >= 1) {
        bootbox.confirm({
            message: "Do you really want to " + data_status + " selected (" + ct + ") records ?",
            buttons:
            {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success btn-sm'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger btn-sm'
                }
            },
            callback: function (result) {
                if (result == true) {
                    $.ajax({
                        'type': 'POST',
                        'url': 'master_process?task=update_status',
                        'data': { 'data_status': data_status, 'sid': all_student, 'table': table },
                        success: function (data) {
                            //console.log(data);
                            //var obj = JSON.parse(data);
                            $.notify(ct + " record(s) " + data_status + " Succesfully", "success");
                            location.reload();
                        }
                    });
                }
            }
        });
    } else {
        $.notify("Sorry ! No record Selected ", "info");
    }
});


//=====BLOCK BUTTON =========//
$(".block_btn").on('click', function () {
    var del_row = $($(this).closest("tr"));
    var id = $(this).attr("data-id");
    var table = $(this).attr("data-table");
    var pkey = $(this).attr("data-pkey");
    bootbox.confirm({
        message: "Do you really want to BLOCK this?",
        buttons:
        {
            confirm: {
                label: 'Yes',
                className: 'btn-info'
            },
            cancel: {
                label: 'No',
                className: 'btn-warning'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    'type': 'POST',
                    'url': 'master_process?task=master_block',
                    'data': { 'id': id, 'table': table, 'pkey': pkey },
                    success: function (data) {
                        //alert(data);
                        var obj = JSON.parse(data);
                        $.notify(obj.msg, obj.status);
                        del_row.hide(500);
                    }
                });
            }
        }
    });
});


//=====BLOCK USER =========//
$(".block_user").on('click', function () {
    var del_row = $($(this).closest("tr"));
    var id = $(this).attr("data-id");
    var st = $(this).attr("data-status");
    bootbox.confirm({
        message: "Do you really want to " + st + "  this User Account?",
        buttons:
        {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    'type': 'POST',
                    'url': 'master_process?task=block_user',
                    'data': { 'id': id, 'data_status': st },
                    success: function (data) {
                        //alert(data);
                        var obj = JSON.parse(data);
                        $.notify(obj.msg, obj.status);
                        //del_row.hide(500); 
                        location.reload();
                    }
                });
            }
        }
    });
});

//========= LOGIN BUTTON ===========//
$("#login-btn").click(function (e) {
    e.preventDefault();
    $("#login_frm").validate();

    if ($("#login_frm").valid()) {
        // var task = $("#login_frm").attr('action');
        $(this).attr("disabled", true);
        $(this).html("Please Wait...");
        var data = $("#login_frm").serialize();
        $.ajax({
            'type': 'POST',
            'url': 'api.php?task=verify_login',
            'data': data,
            success: function (data) {
                console.log(data);
                var obj = JSON.parse(data);

                if (obj.status.trim() == 'success') {
                    // alert("success");
                    $.notify("Login Success...", obj.status);
                    setTimeout(() => {
                        window.location = "index.php";
                    }, 2000);
                }
                else {
                    // alert("not success");
                    $.notify(obj.msg, "error");
                    $("#login_frm")[0].reset();
                    $("#login-btn").html("Secure Login");
                    $("#login-btn").attr("disabled", false);
                }
            }

        });
    }
});

//========= LOGIN As BUTTON ===========//
$(".login_as").click(function () {

    var user_name = $(this).attr("data-id");
    var user_pass = $(this).attr("data-code");
    var data = {
        'user_name': user_name,
        'user_pass': user_pass
    }
    $.ajax({
        'type': 'POST',
        'url': 'master_process?task=login_as',
        'data': data,
        success: function (data) {
            //alert(data);
            var obj = JSON.parse(data);

            if (obj.status.trim() == 'success') {
                $.notify("Login Success...", obj.status);
                window.location = 'client_index';
            }
            else {
                $.notify("Sorry Some Thing Went Wrong", "error");
                $("#login_frm")[0].reset();
                $("#login_btn").html("Secure Login");
                $("#login_btn").attr("disabled", false);
            }
        }

    });
});

//===========UPLOAD IMAGES ==============//
$('#uploadimg').change(function () {
    $("#uploadForm").submit();
});

$("#uploadForm").on('submit', (function (e) {
    e.preventDefault();
    $.ajax({
        url: "master_process?task=upload",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var obj = JSON.parse(data);
            $("#targetimg").val(obj.id);
            $("#display").html("<img src='upload/" + obj.id + "' width='100px' height='100px' class='img-thumbnail'>");
            $.notify(obj.msg, obj.status);
        },
        error: function () { }
    });
}));


// === Dynamic District Section From State ==/
$(document).on('change blur', "#state_id", function () {
    var val = $(this).val();

    $.ajax({
        type: "GET",
        url: "master_process.php?task=get_dist",
        data: 'state_id=' + val,
        success: function (data) {
            $("#district_id").html(data);
        }
    });
});

// === Dynamic Block Section From State ==/
$(document).on('change blur', "#district_id", function () {
    var val = $(this).val();

    $.ajax({
        type: "GET",
        url: "master_process.php?task=get_block",
        data: 'district_id=' + val,
        success: function (data) {
            $("#block_id").html(data);
        }
    });
});

//=========SELECT ALL CHECK BOX WITH SAME NAME =======//
function selectAll(source) {
    checkboxes = document.getElementsByName('sel_id[]');
    for (var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function ajax_call(url, data, target) {
    var data = this.value;
    $.ajax({
        'type': 'POST',
        'url': url,
        'data': data,
        success: function (data) {
            //var obj = JSON.parse(data);
            $(target).show();
            $(target).html(data);
        }
    });
}

//===========LOGOUT WITH CONFIRAMTION ==========//
function logout() {
    bootbox.confirm({
        message: "Do you really want to logout ?",
        buttons:
        {
            confirm: {
                label: '<i class="fa fa-check"></i> Logout',
                className: 'btn-success'
            },
            cancel: {
                label: '<i class="fa fa-times"></i> Cancel',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    'type': 'POST',
                    'url': 'api.php?task=logout',
                    success: function (data) {
                        //alert(data);
                        var obj = JSON.parse(data);
                        if (obj.url != null) {
                            bootbox.alert(obj.msg, function () {
                                window.location.replace(obj.url);
                            });
                        } else {
                            $.notify(obj.msg, obj.status);
                        }
                    }
                });
            }
        }
    });
}
//===========ADD SINGLE DATA ===========//
$("#add_btn").click(function () {
    var msg = $(this).attr('data-msg');
    var table = $(this).attr('data-table');
    var col = $(this).attr('data-col');
    bootbox.prompt(msg, function (udata) {

        if (udata) {
            var tdata = { "table": table, 'col': col, 'value': udata };
            $.ajax({
                'type': 'POST',
                'url': 'master_process?task=add_data',
                'data': tdata,
                success: function (data) {
                    ////alert(data);
                    var obj = JSON.parse(data);
                    $.notify(obj.msg, obj.status);
                }
            });
        }
    });
});

//======FORGET PASSWORD USING PROMPT BOX =======/
$("#forget_password").click(function () {
    bootbox.prompt("Enter email to reset password", function (data) {
        if (data) {
            $.ajax({
                'type': 'POST',
                'url': 'api.php?task=forget_password',
                'data': 'email=' + email,
                success: function (data) {
                    var obj = JSON.parse(data);
                    $.notify(obj.msg, obj.status);
                }
            });
        }
    });
});

$("#reset-password").click(function (e) {
    e.preventDefault();
    $("#forgot_password_form").validate({
        rules: {
            new_password: {
                minlength: 8
            },
            confirm_password: {
                minlength: 8,
                equalTo: "#confirm_password"
            }
        }
    })
    if ($("#forgot_password_form").valid()) {
        $(this).attr("disabled", true);
        $(this).html("Please Wait....");
        let data = $("#forgot_password_form").serialize();
        let task = $("#forgot_password_form").attr('action');
        $.ajax({
            type: "POST",
            url: 'api.php?task=' + task,
            data: data,
            success: function (data) {
                console.log(data);
                let obj = JSON.parse(data);
                if (obj.url != null) {
                    bootbox.alert(obj.msg, function () {
                        window.location.replace(obj.url);
                    });
                } else {
                    $.notify(obj.msg, obj.status);
                    $("#forgot_password_form")[0].reset();
                    $("#reset-password").attr("disabled", false);
                    $('#reset-password').html("Reset Password");
                }
            }

        })
    }
})
//======Change PASSWORD of Logged In User =======/
$("#change-password").click(function () {
    $(this).attr("disabled", true);
    $(this).html("Please Wait...");
    $("#change_password_form").validate();

    if ($("#change_password_form").valid()) {
        var op = $("#old_password").val();
        var np = $("#new_password").val();
        var cp = $("#confirm_password").val();
        var id = $("#id").val();
        if (np != cp) {
            $.notify("New password and Confirm password Not matched", "error");
            // location.reload();
        }
        else if (op == np) {
            $.notify("New password and Old password must be different", "error");
            // location.reload();
        }
        else {
            $.ajax({
                'type': 'POST',
                'url': 'api.php?task=change-password',
                data: { new_password: np, old_password: op, confirm_password: cp, id: id },
                success: function (data) {
                    ////alert(data);
                    var obj = JSON.parse(data);
                    if (obj.status.trim() == 'success') {
                        $.notify("Password Changed Succesfully", obj.status);
                        $("#change_password_form")[0].reset();
                        logout();
                    }
                    else {
                        $.notify("Sorry! Unable to Chanage Password ", "error");
                        $("#change_password_form")[0].reset();
                        $("#change_password").attr("disabled", false);
                    }
                }
            });
        }
    }

});



function populate(frm, data) {
    //$("#edit_modal").show();
    $.each(data, function (key, value) {
        var ctrl = $('[name=' + key + ']', frm);
        switch (ctrl.prop("type")) {
            case "radio": case "checkbox":
                ctrl.each(function () {
                    if ($(this).attr('value') == value) $(this).attr("checked", value);
                });
                break;
            case "select":
                $("option", ctrl).each(function () {
                    if (this.value == value) { this.selected = true; }
                });
                break;
            default:
                ctrl.val(value);
        }
    });
}

function json2table(selector, myList) {
    var columns = addAllColumnHeaders(myList, selector);

    for (var i = 0; i < myList.length; i++) {
        var row$ = $('<tr/>');
        for (var colIndex = 0; colIndex < columns.length; colIndex++) {
            var cellValue = myList[i][columns[colIndex]];
            if (cellValue == null) cellValue = "";
            row$.append($('<td/>').html(cellValue));
        }
        $(selector).append(row$);
    }
}

function addAllColumnHeaders(myList, selector) {
    var columnSet = [];
    var headerTr$ = $('<tr/>');

    for (var i = 0; i < myList.length; i++) {
        var rowHash = myList[i];
        for (var key in rowHash) {
            if ($.inArray(key, columnSet) == -1) {
                columnSet.push(key);
                headerTr$.append($('<th/>').html(key));
            }
        }
    }
    $(selector + ' thead').append(headerTr$);

    return columnSet;
}



//=====INSERT Item in Table =========//
$("#add_item_btn").on('click', function () {
    $("#item_frm").validate();


    if ($("#item_frm").valid()) {
        var task = $("#item_frm").attr('action');
        $(this).attr("disabled", true);
        $(this).html("Please Wait...");
        var data = $("#item_frm").serialize();
        $.ajax({
            'type': 'POST',
            'url': 'master_process?task=' + task,
            'data': data,
            success: function (data) {
                var obj = JSON.parse(data);
                location.reload(true);
                $("#add_item_btn").html("Add Item");
                $("#add_item_btn").removeAttr("disabled");
            }

        });
    }
});



//=====DELETE BUTTON =========//
$(".item_delete_btn").on('click', function () {
    var del_row = $($(this).closest("tr"));
    var id = $(this).attr("data-id");
    var table = $(this).attr("data-table");
    var pkey = $(this).attr("data-pkey");
    var url = $(this).attr("data-url");
    bootbox.confirm({
        message: "Do you really want to delete this?",
        buttons:
        {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    'type': 'POST',
                    'url': 'master_process?task=master_delete',
                    'data': { 'id': id, 'table': table, 'pkey': pkey, 'url': url },
                    success: function (data) {
                        //alert(data);

                        var obj = JSON.parse(data);
                        location.reload(true);
                        //window.location.replace(obj.url);
                        // if(obj.url!= null)
                        // {
                        // bootbox.alert(obj.msg, function(){ 
                        // window.location.replace(obj.url);
                        // });	
                        // }
                        // else{
                        // $.notify(obj.msg,obj.status);
                        // del_row.hide(500); 
                        // }
                    }
                });
            }
        }
    });
});

//==== Create HTML TO PDF ============//
function createpdf(file) {
    var pdf = new jsPDF('p', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#content')[0];

    // we support special element handlers. Register them with jQuery-style 
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors 
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.left, // x coord
        margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

        function (dispose) {
            // dispose: object with X, Y of the last line add to the PDF 
            //          this allow the insertion of new lines after html
            pdf.save(file + '.pdf');
        }, margins
    );
}

// ************************** purchase entry ******************************
$("#purchase_entry").on('change', function () {
    var purchase_id = $("#purchase_id").val();
    var taxmode = $("#tax_mode").val();
    var pid = $(this).val();
    if (pid != '') {
        $.ajax({
            'type': 'POST',
            'url': 'master_process?task=purchase_item_entry',
            'data': { 'product_id': pid, 'purchase_id': purchase_id, 'tax_mode': taxmode },
            success: function (data) {
                console.log(data);
                var obj = JSON.parse(data);
                location.reload(true);
            }
        });
    }
    $("#product_entry").val('');
    //}
});


/*============SALE ENTRY ==============*/

$("#product_entry").on('change', function () {
    //if (event.keyCode == 13) {

    var sale_id = $("#sale_id").val();
    var pid = $(this).val();
    if (pid != '' || pid != 0) {
        $.ajax({
            'type': 'POST',
            'url': 'master_process?task=sale_item_entry',
            'data': { 'product_id': pid, 'sale_id': sale_id },
            success: function (data) {
                console.log(data);
                var obj = JSON.parse(data);
                location.reload(true);
                //window.location.replace('sale_entry');
                //var row ="<tr><td>"+obj.product_name+"</td><td>"+obj.product_mrp+"</td><td><input type='number' min='1' required value='1' size='1'></td><td>"+obj.product_unit+"</td><td>"+obj.product_mrp+"</td><td><button type='btn btn-primary btn-danger' id='"+obj.txn_id+"'>Delete</button></td></tr>";
                //$("#selected_product").prepend(row);
                //localStorage.setItem("items",row);
            }
        });
    }
    $("#product_entry").val('');
    //}
});

$(document).on('change', '.product_qty,.product_rate,.product_discount', function () { // Live Edit 
    var num = $(this).data('num');
    var taxmode = $("#tax_mode").val();
    var product_gst = $('#gst' + num).val();
    var new_qty = $('#qty' + num).val();;
    var new_rate = $('#rate' + num).val();
    var obj = $('#rate' + num).data('row');
    var task = $('#task').val();
    console.log(obj);
    var new_discount = $('#discount' + num).val();
    var txn_id = $(this).attr('data-txn');
    var product_id = $(this).attr('data-product');

    if (new_qty <= 0) {
        $.notify("Invalid Product Quantity", 'error');
    }
    else {
        if (txn_id != '') {
            $.ajax({
                'type': 'POST',
                'url': 'master_process?task=' + task,
                'data': { 'txn_id': obj.txn_id, 'product_id': obj.product_id, 'new_qty': new_qty, 'product_rate': new_rate, 'product_gst': product_gst, 'product_discount': new_discount, 'tax_mode': taxmode },
                success: function (data) {
                    //console.log(data);
                    var obj = JSON.parse(data);
                    location.reload(true);
                }
            });
        }
    }
});


$(".inv_cancel_btn").on('click', function () {
    var sale_id = $("#sale_id").val();
    var old_sale_id = $('#old_sale_id').val();
    bootbox.confirm({
        message: "Do you really want to finally cancel this invoice?",
        buttons:
        {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    'type': 'POST',
                    'url': 'master_process?task=cancel_sale_invoice',
                    'data': { 'sale_id': old_sale_id },
                    success: function (data) {
                        //alert(data);

                        var obj = JSON.parse(data);
                        window.location.replace(obj.url);
                    }
                });
            }
        }
    });
});
$('#search-invoice').on('click', function () {
    var invoice_id = $('#search_item').val();
    invoice_id = invoice_id.trim();
    if (invoice_id.length > 1) {
        $.ajax({
            'type': 'POST',
            'url': 'master_process?task=open_purchase_invoice',
            'data': { 'purchase_id': invoice_id },
            success: function (data) {
                //alert(data);

                var obj = JSON.parse(data);
                if (obj.status == 'success') {
                    window.location.replace(obj.url);
                } else {
                    $.notify(obj.message, obj.status);
                }
            }
        });
    } else {
        $.notify('Invalid invoice no.', 'error');
    }
});
// end sale return 


$(document).on("keyup", "#opening_rate,#opening_stock", function () {
    var rate = $("#opening_rate").val();
    var qty = $("#opening_stock").val();
    console.log(rate + qty);
    var amt = parseFloat(rate) * parseFloat(qty);
    $("#opening_amount").val(amt);

});



//  ************************payment section starts********************
$(document).ready(function () {
    $('.modal').on('shown.bs.modal', function () {
        $(this).find('[autofocus]').focus();
    });
});
$('.make-payment').on('click', function (ele) {
    var row = $(this).data('row');
    //console.log(row.balance);
    $('#payTitle').html('Transaction Of ' + row.name);
    $('#payment_of').val(row.category);
    $('#txn_to').val(row.id);
    $('#total_dues').val(row.balance);
    $('#invoice_no').val(row.invoice_no);
});

function myDues() {
    var total = $('#total_dues').val();
    var disc = $('#disc_amount').val();
    var paid = $('#paid_amount').val();
    var dues = parseInt(total) - (parseInt(paid) + parseInt(disc));
    $('#dues_amount').val(dues);
}

$(document).ready(function () {
    $('.proceedTxn').on('click', function (ele) {
        console.log($(this).closest('form'));
        if ($('#paymentForm').valid()) {
            bootbox.confirm({
                message: "Are you sure  to proceed transaction?",
                buttons:
                {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result == true) {

                        var data = $('#paymentForm').serialize();

                        $.ajax({
                            'type': 'POST',
                            'url': 'master_process?task=make_payment',
                            'data': data,
                            success: function (data) {
                                console.log(data);

                                var obj = JSON.parse(data);
                                if (obj.status == 'success') {
                                    $.notify('Transaction Succesful', 'success');
                                    setTimeout(function () {
                                        location.reload(true);
                                    }, 2000);
                                }
                                else {
                                    $.notify('Something Went Wrong', 'error');
                                }

                            },
                            complete: function () {
                                $("#paymentForm")[0].reset();
                            }
                        });
                    }
                }

            });
        }
    });
});
// cash customer no dues
function checkDues() {
    var c_id = $('#customer_id').val();
    var payment = $('#payment').val();
    var dues = $('#dues').val();
    if (c_id == 0 && dues != 0.00) {
        $.notify('Sorry! Dues not allowed to cash customer.');
        $('#update_btn').prop('disabled', true);
    } else {
        $('#update_btn').prop('disabled', false);
    }
}
function loadUrl(url) {
    alert();
    window.location = url;
}
// **********************default customer
function defaultCustomer() {
    $.ajax({
        'type': 'POST',
        'url': 'master_process?task=default_customer',
        'data': { 'customer_id': '0' },
        success: function (data) {
            console.log(data);
            $("#customer_id").val(0);
            $('#customer_frm')[0].reset();

        }
    });
}

// $('.form-control').keypress(function (e) {
// var key = e.which;
// if(key == 13)  // the enter key code
// {
// //$('input[name = butAssignProd]').click();
// alert("Enter Key Not Working");
// return false;  
// }
// });   

// $(document).ready(function() {
// $(window).keydown(function(event){
// if(event.keyCode == 13) {
// event.preventDefault();
// //return false;
// alert("Hello");
// $("#login_btn").trigger('click');
// }
// });
// });

$('.form-control').keypress(function (e) {
    var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    if (key == 13) {
        e.preventDefault();
        var inputs = $(this).closest('form').find('.form-control');
        if (inputs.index(this) + 1 == inputs.length) {
            $("#update_btn").trigger('click');
        }
        else {
            inputs.eq(inputs.index(this) + 1).focus();
        }
    }
});

$(document).keydown(function (e) {
    //CTRL + V keydown combo

    if (e.ctrlKey && e.keyCode == 83) { //S
        e.preventDefault();
        $("#update_btn").trigger('click');
    }
})

$(document).on('click', '.view_data', function (e) {
    e.preventDefault();
    $('#view_data').modal('show').find('.modal-title').html($(this).attr('data-title'));
    $('#view_data').modal('show').find('.modal-body').load($(this).attr('data-href'));
});
	// $('input, select').on("keypress", function(e) {
            // /* ENTER PRESSED*/
            // if (e.keyCode == 13) {
                // /* FOCUS ELEMENT */
                // var inputs = $(this).parents("form").eq(0).find(":input");
                // var idx = inputs.index(this);

                // if (idx == inputs.length - 1) {
                    // inputs[0].select()
                // } else {
                    // inputs[idx + 1].focus(); //  handles submit buttons
                    // inputs[idx + 1].select();
                // }
                // return false;
            // }
        // });