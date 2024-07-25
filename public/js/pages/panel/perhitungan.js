const steps = [
  {
    step: 1,
    title: "Menghitung Jumlah Perkolom Matrix Kriteria",
    row: "normalize",
  },
  {
    step: 2,
    title: "Menghitung Matrix Nilai kriteria (Normalisasi)",
    row: "eigen",
  },
  {
    step: 3,
    title: "Menghitung Eigen Value",
    row: "crcalc",
  },
  {
    step: 4,
    title: "Menghitung Nilai CR",
    row: "alternatif",
  },
  {
    step: 5,
    title: "Hasil Perhitungan dengan Alternatif",
    row: "ranking",
  },
  {
    step: 6,
    title: "Melakukan Perankingan",
  },
  {
    step: 7,
    title: "Simpan Hasil",
  },
];

const IR = [0.0, 0.0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59];

$.fn.getColumn = function (column) {
  return this.find("tbody tr")
    .map(function () {
      return Number($(this).find("td").eq(column).text());
    })
    .get();
};

function getHasilValue() {
  const crits = cloud.get("kriteria");
  const siswa = cloud.get("siswa");
  const data = [];
  for (let s = 0; s < siswa.length; s++) {
    let id = s + 1;
    let nama = $("table#hasil tbody tr").eq(s).find("td").eq(0).text();
    let total = Number(
      $("table#hasil tbody tr")
        .eq(s)
        .find("td")
        .eq(crits.length + 1)
        .text()
    );
    data.push({
      id: id,
      nama: nama,
      total: total,
    });
  }
  data.sort((a, b) => b.total - a.total);
  return data;
}

