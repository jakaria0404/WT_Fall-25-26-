<header class="top-bar">
    <div class="top-bar-left">
        <h1>WELCOME! ADMIN CONTROL</h1>
    </div>
    <div class="top-bar-right">
        <a href="../../employee/php/home.php" class="home-button">Home</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" onclick="toggleHeaderDropdown(event)">Profile <span>▼</span></a>
            <ul class="dropdown-menu">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="../../employee/php/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</header>

<script>

function toggleHeaderDropdown(event) {
    event.preventDefault();
    event.stopPropagation();

    let menu = event.currentTarget.nextElementSibling;
    let allMenus = document.querySelectorAll('.dropdown-menu');

    allMenus.forEach(m => {
        if (m !== menu) m.classList.remove('show');
    });

    menu.classList.toggle('show');
}

window.onclick = function(event) {
    if (!event.target.matches('.dropdown-toggle')) {
        let dropdowns = document.querySelectorAll('.dropdown-menu');
        dropdowns.forEach(menu => {
            if (menu.classList.contains('show')) {
                menu.classList.remove('show');
            }
        });
    }
}
</script>
