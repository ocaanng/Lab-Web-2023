// let angka = parseInt(prompt("Masukkan Angka : "))
let binary = ""
let angka = 42

while (true){
    binary = String(angka % 2) + binary
    angka = Math.floor(angka / 2)
    if (angka === 0) {
        break
    } 
}

console.log(binary)