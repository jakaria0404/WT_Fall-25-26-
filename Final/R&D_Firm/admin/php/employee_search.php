<div class="emp-search-container">
    <input type="text" id="empSearch" placeholder="Search by Name or ID..." class="search-box" onkeyup="filterEmployees()" autocomplete="off">
    
    <div id="empDropdown">
        <?php if (!empty($employees)): ?>
            <?php foreach ($employees as $row): 
                $rank = strtolower($row['rank'] ?? 'junior');
                $uID = $row['unique_id'] ?: 'N/A';
            ?>
                <div class="emp-item" 
                     data-search="<?= strtolower($row['username'] . ' ' . $uID); ?>" 
                     onclick="selectThisEmp('<?= $uID; ?>', '<?= htmlspecialchars($row['username']); ?>', '<?= $rank; ?>')">
                    
                    <div class="emp-details">
                        <div class="emp-header">
                            <span class="emp-name"><?= htmlspecialchars($row['username']); ?></span>
                            <span class="id-badge">ID: <?= htmlspecialchars($uID); ?></span>
                        </div>
                        <span class="email-text"><?= htmlspecialchars($row['email']); ?></span>
                    </div>
                    
                    <div class="rank-container">
                        <span class="rank-badge rank-<?= $rank; ?>"><?= ucfirst($rank); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div id="selectedDisplay">
        <div>Selected: <strong id="selName"></strong> <span id="selRank" class="rank-badge"></span></div>
        <button type="button" onclick="cancelSelection()" class="cancel-btn">❌</button>
    </div>

    <input type="hidden" name="employee_id" id="targetId" required>
</div>

<script>
function filterEmployees() {
    let input = document.getElementById('empSearch').value.toLowerCase();
    let dropdown = document.getElementById('empDropdown');
    let items = document.getElementsByClassName('emp-item');
    
    if (input.length > 0) {
        dropdown.style.display = 'block';
        let found = false;
        for (let i = 0; i < items.length; i++) {
            let text = items[i].getAttribute('data-search');
            if (text.includes(input)) {
                items[i].style.display = 'flex';
                found = true;
            } else {
                items[i].style.display = 'none';
            }
        }
        if(!found) dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'none';
    }
}

function selectThisEmp(id, name, rank) {
    document.getElementById('targetId').value = id;
    document.getElementById('selName').innerText = name + " (ID: " + id + ")";
    
    let rankBadge = document.getElementById('selRank');
    rankBadge.innerText = rank.charAt(0).toUpperCase() + rank.slice(1);
    rankBadge.className = "rank-badge rank-" + rank;

    document.getElementById('selectedDisplay').style.display = 'flex';
    document.getElementById('empSearch').style.display = 'none';
    document.getElementById('empDropdown').style.display = 'none';
}

function cancelSelection() {
    document.getElementById('targetId').value = "";
    document.getElementById('selectedDisplay').style.display = 'none';
    document.getElementById('empSearch').style.display = 'block';
    document.getElementById('empSearch').value = "";
    document.getElementById('empSearch').focus();
}

document.addEventListener('click', function(e) {
    if (e.target.id !== 'empSearch') {
        document.getElementById('empDropdown').style.display = 'none';
    }
});
</script>