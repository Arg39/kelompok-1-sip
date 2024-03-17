$(document).ready(function () {
  // Find data buku when clicked search in data buku
  $(document).on("click", ".search", function () {
    let keyword = $(".keyword").val();
    $.ajax({
      method: "post",
      datatype: "json",
      data: { keyword: keyword },
      url: BASE_URL + "buku/search",
      success: function (response) {
        let searchData = JSON.parse(response);
        console.log(searchData);
        displaySearchResults(searchData);
      },
    });
  });

  function displaySearchResults(results) {
    let container = $(".content");
    container.empty();

    if (results.length > 0) {
      $.each(results, function (index, buku) {
        // Create HTML for each book card
        let cardHtml = `
                    <div class="col">
                        <div class="card h-100">
                            <img src="${BASE_URL}uploads/${buku.gambar}" class="card-img-top" alt="..." style="height: 194px; object-fit: cover; object-position: top;">
                            <div class="card-body">
                                <h6 class="card-title">${buku.judul}</h6>
                                <p class="card-text fs-6">Stok Buku: ${buku.jumlah}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary detail_buku" data-id="${buku.id}" data-bs-toggle="modal" data-bs-target="#detailModal"><i class="bi bi-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-warning edit_buku" data-id="${buku.id}" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></a>
                                        <a href="${BASE_URL}buku/delete/${buku.id}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                                    </div>
                                    <small class="text-muted ms-lg-1">Kode Buku: <span class="fw-semibold">${buku.id}</span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
        // Append the HTML to the container
        container.append(cardHtml);
      });
    } else {
      container.html("<p>No results found</p>");
    }
  }
});
