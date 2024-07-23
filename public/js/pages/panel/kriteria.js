const table = {
  kriteria: $("#table-kriteria").DataTable({
    responsive: true,
    ajax: {
      url: origin + "/api/kriteria",
      dataSrc: "",
    },
    columns: [
      {
        title: "#",
        data: "id",
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      { title: "Kode", data: "kode" },
      { title: "Keterangan", data: "nama" },
      {
        title: "Aksi",
        data: "id",
        render: (data, type, row) => {
          return `<div class="table-control">
          <a role="button" class="btn waves-effect waves-light btn-action red" data-action="delete" data-id="${data}"><i class="material-icons">delete</i></a>
          </div>`;
        },
      },
    ],
  }),
};

$("form#form-kriteria").on("submit", function (e) {
  e.preventDefault();
  const data = {};
  $(this)
    .serializeArray()
    .map(function (x) {
      data[x.name] = x.value;
    });

  const form = $(this)[0];
  const elements = form.elements;
  for (let i = 0, len = elements.length; i < len; ++i) {
    elements[i].readOnly = true;
  }

  $.ajax({
    type: "POST",
    url: origin + "/api/kriteria",
    data: data,
    cache: false,
    success: (data) => {
      $(this)[0].reset();
      cloud.pull("kriteria");
      if (data.messages) {
        $.each(data.messages, function (icon, text) {
          Toast.fire({
            icon: icon,
            title: text,
          });
        });
      }
    },
    complete: () => {
      for (let i = 0, len = elements.length; i < len; ++i) {
        elements[i].readOnly = false;
      }
    },
  });
});

$("body").on("click", ".btn-action", function (e) {
  e.preventDefault();
  const action = $(this).data("action");
  const id = $(this).data("id");
  switch (action) {
    case "delete":
      Swal.fire({
        title: "Apakah anda yakin ingin menghapus data ini ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "DELETE",
            url: origin + "/api/kriteria/" + id,
            cache: false,
            success: (data) => {
              cloud.pull("kriteria");
              if (data.messages) {
                $.each(data.messages, function (icon, text) {
                  Toast.fire({
                    icon: icon,
                    title: text,
                  });
                });
              }
            },
          });
        }
      });
      break;
    case "perbandingan":
      $.ajax({
        type: "POST",
        url: origin + "/api/kriteria/bobot",
        data: JSON.stringify(getMatrixPerbandingan()),
        cache: false,
        dataType: "json",
        contentType: "application/json",
        processData: false,
        success: (res) => {
          console.log(res);
        },
      });
      break;
    default:
      break;
  }
});

function renderPerbandingan() {
  const el = $("table.perbandingan");
  el.empty();
  const kriteria = cloud.get("kriteria");
  const thead = $("<thead><tr><th style='width:5rem'></th></tr></thead>");
  kriteria.forEach((kriteria) => {
    thead.find("tr").append(`<th style="width:5rem">${kriteria.kode}</th>`);
  })
  el.append(thead);

  const tbody = $("<tbody></tbody>");
  kriteria.forEach((krow, i) => {
    const tr = $(`<tr><th>${krow.kode}</th></tr>`);
    kriteria.forEach((kcol, j) => {
      if (krow.kode === kcol.kode) {
        tr.append(`<td>1</td>`);
      } else {
        const val = cloud.get("kriteria").find((kriteria) => kriteria.id === krow.id)?.perbandingan?.find((perbandingan) => perbandingan.kriteria_right_id === kcol.id).bobot;
        
        tr.append(`<td><input type="number" id="${krow.kode}-${kcol.kode}" value="${val ?? 1}" step="0.01" /></td>`);
      }
    })
    tbody.append(tr);
  })
  el.append(tbody);
}

$("body").on("change", "table.perbandingan input", function (e) {
  const el = $(this);
  const left = el.attr("id").split("-")[0];
  const right = el.attr("id").split("-")[1];
  $(`table.perbandingan input[id='${right}-${left}']`).val((1 / el.val()).toFixed(2));
});
$("body").on("keyup", "table.perbandingan input", function (e) {
  const el = $(this);
  const left = el.attr("id").split("-")[0];
  const right = el.attr("id").split("-")[1];
  $(`table.perbandingan input[id='${right}-${left}']`).val((1 / el.val()).toFixed(2));
});

function getMatrixPerbandingan() {
  const inputs = $("table.perbandingan input");
  const matrix = [];
  $.each(inputs, function (i, input) { 
    const left = cloud.get("kriteria").find((kriteria) => kriteria.kode === $(input).attr("id").split("-")[0]);
    const right = cloud.get("kriteria").find((kriteria) => kriteria.kode === $(input).attr("id").split("-")[1]);
    matrix.push({
      kriteria_left_id: left.id,
      kriteria_right_id: right.id,
      bobot: Number($(input).val()),
    });
  });
  return matrix;
}

$(document).ready(function () {
  cloud
    .add(origin + "/api/kriteria", {
      name: "kriteria",
      callback: (data) => {
        table.kriteria.ajax.reload();
        renderPerbandingan();
      },
    })
    .then((kriteria) => {
      renderPerbandingan();
    });
  $(".preloader").slideUp();
});
