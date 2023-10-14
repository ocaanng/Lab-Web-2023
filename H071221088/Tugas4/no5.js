let angka = parseInt(prompt("Masukkan Angka : "))
let binary = ""

while (true){
    binary = String(angka % 2) + binary
    angka = Math.floor(angka / 2)
    if (angka === 0) {
        break
    } 
}

alert(binary)