const campos = document.querySelectorAll(".required");
const spans = document.querySelectorAll(".hidden-menu");


function HiddenSpan(index) {
    spans[index].style.display = "block";
  }

  function RemoveSpan(index) {
    spans[index].style.display = "none";
  }

  function selectUserType(userType) {
    const buttons = document.querySelectorAll('.user-button');
    buttons.forEach(button => {
        button.classList.remove('selected');
    });
    

    const resultDiv = document.getElementById('selectionResult');
    const resultText = document.getElementById('resultText');

    if (userType === '') {
        HiddenSpan(0, 1);
    } else if (userType === 'professor') {
        RemoveSpan(0, 1);
    } else if (userType === 'aluno') {
        RemoveSpan(0, 1);
    }
}