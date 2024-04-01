$(function () {
  $.get(linkUserList)
    .then((result) => {
      let data = JSON.parse(result); // Convert từ string về object

      let html = "";
      for (let item of data) {
        let type = item.type
          ? '<span class="badge bg-primary">Admin</span>'
          : '<span class="badge bg-warning">Member</span>';

        html += `
                <tr id="row-${item.id}">
                    <td id="id-${item.id}">${item.id}</td>
                    <td id="name-${item.id}">${item.name}</td>
                    <td id="email-${item.id}">${item.email}</td>
                    <td id="type-${item.id}">${type}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" onclick="show(${item.id})" class="btn btn-info">Show</a>
                            <button type="button" onclick="formEdit(${item.id})" class="btn btn-warning">Edit</a>
                            <button type="button"
                                onclick="_delete(${item.id})"
                                class="btn btn-danger">Delete</button>
                        </div>
                    </td>
                </tr>
            `;
      }

      $("#list tbody").append(html);
    })
    .catch((err) => {
      console.log(err);
    });
});

function _delete(id) {
  if (confirm("Are you sure?")) {
    $.get(linkUserDelete + id)
      .then((result) => {
        $("tr#row-" + id).remove();

        alert("Thao tác thành công!");
      })
      .catch((err) => {
        console.log(err);
      });
  }
}

function show(id) {
  $.get(linkUserShow + id)
    .then((result) => {
      let data = JSON.parse(result);

      let html = "";
      for (const [key, value] of Object.entries(data)) {
        if (key == "type") {
          let type = value
            ? '<span class="badge bg-primary">Admin</span>'
            : '<span class="badge bg-warning">Member</span>';

          html += `
                <tr>
                  <td>${key}</td>
                  <td>${type}</td>
                </tr> 
              `;
        } else {
          html += `
              <tr>
                <td>${key}</td>
                <td>${value}</td>
              </tr> 
            `;
        }
      }

      $("#showModal table tbody").html(html);

      $("#showModal").modal("toggle");
    })
    .catch((err) => {
      console.log(err);
    });
}

function formEdit(id) {
  $.get(linkUserShow + id)
    .then((result) => {
      let data = JSON.parse(result);

      $("#id").val(data.id);
      $("#name").val(data.name);
      $("#email").val(data.email);
      $("#type").val(data.type);

      $("#formModal").modal("toggle");
    })
    .catch((err) => {
      console.log(err);
    });
}

function formCreate() {
  $("#id").val("");
  $("#name").val("");
  $("#email").val("");
  $("#password").val("");
  $("#type").val("");

  $("#formModal").modal("toggle");
}

function submitForm() {
  let id = $("#id").val();
  let name = $("#name").val();
  let email = $("#email").val();
  let password = $("#password").val();
  let type = $("#type").val();

  let data = {
    name: `${name}`,
    email: `${email}`,
    password: `${password}`,
    type: `${type}`,
  };

  if (id) {
    // Cập nhật
    $.post(linkUserUpdate + id, data)
      .then((result) => {
        let data = JSON.parse(result); // Convert từ string về object

        let type = data.type
          ? '<span class="badge bg-primary">Admin</span>'
          : '<span class="badge bg-warning">Member</span>';

        $(`tr#row-${id} td#name-${id}`).text(data.name);
        $(`tr#row-${id} td#email-${id}`).text(data.email);
        $(`tr#row-${id} td#type-${id}`).html(type);

        $("#formModal").modal('hide');
      })
      .catch((err) => {
        console.log(err);
      });
  } else {
    // Tạo mới
    $.post(linkUserCreate, data)
      .then((result) => {
        let data = JSON.parse(result); // Convert từ string về object

        let type = data.type
          ? '<span class="badge bg-primary">Admin</span>'
          : '<span class="badge bg-warning">Member</span>';

        let html = `
              <tr id="row-${data.id}">
                  <td>${data.id}</td>
                  <td>${data.name}</td>
                  <td>${data.email}</td>
                  <td>${type}</td>
                  <td>
                      <div class="btn-group">
                          <button type="button" onclick="show(${data.id})" class="btn btn-info">Show</a>
                          <button type="button" onclick="formEdit(${data.id})" class="btn btn-warning">Edit</a>
                          <button type="button"
                              onclick="_delete(${data.id})"
                              class="btn btn-danger">Delete</button>
                      </div>
                  </td>
              </tr>
          `;

        $("#formModal").modal('hide');

        $("#list tbody").prepend(html);
      })
      .catch((err) => {
        console.log(err);
      });
  }
}
