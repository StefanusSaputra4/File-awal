var tampilanInputs;
var data = [];
var radio = [];
var input = [];
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("tampilanInputs").style.display = "none"; // Mengatur style display tampilanInputs menjadi none saat halaman dimuat

  document.getElementById("btn").addEventListener("click", function (e) {
    this.remove();
    // Menambahkan event listener untuk tombol OK
    textInput();
  });
});

function textInput() {
  try {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    if (!firstName || !lastName || !email) {
      throw new Error("Nama depan, nama belakang, dan email harus diisi");
    }
    var jumlah = document.getElementById("hobbyCount").value;
    if (!jumlah) {
      throw new Error("Jumlah pilihan hobi harus diisi");
    }

    tampilanInputs = document.getElementById("tampilanInputs");
    tampilanInputs.style.display = "block";
    tampilanInputs.innerHTML = "";

    for (var i = 1; i <= jumlah; i++) {
      var div = document.createElement("div");
      div.classList.add("mb-3");

      var label = document.createElement("label");
      label.setAttribute("for", "teksTampilan" + i);
      label.classList.add("form-label", "text-white");
      label.textContent = "Pilihan " + i + ":";

      var input = document.createElement("input");
      input.type = "text";
      input.classList.add("form-control");
      input.id = "teksTampilan" + i;
      input.name = "teksTampilan" + i;
      input.required = true;

      div.appendChild(label);
      div.appendChild(input);

      tampilanInputs.appendChild(div);
    }

    var button = document.createElement("button");
    button.type = "button";
    button.id = "buttonOK";
    button.classList.add("btn", "btn-primary");
    button.innerText = "Oke";

    tampilanInputs.appendChild(button);
    tampilanInputs.appendChild(document.createElement("br"));

    document.getElementById("buttonOK").addEventListener("click", function (e) {
      // Menambahkan event listener untuk button OK
      for (var i = 1; i <= jumlah; i++) {
        data[i - 1] = document.getElementById("teksTampilan" + i).value;
      }
      this.remove();
      textRadio();
    });
  } catch (error) {
    // Tangani kesalahan dengan menampilkan pesan kepada pengguna
    alert(error.message);
  }
}

function textRadio() {
  var jumlah = document.getElementById("hobbyCount").value;

  // Membuat elemen h4 dengan teks "Hobi" dan menambahkannya ke tampilanInputs
  var h4 = document.createElement("h4");
  h4.textContent = "Hobi";
  tampilanInputs.appendChild(h4);

  for (var i = 0; i < data.length; i++) {
    var div = document.createElement("div");
    var label = document.createElement("label");
    var checkboxInput = document.createElement("input");
    checkboxInput.type = "checkbox"; // Mengubah tipe input menjadi checkbox
    checkboxInput.name = "teksTampilan";
    checkboxInput.id = "Checkbox" + (i + 1);
    label.appendChild(checkboxInput);
    label.innerHTML += data[i];
    label.setAttribute("for", "Checkbox" + (i + 1));
    div.appendChild(label);
    tampilanInputs.appendChild(div);
  }

  var button = document.createElement("button");
  button.textContent = "OK";
  button.id = "buttonLast";
  button.classList.add("btn", "btn-primary"); // Menambahkan kelas Bootstrap
  tampilanInputs.appendChild(button);
  tampilanInputs.appendChild(document.createElement("br"));

  button.addEventListener("click", function (e) {
    // Menambahkan event listener untuk button OK
    this.remove();
    tampilkanData();
  });
}

function tampilkanData() {
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var email = document.getElementById("email").value;
  if (!firstName || !lastName || !email) {
    throw new Error("Nama depan, nama belakang, dan email harus diisi");
  }
  var jumlah = document.getElementById("hobbyCount").value;
  var hobbyText = [];

  var checkboxes = document.querySelectorAll('input[name="teksTampilan"]:checked');
  checkboxes.forEach(function (checkbox) {
    hobbyText.push(checkbox.nextSibling.textContent.trim());
  });

  if (hobbyText.length === 0) {
    throw new Error("Pilih setidaknya satu hobi");
  }

  // Periksa apakah jumlah input yang diisi sama dengan jumlah pilihan yang dipilih
  if (hobbyText.length !== checkboxes.length) {
    throw new Error("Isi semua input untuk pilihan hobi yang dipilih");
  }

  var message = "Hallo, nama saya " + firstName + " " + lastName + ", dengan email " + email + ", saya mempunyai sejumlah " + hobbyText.length + " pilihan hobi yaitu: ";

  var p = document.createElement("p");
  p.textContent = message;
  tampilanInputs.appendChild(p);

  var ul = document.createElement("ul");
  hobbyText.forEach(function (hobby) {
    var li = document.createElement("li");
    li.textContent = hobby;
    ul.appendChild(li);
  });

  tampilanInputs.appendChild(ul);

  message = "Dan saya menyukai " + hobbyText.join(", ");

  var p2 = document.createElement("p");
  p2.textContent = message;
  tampilanInputs.appendChild(p2);

  // Hapus tombol setelah menampilkan data
  document.getElementById("buttonLast").remove();
}
