let karakter = prompt("Masukkan inputan : ").split("");
let geser = parseInt(prompt("Geser "))
let huruf = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
let new_karakter = ""

console.log(huruf.length);

for (let i of karakter) {
    if (i === " ") {
        new_karakter += " "
    } else {
        new_karakter += huruf[((huruf.indexOf(i) + geser) % huruf.length)]
    }
}

alert(new_karakter);
