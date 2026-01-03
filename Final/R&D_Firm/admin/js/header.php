<script>

function closeAllDropdowns() {
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.classList.remove('show');
    });
}


function toggleHeaderDropdown(event) {
    
    event.preventDefault(); 
    
    event.stopPropagation(); 

    const dropdown = event.currentTarget.closest('.dropdown');
    const menu = dropdown.querySelector('.dropdown-menu');

    if (menu) {
        const isOpen = menu.classList.contains('show');
        
        
        closeAllDropdowns();

      
        if (!isOpen) {
            menu.classList.add('show');
        }
    }
}


document.addEventListener('click', (event) => {
    
    if (!event.target.closest('.dropdown')) {
        closeAllDropdowns();
    }
});
</script>