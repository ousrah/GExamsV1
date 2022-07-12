$('#listeRoles').on("change",function () {

    var role = $(this).val();
     $.ajax({
        type: 'POST',
        url: 'changeRole',
        data: {role: role},
        success: function (data) {location.reload();}
            });
})