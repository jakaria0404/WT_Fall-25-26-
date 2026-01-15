<header class="top-bar">
    <div class="top-bar-left">
        <h1>WELCOME! ADMIN CONTROL</h1>
    </div>
    <div class="top-bar-right">
        <a href="../../index.php" class="home-button">Home</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" onclick="toggleHeaderDropdown(event)">Profile <span>▼</span></a>
            <ul class="dropdown-menu">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="../../auth/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</header>

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
