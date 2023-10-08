let text = prompt("Kata : ").toLocaleLowerCase();
let reverse = "";

for (let i of text) {
    reverse = i + reverse;
}

if (reverse === text) {
    alert("Palindrom");
} else {
    alert("Bukan");
}