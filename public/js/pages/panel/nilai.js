const table = {
  siswa: null,
};

$("body").on("click", ".btn-action", function (e) {
  e.preventDefault();
  const action = $(this).data("action");
  switch (action) {
    case "save":
      $.ajax({
        type: "POST",
        url: origin + "/api/siswa/nilai",
        data: JSON.stringify(getNilai()),
        cache: false,
        dataType: "json",
        contentType: "application/json",
        processData: false,
        success: (res) => {
          Toast.fire({
            icon: "success",
            title: "Data berhasil tersimpan",
          });
        },
      });
      break;
    default:
      break;
  }
});

function getNilai() {
  const data = $("input.update-nilai")
    .map(function (i, e) {
      return {
        siswa_id: Number($(e).data("siswa")),
        kriteria_id: Number($(e).data("kriteria")),
        nilai: Number($(e).val()),
      };
    })
    .get();
  return data;
}

$(document).ready(function () {
  cloud
    .add(origin + "/api/siswa", {
      name: "siswa",
      callback: (data) => {
        table.siswa.ajax.reload();
      },
    })
    .then((siswa) => {});
  cloud
    .add(origin + "/api/kriteria", {
      name: "kriteria",
      callback: (data) => {
        table.kriteria.ajax.reload();
      },
    })
    .then((kriteria) => {
      table.siswa = $("#table-siswa").DataTable({
        responsive: true,
        ajax: {
          url: origin + "/api/siswa",
          dataSrc: "",
        },
        columns: [
          {
            title: "#",
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            },
          },
          { title: "Nama", data: "nama" },
          ...kriteria.map((kriteria) => {
            return {
              title: kriteria.kode,
              data: "id",
              width: "4rem",
              render: function (data, type, row) {
                const value = row.nilai?.find((x) => x.kriteria_id === kriteria.id);
                return `<input type="number" class="update-nilai" data-siswa="${data}" data-kriteria="${kriteria.id}" value="${value?.nilai ?? 0}" />`;
              },
            };
          }),
        ],
      });
    });
});
