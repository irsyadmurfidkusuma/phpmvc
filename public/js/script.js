$(function() {

    // event tambah data
    $('.tombolTambah').on('click', function() {
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    // event ubah data
    $('.tampilModalUbah').on('click', function() {

        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');


        const id = $(this).data('id');

        $.ajax({
            url: "http://localhost/phpmvc/public/mahasiswa/getubah",
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#npm').val(data.npm);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);

            }
        });



    });

    // set sweetalert tambah data dan update
    const data = $('#flash').data('flasher');
    console.log(data);

    if (data) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Data telah ' + data,
            showConfirmButton: true
        });
    }

    // sweet alert hapus data
    // const tombolHapus = $('#tombolHapus');
    // console.log(tombolHapus);
    // <?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>

    $('.tombolHapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Jika kamu menghapus, maka data tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                // Swal.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                // )
            }
        });
    });




});