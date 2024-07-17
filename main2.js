document.getElementById("Button1").addEventListener("click", myfunction);

function myfunction(z){
    if(z=="client"){
        window.location.href = "clientspage.php";
    }else{
        window.location.href = "workerspage.php";
    }
}
