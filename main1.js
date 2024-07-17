function preventback(){
    window.history.forward()
};
setTimeout("preventback()",0);

if(preventback()){
    alert("Logout from the profile session");
}
