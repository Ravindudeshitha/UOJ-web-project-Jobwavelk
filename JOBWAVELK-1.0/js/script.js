const signUpButton = document.getElementById('signup');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });




// document.querySelector('.signup').onclick=function(){
// 		var password = document.querySelector('.password').value,
// 		confirmPassword = document.querySelector('.confirmPassword').value;

// 		if(password !== confirmPassword){
// 			alert("Password didn't match try agaim.");
// 			return false
// 		}
// 		else{
// 			return true;
// 		}
// }