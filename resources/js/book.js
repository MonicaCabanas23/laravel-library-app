document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.edit-book, .view-active-bookings, .view-available-copies, .add-booking');

    buttons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            console.log('Button clicked');
            window.location.href = event.currentTarget.getAttribute('data-url');
        })
    })
});