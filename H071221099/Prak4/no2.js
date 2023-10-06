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
  
  let plaintext = "indonesia";
  let shift = 13;
  
  let ciphertext = zen(plaintext.toLowerCase(), shift);
  console.log(plaintext);
  console.log(zen(shift,shift), ciphertext);