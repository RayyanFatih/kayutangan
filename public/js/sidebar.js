function toggleSubmenu(event, index) {
    event.preventDefault();
    const submenu = document.querySelectorAll('.submenu')[index];
    submenu.classList.toggle('max-h-0');
    submenu.classList.toggle('max-h-[500px]');
}
