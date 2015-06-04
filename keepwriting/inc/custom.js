var date = new Date();   //Creates date object
var hours = date.getHours();   //get hour using date object
var minutes = date.getMinutes();    //get minutes using date object
var ampm = hours >= 12 ? 'pm' : 'am';  //Check wether 'am' or 'pm'

var month = date.getMonth(); //get month using date object
var day = date.getDate();    //get day using date object
var year = date.getFullYear();  //get year using date object
var dayname = date.getDay();  // get day of particular week

var monthNames = [ "January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December" ];

var week=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]; 

document.getElementById("nowday").innerHTML = week[dayname];
document.getElementById("nowdate").innerHTML = monthNames[month]+" "+day+", "+year;