<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>

<script>
    function toggleSubmenu(event, index) {
        const btn = event.currentTarget;
        const submenu = btn.nextElementSibling;

        // toggle height
        submenu.classList.toggle("max-h-0");
        submenu.classList.toggle("max-h-[500px]");

        // rotate icon
        const icon = btn.querySelector("span:last-child");
        icon.classList.toggle("rotate-180");
    }
</script>