
// login page 
function chooseRole(role) {
      userRole = role ;
      document.getElementById("roleText").textContent = "Selected: " + role;
      document.getElementById("overlay").style.display = "none";
      document.getElementById("loginWrapper").classList.add("show");

    }
    console.log("this is login page");

function gotoProfile(){
    console.log(userRole);
    console.log('login is success');
    window.location.href = `${userRole}Profile.html`
}