$(document).ready(function () {

    $('.modalAdd').on('click', function () {

        $('#exampleModalLabel').html('Tambah Data');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#emp_no').val('');
        $('#firstname').val('');
        $('#lastname').val('');
        $('#dept_no').val('');
    });


    $('.modalEdit').on('click', function () {
        $('#emp_no').attr('type', 'hidden');
        $('#exampleModalLabel').html('Edit Data');
        $('.modal-footer button[type=submit]').html('Edit Data');

        let id = $(this).attr('data');
        $.ajax({
            type: 'POST',
            url: 'http://localhost:33/app/views/employees/index.php?value',
            data: {
                id: id
            },
            success: function (res) {
                // console.log(res);
                alert('ok');
                let data = JSON.parse(res);
                $('emp_no').attr('value', data.emp_no);
                $('.firstname').attr('value', data.firstname);
                $('.lastname').attr('value', data.lastname);
                // $('#editDeptModal').modal('show');
            }
        })


    });


});