const word = prompt("Masukkan kata");
let hasil = 'Kata palindrom';

for (let i = 0; i < Math.floor(word.length / 2); i++) {
    if (word[i] !== word[word.length - 1 - i]) {
        hasil = 'Bukan kata palindrom';
        break;
    }
}

alert(`${word} adalah ${hasil}`);
