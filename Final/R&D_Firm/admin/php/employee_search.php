<div class="search-wrap" style="position:relative; width:100%; font-family:sans-serif;">
    <input type="text" id="findInp" placeholder="Search name or ID..." onkeyup="doSearch()" autocomplete="off" 
        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px; outline:focus;">
    
    <div id="dropBox" style="position:absolute; width:100%; max-height:150px; overflow-y:auto; background:#fff; display:none; border:1px solid #ddd; z-index:99; box-shadow:0 4px 10px rgba(27, 26, 26, 0.1);">
        <?php if (!empty($employees)): ?>
            <?php foreach ($employees as $row): 
                $uID = $row['unique_id'] ?: 'N/A';
                $name = htmlspecialchars($row['username']);
                $rank = strtolower($row['rank'] ?? 'junior');
            ?>
                <div class="user-item" onclick="pick('<?= $uID; ?>', '<?= $name; ?>', '<?= $rank; ?>')" 
                    style="display:flex; align-items:center; justify-content:space-between; padding:10px; cursor:pointer; border-bottom:1px solid #f4f4f4;">
                    <div>
                        <strong><?= $name; ?></strong> 
                        <span style="background:#007bff; color:#fff; padding:2px 6px; border-radius:3px; font-size:10px;">ID: <?= $uID; ?></span>
                    </div>
                    <span class="rank-tag rank-<?= $rank; ?>" style="font-size:10px; font-weight:bold; padding:2px 6px; border-radius:3px; background:#eee;"><?= ucfirst($rank); ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div id="selBox" style="display:none; align-items:center; justify-content:space-between; padding:10px; border:1px solid #ddd; border-radius:5px; background:#f9f9f9;">
        <div>
            Selected: <strong id="pickedName"></strong> 
            <span id="pickedRank" style="font-size:10px; font-weight:bold; padding:2px 6px; border-radius:3px;"></span>
        </div>
        <button type="button" onclick="resetSearch()" style="background:none; border:none; cursor:pointer;">❌</button>
    </div>

    <input type="hidden" name="employee_id" id="valId">
</div>

<style>
    .user-item:hover { background:#9fe9c4 !important; }
</style>

<script>
function doSearch() {
    let val = document.getElementById('findInp').value.toLowerCase();
    let box = document.getElementById('dropBox');
    let list = document.getElementsByClassName('user-item');
    
    box.style.display = val.length > 0 ? 'block' : 'none';

    for (let i = 0; i < list.length; i++) {
        list[i].style.display = list[i].innerText.toLowerCase().includes(val) ? 'flex' : 'none';
    }
}

function pick(id, name, rank) {
    document.getElementById('valId').value = id;
    document.getElementById('pickedName').innerText = name + " (ID: " + id + ")";
    
    let r = document.getElementById('pickedRank');
    r.innerText = rank.toUpperCase();
    r.style.background = "#eee"; 

    document.getElementById('selBox').style.display = 'flex';
    document.getElementById('findInp').style.display = 'none';
    document.getElementById('dropBox').style.display = 'none';
}

function resetSearch() {
    document.getElementById('valId').value = "";
    document.getElementById('selBox').style.display = 'none';
    document.getElementById('findInp').style.display = 'block';
    document.getElementById('findInp').value = "";
    document.getElementById('findInp').focus();
}

document.addEventListener('click', (e) => {
    if (!document.querySelector('.search-wrap').contains(e.target)) {
        document.getElementById('dropBox').style.display = 'none';
    }
});
</script>