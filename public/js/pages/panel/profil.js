

$("form#form-profil").on("submit", function (e) {
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
    url: origin + "/api/siswa/" + data.id,
    data: data,
    cache: false,
    success: (data) => {
      cloud.pull("siswa");
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

const datePicker = M.Datepicker.init(document.querySelectorAll(".form-datepicker"), {
  format: "yyyy-mm-dd",
  defaultDate: new Date(),
  setDefaultDate: true,
  autoClose: true,
  container: document.querySelector("body"),
});


$(document).ready(function () {
  cloud
    .add(origin + "/api/siswa/login", {
      name: "siswa",
      callback: (data) => {},
    })
    .then((siswa) => {
      $("form").find(`[name=id]`).val(siswa.id);
      $.each(siswa, function (field, val) {
        $("form").find(`[name=${field}]`).val(val);
      });
      M.updateTextFields();
      M.textareaAutoResize($("textarea"));
    });
});
