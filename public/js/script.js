$(function() {

    $('.tombolTambahKategori').on('click', function() {
        $('#kategoriModalLabel').html('Tambah Kategori');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama_kategori').val('');
        $('#id').val('');
    });


    $('.tombolUbahKategori').on('click', function() {
        
        $('#kategoriModalLabel').html('Ubah Kategori');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', BASE_URL + 'kategori/ubah'); 

        const id = $(this).data('id');
        
        $.ajax({
            url: BASE_URL + 'kategori/getubah', 
            data: {id :id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#nama_kategori').val(data.nama_kategori);
            }
        });
        
    });

});
