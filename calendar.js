document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
     var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
 calendar.render();
});

function checkAvailability() {
    document.getElementById("availabilityIndicator").innerHTML = "<p>Availability: Available</p>";
}  function confirmBooking() {
    alert("Booking confirmed!");
}