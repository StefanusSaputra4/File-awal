var tampilanInputs;
var data = [];
var radio = [];

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("tampilanInputs").style.display = "none"; // Mengatur style display tampilanInputs menjadi none saat halaman dimuat

  document.getElementById("btn").addEventListener("click", function (e) {
    // Menambahkan event listener untuk tombol OK
    textInput();
    this.remove();
  });
});

function textInput() {
  var jumlah = document.getElementById("jumlah").value;
  tampilanInputs = document.getElementById("tampilanInputs");
  tampilanInputs.style.display = "block";
  tampilanInputs.innerHTML = "";

  var input = [];

  for (var i = 1; i <= jumlah; i++) {
    var label = document.createElement("label");
    label.textContent = "Pilihan " + i + ":";

    input[i - 1] = document.createElement("input");
    input[i - 1].type = "text";
    input[i - 1].name = "teksTampilan" + i;

    tampilanInputs.appendChild(label);
    tampilanInputs.appendChild(input[i - 1]);
    tampilanInputs.appendChild(document.createElement("br"));
  }

  var button = document.createElement("button");
  button.type = "button";
  button.id = "buttonOK";
  button.textContent = "OK";

  tampilanInputs.appendChild(button);
  tampilanInputs.appendChild(document.createElement("br"));

  document.getElementById("buttonOK").addEventListener("click", function (e) {
    // Menambahkan event listener untuk button OK
    for (var i = 1; i <= jumlah; i++) {
      data[i - 1] = input[i - 1].value;
    }

    textRadio();
    this.remove();
  });
}

function textRadio() {
  var jumlah = document.getElementById("jumlah").value;

  for (var i = 0; i < data.length; i++) {
    var label = document.createElement("label");
    label.innerHTML = '<input type="radio" name="teksTampilan" id="Radio' + (i + 1) + '">' + data[i];
    label.setAttribute("for", "Radio" + (i + 1));
    tampilanInputs.appendChild(label);
  }

  for (var i = data.length + 1; i <= jumlah; i++) {
    var label = document.createElement("label");
    label.textContent = "Pilihan " + i + ": " + data[i - 1];
    tampilanInputs.appendChild(label);

    label = document.createElement("label");
    label.innerHTML = '<input type="radio" name="teksTampilan" id="Radio' + i + '">' + data[i - 1];
    label.setAttribute("for", "Radio" + i);
    tampilanInputs.appendChild(label);
  }

  radio = [];
  for (var i = 1; i <= jumlah; i++) {
    radio.push(document.getElementById("Radio" + i));
    radio[i - 1].addEventListener("click", function (e) {
      var radios = document.getElementsByName(this.name);

      radios.forEach(function (x) {
        x.checked = false;
      });

      this.checked = true;
    });
  }

  var button = document.createElement("button");
  button.name = "buttonLast";
  button.textContent = "OK";
  button.id = "buttonLast";
  tampilanInputs.appendChild(button);
  tampilanInputs.appendChild(document.createElement("br"));

  document.getElementById("buttonLast").addEventListener("click", function (e) {
    // Menambahkan event listener untuk button OK
    tampilkanData();
    this.remove();
  });
}

function tampilkanData() {
  var jumlah = document.getElementById("jumlah").value;
  var nama = document.getElementById("nama").value;
  var pilihanText = document.createElement("p");

  pilihanText.textContent = "Halo nama saya : " + nama + ", saya mempunyai sejumlah " + jumlah + " Pilihan yaitu: ";
  tampilanInputs.appendChild(pilihanText);

  for (var i = 0; i < radio.length; i++) {
    var pilihanElement = document.createElement("p");
    pilihanElement.textContent = "Pilihan " + (i + 1) + ": " + data[i];
    tampilanInputs.appendChild(pilihanElement);
  }

  var pilihanDipilih = "";
  for (var i = 0; i < radio.length; i++) {
    if (radio[i].checked) {
      pilihanDipilih = data[i];
      break;
    }
  }
  var pilihanDipilihElement = document.createElement("p");
  pilihanDipilihElement.textContent = "Pilihan yang saya pilih adalah : " + pilihanDipilih;
  tampilanInputs.appendChild(pilihanDipilihElement);
}
