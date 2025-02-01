const phoneNumberPattern = /^09\d{9}$/;

// [ Section 2 ]
// const question_1 = document.getElementById("question_1");
const question_2 = document.getElementById("question_2");
const question_3 = document.getElementById("question_3");
const question_4 = document.getElementById("question_4");
// [ Section 3 ]
const question_14 = document.getElementById("question_14");
// [ Section 4 ]
const question_16_1 = document.getElementById("question_16_1");
const question_16_3 = document.getElementById("question_16_3");
const question_17_1 = document.getElementById("question_17_1");
const question_17_3 = document.getElementById("question_17_3");
const question_17_4 = document.getElementById("question_17_4");

const submit_button = document.getElementById("submit_button");

// [ Section 2 ]
// question_1.addEventListener("input", function () {
//   this.value = this.value.toUpperCase();
// });

question_2.addEventListener("input", function () {
  this.value = this.value.toUpperCase();
});

question_3.addEventListener("input", function () {
  this.value = this.value.toUpperCase();
});

question_4.addEventListener("input", function () {
  if (question_4.value.length == 11) {
    question_4.classList.remove("border-danger");
    submit_button.disabled = false;
  } else {
    question_4.classList.add("border-danger");
    submit_button.disabled = true;
  }
});

// [ Section 3 ]
question_14.addEventListener("input", function () {
  if (question_14.value.length <= 11) {
    question_14.classList.add("border-danger");
  }
});
