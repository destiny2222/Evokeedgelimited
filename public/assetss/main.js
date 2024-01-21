const Dropdown_button = document.querySelector(".dropdown_list_item");
const courses = document.querySelectorAll("#courses_id");
const Icon = document.querySelector(".chevron-down");

let i;

Dropdown_button.addEventListener('click', function() {
    for (i = 0; i < courses.length; i++) {
        if (courses[i].style.display === "none") {
            courses[i].style.display = "block";
            Icon.classList.add("icon_toggle");
        } else {
            courses[i].style.display = "none";
            Icon.classList.remove("icon_toggle");
        }
    }
    
});

window.onclick = function (event) {
    if (!event.target.matches('.dropdown_list_item')) {
        // document.getElementById('courses_id').style.display = "none";
    }
}