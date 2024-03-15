$(document).ready(function () {
  // Display data in modal when clicked in data rak
  $(document).on("click", ".edit_rak", function () {
    let kode = $(this).data("kode");
    let base_url = "http://localhost:8000/";
    $.ajax({
      method: "post",
      datatype: "json",
      data: { kode: kode },
      url: base_url + "rak/edit",
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
