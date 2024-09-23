function greeting(){

    var d = new Date();
    var time = d.getHours();
    var greets;

    if(time >= 0 && time <= 12){

        greets = "Good Morning !";
    }
    else if(time > 12 && time <= 15){

        greets = "Good Afternoon !";
    }
    else if(time > 15 && time < 19){

        greets = "Good Evening !";
    }
    else if(time >= 19 && time <= 24){

        greets = "Good Night !";
    }

    document.getElementById("greet").innerHTML = greets;

}
function setDate(){

    var daysOfWeek =["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    var d = new Date();
    var today = d.getDay();
    var todate = d.getDate();
    var displayDay = daysOfWeek[d.getDay()];
    var displayMonth = monthsNames[d.getUTCMonth];

    document.getElementById("date").innerHTML= displayDay+" "+todate+" of "+displayMonth;   
}

function directUserInformation(){

    window.location.href = "user_information.php";
}