$("body").on("click", "#btn-hitung", function (e) {
  const siswa = cloud.get("siswa");
  const crits = cloud.get("kriteria");
  const count = crits.length;
  const step = Number($(this).attr("data-step"));
  const btn = $(this);
  const keterangan = $(this).prev();
  btn.prop("disabled", true);

  switch (step) {
    case 1:
      for (let i = 0; i < count; i++) {
        let colval = $("table#pairwise").getColumn(i + 1);
        let total = colval.reduce((a, b) => a + b, 0);
        $("table#pairwise tfoot tr td")
          .eq(i + 1)
          .text(total);
      }
      break;
    case 2:
      for (let row = 0; row < count; row++) {
        for (let col = 0; col < count; col++) {
          let total = $("table#pairwise")
            .getColumn(col + 1)
            .reduce((a, b) => a + b);
          $(`table#normalize tbody td.${row + 1}-${col + 1}`).text(($(`table#pairwise tbody td.${row + 1}-${col + 1}`).text() / total).toFixed(2));
        }
      }
      for (let i = 0; i < count; i++) {
        let total = $("table#normalize")
          .getColumn(i + 1)
          .reduce((a, b) => a + b);
        let totalrow = $("table#normalize tbody tr")
          .eq(i)
          .find("td")
          .map((o, e) => {
            if (o == 0 || o > count) return;
            return Number($(e).text()).toFixed(2);
          })
          .get()
          .reduce((a, b) => Number(a) + Number(b));
        $("table#normalize tbody tr")
          .eq(i)
          .find("td")
          .eq(count + 1)
          .text(totalrow);
        $("table#normalize tbody tr")
          .eq(i)
          .find("td")
          .eq(count + 2)
          .text((totalrow / count).toFixed(2));
        $("table#normalize tfoot tr td")
          .eq(i + 1)
          .text(total);
      }
      $("table#normalize tfoot tr td")
        .eq(count + 1)
        .text(
          $("table#normalize")
            .getColumn(count + 1)
            .reduce((a, b) => a + b)
        );
      $("table#normalize tfoot tr td")
        .eq(count + 2)
        .text(
          $("table#normalize")
            .getColumn(count + 2)
            .reduce((a, b) => a + b)
            .toFixed(2)
        );
      break;
    case 3:
      for (let row = 0; row < count; row++) {
        let priority = Number(
          $("table#normalize tbody tr")
            .eq(row)
            .find("td")
            .eq(count + 2)
            .text()
        );
        for (let col = 0; col < count; col++) {
          $(`table#eigen tbody td.${col + 1}-${row + 1}`).text(($(`table#pairwise tbody td.${col + 1}-${row + 1}`).text() * priority).toFixed(3));
        }
      }
      for (let i = 0; i < count; i++) {
        let priority = Number(
          $("table#normalize tbody tr")
            .eq(i)
            .find("td")
            .eq(count + 2)
            .text()
        );
        let totalrow = $("table#eigen tbody tr")
          .eq(i)
          .find("td")
          .map((o, e) => {
            if (o == 0 || o > count) return;
            return Number($(e).text()).toFixed(3);
          })
          .get()
          .reduce((a, b) => Number(a) + Number(b));
        $("table#eigen tbody tr")
          .eq(i)
          .find("td")
          .eq(count + 1)
          .text(Number(totalrow).toFixed(3));
        $("table#eigen tbody tr")
          .eq(i)
          .find("td")
          .eq(count + 2)
          .text((totalrow + priority).toFixed(3));
      }
      $("table#eigen tfoot tr td")
        .eq(1)
        .text(
          $("table#eigen")
            .getColumn(count + 2)
            .reduce((a, b) => a + b)
            .toFixed(3)
        );
      break;
    case 4:
      let lambdamax = Number($("table#eigen tfoot tr td").eq(1).text()).toFixed(3);
      let n = count;
      let ri = IR[n - 1];
      let ci = Number(lambdamax - n).toFixed(3) / (n - 1);
      let cr = Number(ci / ri).toFixed(3);

      $("table#cr tbody tr td.n").text(n);
      $("table#cr tbody tr td.ci").text(ci);
      $("table#cr tbody tr td.ri").text(ri);
      $("table#cr tbody tr td.cr").text(cr);
      break;
    case 5:
      for (let row = 0; row < siswa.length; row++) {
        let total = 0;
        for (let col = 0; col < count; col++) {
          let cpriority = Number(
            $("table#normalize tbody tr")
              .eq(row)
              .find("td")
              .eq(count + 2)
              .text()
          );
          let nilai = Number(
            $("table#alternatif tbody tr")
              .eq(row)
              .find("td")
              .eq(col + 1)
              .text()
          );
          let scpriority = nilai <= 70 ? 0.11 : nilai <= 85 ? 0.36 : 0.63;
          let value = (cpriority * scpriority).toFixed(3);
          total += Number(value);
          $("table#hasil tbody tr")
            .eq(row)
            .find("td")
            .eq(col + 1)
            .text(value);
        }
        $("table#hasil tbody tr")
          .eq(row)
          .find("td")
          .eq(count + 1)
          .text(total.toFixed(3));
      }
      break;
    case 6:
      let table = $("table#ranking tbody");
      let data = getHasilValue();
      data.forEach((d, i) => {
        table.find("tr").eq(i).attr("data-id", d.id);
        table.find("tr").eq(i).find("td").eq(0).text(i + 1);
        table.find("tr").eq(i).find("td").eq(1).text(d.nama);
        table.find("tr").eq(i).find("td").eq(2).text(d.total);
      })
      break;
    case 7:
      $.ajax({
        type: "POST",
        url: origin + "/api/siswa/hasil",
        data: JSON.stringify(getRankingValue()),
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
      return;
    default:
      break;
  }
  keterangan.fadeOut("slow", () => {
    keterangan.text(steps[step].title);
    keterangan.fadeIn("slow", () => {
      btn.prop("disabled", false);
      $(this).attr("data-step", step + 1);
      $(`.row.${steps[step - 1].row}`).slideDown();
    });
  });
});

function getRankingValue() {
  const siswa = cloud.get("siswa");
  const table = $("table#ranking tbody");
  let data = [];
  $.each(siswa, function (i, s) { 
    let row = table.find(`tr[data-id="${s.id}"]`);
    data.push({
      id: s.id,
      ranking: Number(row.find("td").eq(0).text()),
      total: Number(row.find("td").eq(2).text()),
    });
  });
  return data;
}

$(document).ready(function () {
  cloud
    .add(origin + "/api/kriteria", {
      name: "kriteria",
      callback: (data) => {
        // table.kriteria.ajax.reload();
        // renderPerbandingan();
      },
    })
    .then((kriteria) => {
      // renderPerbandingan();
    });
  cloud
    .add(origin + "/api/siswa", {
      name: "siswa",
      callback: (data) => {
      },
    })
    .then((siswa) => {
      // renderPerbandingan();
    });
  $(".preloader").slideUp();
});
