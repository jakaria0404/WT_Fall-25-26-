document.addEventListener('DOMContentLoaded',function(){
    console.log('Dashboard loaded');
});

<script>
function toggleHeaderDropdown(event) {
    event.preventDefault();
    event.stopPropagation();
    
    // Close all other dropdowns first
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.classList.remove('show');
        menu.style.display = 'none';
    });
    
    // Toggle current dropdown
    const dropdown = event.currentTarget.closest('.dropdown');
    const menu = dropdown.querySelector('.dropdown-menu');
    if (menu) {
        if (menu.classList.contains('show')) {
            menu.classList.remove('show');
            menu.style.display = 'none';
        } else {
            menu.classList.add('show');
            menu.style.display = 'block';
        }
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown')) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.remove('show');
            menu.style.display = 'none';
        });
    }
});
</script>
