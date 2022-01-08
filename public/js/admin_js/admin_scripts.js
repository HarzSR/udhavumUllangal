$(document).ready(function()
{
    $("#updatePass").click(function()
    {
        $("#updateForm").toggle();
    });

    $("#updatePwdReset").click(function ()
    {
        $("#currentPassword").html("");
        $("#new_pwd").attr("disabled", "disabled");
        $("#new_pwd").val("");
        $("#confirm_pwd").attr("disabled", "disabled");
        $("#confirm_pwd").val("");
        $("#submitPwd").attr("disabled", true);
    });

    if($("#current_pwd").val())
    {
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type: 'post',
            data:
            {
                current_pwd: current_pwd,
            },
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/check-current-password',
            success: function (response)
            {
                // console.log(response);
                if (current_pwd == "")
                {
                    $("#currentPassword").html("<font color='orange'> Please enter your current password to update to new One. </font>");
                    $("#new_pwd").attr("disabled", "disabled");
                    $("#new_pwd").val("");
                    $("#confirm_pwd").attr("disabled", "disabled");
                    $("#confirm_pwd").val("");
                    $("#submitPwd").attr("disabled", true);
                }
                else if (response == "False")
                {
                    $("#currentPassword").html("<font color='red'> Password is Incorrect. Please try again. </font>");
                    $("#new_pwd").attr("disabled", "disabled");
                    $("#new_pwd").val("");
                    $("#confirm_pwd").attr("disabled", "disabled");
                    $("#confirm_pwd").val("");
                    $("#submitPwd").attr("disabled", true);
                }
                else if (response == "True")
                {
                    $("#currentPassword").html("<font color='green'> Password is Current. Please enter your new Password. </font>");
                    $("#new_pwd").removeAttr("disabled");
                    $("#confirm_pwd").removeAttr("disabled");
                    $("#submitPwd").removeAttr("disabled");
                }
            },
            error: function (response) {
                // console.log("Error : " + response);
            }
        });
    }

    $("#new_pwd").attr("disabled", "disabled");
    $("#new_pwd").val("");
    $("#confirm_pwd").attr("disabled", "disabled");
    $("#confirm_pwd").val("");
    $("#submitPwd").attr("disabled", true);

    $("#current_pwd").keyup(function ()
    {
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type: 'post',
            data:
            {
                current_pwd: current_pwd,
            },
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/check-current-password',
            success: function (response)
            {
                // console.log(response);
                if (current_pwd == "")
                {
                    $("#currentPassword").html("<font color='orange'> Please enter your current password to update to new One. </font>");
                    $("#new_pwd").attr("disabled", "disabled");
                    $("#new_pwd").val("");
                    $("#confirm_pwd").attr("disabled", "disabled");
                    $("#confirm_pwd").val("");
                    $("#submitPwd").attr("disabled", true);
                }
                else if (response == "False")
                {
                    $("#currentPassword").html("<font color='red'> Password is Incorrect. Please try again. </font>");
                    $("#new_pwd").attr("disabled", "disabled");
                    $("#new_pwd").val("");
                    $("#confirm_pwd").attr("disabled", "disabled");
                    $("#confirm_pwd").val("");
                    $("#submitPwd").attr("disabled", true);
                }
                else if (response == "True")
                {
                    $("#currentPassword").html("<font color='green'> Password is Current. Please enter your new Password. </font>");
                    $("#new_pwd").removeAttr("disabled");
                    $("#confirm_pwd").removeAttr("disabled");
                    $("#submitPwd").removeAttr("disabled");
                }
            },
            error: function (response) {
                // console.log("Error : " + response);
            }
        });
    });

    $(".updateDonorStatus").click(function ()
    {
        var status = $(this).attr("donor_status");
        var donor_id = $(this).attr("donor_id");

        $("#ajaxStatus-" + donor_id).html(" Loading...");

        $.ajax({
            type: 'post',
            data: {
                status: status,
                donor_id: donor_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/update-donor-status',
            success: function (response)
            {
                // console.log(response);
                if(response['status'] == 0)
                {
                    $("#donor-" + donor_id).html("<a class=\"updateDonorStatus\" id=\"donor-" + donor_id  + "\"  donor_id=\"" + donor_id + "\" donor_status=\"inactive\" href=\"javascript:void(0)\"><label>INACTIVE<input type=\"checkbox\" ><span class=\"lever switch-col-indigo\"></span>ACTIVE</label><span id=\"ajaxStatus-" + donor_id  + "\" class=\"ajaxStatus-" + donor_id + "\"></span></a>");
                    $("#donor-" + donor_id).attr("donor_status", "inactive");
                    $("#ajaxStatus" + donor_id).html("");
                }
                else if(response['status'] == 1)
                {
                    $("#donor-" + donor_id).html("<a class=\"updateDonorStatus\" id=\"donor-" + donor_id + "\" donor_id=\"" + donor_id + "\" donor_status=\"active\" href=\"javascript:void(0)\"><label>INACTIVE<input type=\"checkbox\" checked ><span class=\"lever switch-col-indigo\"></span>ACTIVE</label><span id=\"ajaxStatus-" + donor_id  + "\" class=\"ajaxStatus-" + donor_id + "\"></span></a>");
                    $("#donor-" + donor_id).attr("donor_status", "active");
                    $("#ajaxStatus" + donor_id).html("");
                }
            },
            error: function (response)
            {
                // console.log("Error : " + response);
            }
        });

        return false;
    });
});
