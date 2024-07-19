document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.edit-book, .view-active-bookings, .view-available-copies, .add-booking, .borrow');

    buttons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href = event.currentTarget.getAttribute('data-url');
        })
    })
});