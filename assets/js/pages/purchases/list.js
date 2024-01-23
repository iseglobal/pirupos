function loadTable(page = 1) {
  const searchDate = document.getElementById("search-date").value;

  fetch(baseURL + "/ajax/purchases/list-sales.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "page=" + page + "&search-date=" + searchDate,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      document.getElementById("table-container").innerHTML = data.table;
      document.getElementById("pagination-container").innerHTML =
        data.pagination;
    });
}

document.addEventListener("DOMContentLoaded", function () {
  loadTable();

  document
    .getElementById("search-date")
    .addEventListener("change", function () {
      loadTable();
    });
});
