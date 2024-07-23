const elSiswa = $("[data-entity=siswa]");
const elKriteria = $("[data-entity=kriteria]");
$(document).ready(function () {
  cloud
    .add(origin + "/api/kriteria", {
      name: "kriteria",
      callback: (data) => {
        elKriteria.text(service.length).counterUp();
      },
    })
    .then((service) => {
      elKriteria.text(service.length).counterUp();
    });
});
