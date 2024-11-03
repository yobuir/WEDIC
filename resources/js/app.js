import './bootstrap';

document.addEventListener('livewire:navigated', () => {
initFlowbite();
 const toggleButton = document.getElementById('navbar-toggle-button');
        const navbar = document.getElementById('navbar-sticky');
        toggleButton.addEventListener('click', function() {
            navbar.classList.toggle('hidden');
        });
});
