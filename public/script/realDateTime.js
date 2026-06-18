function updateDateTime() {
    let now = new Date();
    
    let optionsDate = { year: 'numeric', month: 'long', day: 'numeric' };
    let formattedDate = now.toLocaleDateString('en-US', optionsDate);
    
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let amPm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12; 
        minutes = minutes < 10 ? '0' + minutes : minutes;
    let formattedTime = `${hours}:${minutes} ${amPm}`;
    let formattedDateTime = `${formattedDate} (${formattedTime})`;
    document.getElementById("date").innerText = formattedDate;
    document.getElementById("time").innerText = formattedTime;
    document.getElementById("date-time").innerText = formattedDateTime;
}

updateDateTime(); 
setInterval(updateDateTime, 60000);