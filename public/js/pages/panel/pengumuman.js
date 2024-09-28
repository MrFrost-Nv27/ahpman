const table = {
  pengumuman: $("#table-pengumuman").DataTable({
    responsive: true,
    ajax: {
      url: origin + "/api/pengumuman",
      dataSrc: function (json) {
        // Mengubah objek menjadi array
        return Object.values(json);
      },
    },
    columns: [
      {
        title: "#",
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      {
        title: "Nama Siswa",
        data: "nama",
      },
      {
        title: "Total Nilai",
        data: "total",
        render: function (data, type, row) {
          return data ? data : "Belum Ada";
        },
      },
      {
        title: "Status",
        data: "status",
      },
    ],
  }),
};
