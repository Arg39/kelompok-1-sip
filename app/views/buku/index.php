<?php foreach ($data['buku'] as $buku) {
    echo $buku['judul'];
    echo $buku['kategori'];
    echo $buku['lokasi'];
    echo $buku['pengarang'];
    echo $buku['penerbit'];
    echo $buku['tahun_terbit'];
    echo $buku['isbn'];
    echo $buku['jumlah'];

    echo '<br>';
} ?>