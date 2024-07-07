// Script that opens project pop-up
var modals = document.getElementsByClassName('project-modal');
// Get the button that opens the modal
var btns = document.getElementsByClassName("learn-more-btn");
var spans = document.getElementsByClassName("close");
for (let i = 0; i < btns.length; i++) {
    btns[i].onclick = function () {
        modals[i].style.display = "block";
    }
}
for (let i = 0; i < spans.length; i++) {
    spans[i].onclick = function () {
        modals[i].style.display = "none";
    }
}
