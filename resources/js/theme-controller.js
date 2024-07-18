document.addEventListener('DOMContentLoaded', function() {
    const controller = document.querySelector('.theme-controller');
    const body = document.body;
    
    setTheme(controller);

    if (controller) {
        controller.addEventListener('change', (e) => {
            if(e.target.checked) {
                body.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            }
            else {
                body.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            }
        })
    }
});

// Checks if the theme is set in local storage, if not, set it to light
const setTheme = (controller) => {
    const currentTheme = localStorage.getItem('theme');

    if(currentTheme) {
        if(currentTheme === 'dark') 
            controller.checked = true;
        else 
            controller.checked = false;

        document.body.setAttribute('data-theme', currentTheme);
    }
    else {
        document.body.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
        controller.checked = false;
    }
}