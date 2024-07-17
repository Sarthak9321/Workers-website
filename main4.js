document.addEventListener("DOMContentLoaded", function () {
    const daysContainer = document.querySelector(".days");
    const currentMonthYear = document.getElementById("currentMonthYear");
    const eventCounter = document.getElementById("eventCounter");
    const markedDates = document.getElementById("marked-dates");

    let currentDate = new Date();
    let selectedDate = currentDate; // Initialize selectedDate with the current date
    let events = {};
    var markedDatesArray = [];

    function addDate(date,month,year) {
        if (!markedDatesArray.includes(date+"-"+month+"-"+year)){
            markedDatesArray.push(date+"-"+month+"-"+year);
        }
    }
    function removeDate(date,month,year) {
        var index = markedDatesArray.indexOf(date+"-"+month+"-"+year);
        if (index > -1) {
            markedDatesArray.splice(index, 1);
        }
      }
    function displayDates() {
        let html = '';

        for (const date of markedDatesArray) {
            html += `<li>${date}</li>`;
        }
        markedDates.innerHTML = html;
    }

    function renderCalendar(date) {
        const firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

        currentMonthYear.textContent = `${date.toLocaleDateString('default', { month: 'long' })} ${date.getFullYear()}`;
        daysContainer.innerHTML = '';

        for (let i = 1; i <= lastDay.getDate(); i++) {
            const day = document.createElement("div");
            day.classList.add("day");
            day.textContent = i;
            day.addEventListener("click", () => handleDayClick(i));
            daysContainer.appendChild(day);

            // Mark the date if it is selected
            if (date.getMonth() === selectedDate.getMonth() && i === selectedDate.getDate()) {
                day.style.backgroundColor = "#007BFF";
                
            }
            
        }

        for (let day in events) {
            const mark = document.createElement("div");
            mark.classList.add("mark");
            mark.classList.add(events[day] ? "mark-filled" : "mark-empty");
            const dayElement = daysContainer.querySelector(`.day:nth-child(${day})`);
            if (dayElement) {
                dayElement.appendChild(mark);
            }
        }

        updateEventCounter();
        displayDates();
    }
    function handleDayClick(day) {
        selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
        // Check if the event for the day is defined
  if (!events[day]) {
    events[day] = false;
  }
        events[day] = !events[day];
        if(events[day]){
        addDate(selectedDate.getDate(),selectedDate.getMonth(),selectedDate.getYear());
        }else{
            removeDate(selectedDate.getDate(),selectedDate.getMonth(),selectedDate.getYear());
        } // Toggle event for the day
        renderCalendar(currentDate);
    }

    function updateEventCounter() {
        const totalEvents = markedDatesArray.length;
        eventCounter.textContent = `Total Days: ${totalEvents}`;
        console.log(`${totalEvents}`);
        createCookies('event',`${totalEvents}`,1);

        function createCookies(name, value, days) {
            var expires;
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        
            document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
        }
      }

    document.getElementById("prevMonth").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    document.getElementById("nextMonth").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    renderCalendar(currentDate);
    function amount(amount){
        createCookies('amountininr',amount,1);
        function createCookies(name, value, days) {
            var expires;
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        
            document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
        }
    }
    // Save marked dates as a cookie
createCookie('markedDates', JSON.stringify(markedDatesArray), 1); // Expiration in days

// Retrieve marked dates from a cookie
const cookieValue = getCookie('markedDates');
if (cookieValue) {
    markedDatesArray = JSON.parse(cookieValue);
    displayDates(); // Update the displayed marked dates
}

function createCookie(name, value, days) {
    var expires;
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = escape(name) + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(nameEQ) === 0) {
            return unescape(cookie.substring(nameEQ.length, cookie.length));
        }
    }
    return null;
}

});