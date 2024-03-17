// Make image preview in modalTambah buku when upload image
function previewImage() {
  const cover = document.querySelector("#gambar");
  const imgPreview = document.querySelector("#preview");

  const fileCover = new FileReader();
  fileCover.readAsDataURL(cover.files[0]);

  fileCover.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}

$(document).ready(function () {
  // Display data in modal when clicked edit in data rak
  $(document).on("click", ".edit_rak", function () {
    let kode = $(this).data("kode");
    $.ajax({
      method: "post",
      datatype: "json",
      data: { kode: kode },
      url: BASE_URL + "rak/edit",
      success: function (response) {
        let data = JSON.parse(response);
        $(".kode").val(data.kode);
        $(".lokasi").val(data.lokasi);
      },
      error: function (response) {
        console.log(response);
      },
    });
  });
});

// Display data in modal when clicked detail_buku in data buku
$(document).on("click", ".detail_buku", function () {
  let id = $(this).data("id");
  $(".judul").val("");
  $(".pengarang").val("");
  $(".penerbit").val("");
  $(".tahun_terbit").val("");
  $(".isbn").val("");
  $(".jumlah").val("");
  $(".kode_rak").val("");
  $(".id_kategori").val("");
  $(".gambar").attr("src", BASE_URL + "uploads/default.jpg");
  $.ajax({
    method: "post",
    datatype: "json",
    data: { id: id },
    url: BASE_URL + "buku/detail",
    success: async function (response) {
      // send to value in input
      let data = await JSON.parse(response);
      console.log(data);
      $(".judul").val(data.judul);
      $(".pengarang").val(data.pengarang);
      $(".penerbit").val(data.penerbit);
      $(".tahun_terbit").val(data.tahun_terbit);
      $(".isbn").val(data.isbn);
      $(".jumlah").val(data.jumlah);
      $(".kode_rak").val(data.lokasi);
      $(".id_kategori").val(data.kategori);
      $(".gambar").attr("src", BASE_URL + "uploads/" + data.gambar);
    },
    error: function (response) {
      console.log(response);
    },
  });
});

// Display data in modal when clicked edit in data kategori
$(function () {
  $(".tombolTambahKategori").on("click", function () {
    $("#kategoriModalLabel").html("Tambah Kategori");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nama_kategori").val("");
    $("#id").val("");
  });

  $(".tombolUbahKategori").on("click", function () {
    $("#kategoriModalLabel").html("Ubah Kategori");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr("action", BASE_URL + "kategori/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: BASE_URL + "kategori/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id);
        $("#nama_kategori").val(data.nama_kategori);
      },
    });
  });
});
