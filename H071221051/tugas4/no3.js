let kata = prompt("Kata : ");
let ubah = "";

for (let i of kata) {
  ubah = i + ubah;
}

if (ubah == kata) {
  alert("Ini Palindrom");
} else {
  alert("Bukan Palindrom");
}
