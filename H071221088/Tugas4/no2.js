let plaintext = prompt("masukkan kata");
let shift = parseInt(prompt("Masukkan angka"));
let ciphertext = zen(plaintext.toLowerCase(), shift);

function zen(text, shift) {
  let alphabet = "abcdefghijklmnopqrstuvwxyz";

  let result = "";

  for (let i = 0; i < text.length; i++) {
    if (text[i] === " ") {
        result = result + " "
    } else {
        let char = text[i]
        let indexChar = alphabet.indexOf(char)
        result = result + alphabet[(indexChar+shift) % alphabet.length]
    }
  }

  return result;
}

console.log(plaintext);
console.log(zen(shift,shift), ciphertext);