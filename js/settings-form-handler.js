const div = document.getElementById("settings-div");
const nameForm = document.getElementById("name-div");
const emailForm = document.getElementById("email-div");
const passwordForm = document.getElementById("password-div");
const membertypeForm = document.getElementById("membertype-div");
const programForm = document.getElementById("program-div");
const departmentForm = document.getElementById("department-div");
const photoForm = document.getElementById("upload-photo");

function settingsNameHandler() {
    div.style.display = "block";
    nameForm.style.display = "block";
};

function settingsEmailHandler() {
    div.style.display = "block";
    emailForm.style.display = "block";
};

function settingsPasswordHandler() {
    div.style.display = "block";
    passwordForm.style.display = "block";
};

function settingsMemberTypeHandler() {
    div.style.display = "block";
    membertypeForm.style.display = "block";
};

function settingsProgramHandler() {
    div.style.display = "block";
    programForm.style.display = "block";
};

function settingsPhotoHandler() {
    div.style.display = "block";
    photoForm.style.display = "block";
};

function settingsDepartmentHandler() {
    div.style.display = "block";
    departmentForm.style.display = "block";
};


function leaveHandler() {
    div.style.display = "none";
    nameForm.style.display = "none";
    emailForm.style.display = "none";
    passwordForm.style.display = "none";
    membertypeForm.style.display = "none";
    programForm.style.display = "none";
    photoForm.style.display = "none";
    departmentForm.style.display = "none";
};
