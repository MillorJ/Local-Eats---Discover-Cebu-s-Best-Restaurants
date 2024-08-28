const phrases = ["\"Local Eating in Cebu City\"", "\"Purely local!\"", "\"Cebulicous\"","\"Lami sa Cebu\""];
let phraseIndex = 0;
let letterIndex = 0;
const delay = 70; // Change the delay time here (in milliseconds)

const typeWriter = () => {
  if (letterIndex < phrases[phraseIndex].length) {
    document.getElementById("typewriter").innerHTML += phrases[phraseIndex].charAt(letterIndex);
    letterIndex++;
    setTimeout(typeWriter, delay);
  } else {
    setTimeout(eraseWriter, delay);
  }
};

const eraseWriter = () => {
  if (letterIndex > 0) {
    document.getElementById("typewriter").innerHTML = phrases[phraseIndex].substring(0, letterIndex - 1);
    letterIndex--;
    setTimeout(eraseWriter, delay);
  } else {
    phraseIndex = (phraseIndex + 1) % phrases.length;
    setTimeout(typeWriter, delay);
  }
};

window.onload = () => {
  typeWriter();
};