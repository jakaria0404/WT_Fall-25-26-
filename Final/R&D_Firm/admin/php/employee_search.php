<style>
    .search-area {
    position: relative;
    width: 100%;
}

.input-box {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}
.input-box:focus {
    border-color: #88eb61;
}
.list-box {
    position: absolute;
    width: 100%;
    max-height: 150px;
    overflow-y: auto;
    background: #fff;
    display: none;
    border: 1px solid #ddd;
    z-index: 100;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.item {
    padding: 10px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eee;
}

.item:hover {
    background: #88eb61;
}

.id-tag {
    background: #0c1235;
    color: #fff;
    padding: 2px 6px;
    border-radius: 3px;
    font-size: 11px;
    border-radius: 3px;
    border: none;
}

.rank-tag {
    padding: 2px 6px;
    border-radius: 3px;
    font-size: 11px;
    font-weight: bold;

}

.result-box {
    display: none;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border: 1px solid #ddd;
    background: #fafafa;
    border-radius: 4px;
}

.close-btn {
    cursor: pointer;
    background: none;
    border: none;
    font-size: 16px;
}

</style>

<div class="search-area">
    <input type="text" id="findInput" placeholder="Search employee..." class="input-box" onkeyup="searchUser()" autocomplete="off">
    
    <div id="dataList" class="list-box">
        <?php if (!empty($employees)): ?>
            <?php foreach ($employees as $row): 
                $uID = $row['unique_id'] ?: 'N/A';
                $name = htmlspecialchars($row['username']);
                $rank = strtolower($row['rank'] ?? 'junior');
            ?>
                <div class="item" onclick="pickUser('<?= $uID; ?>', '<?= $name; ?>', '<?= $rank; ?>')">
                    <div>
                        <strong><?= $name; ?></strong> 
                        <span class="id-tag">ID: <?= $uID; ?></span>
                    </div>
                    <span class="rank-tag rank-<?= $rank; ?>"><?= ucfirst($rank); ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div id="showSelected" class="result-box">
        <div>
            Selected: <strong id="pickedName"></strong> 
            <span id="pickedRank" class="rank-tag"></span>
        </div>
        <button type="button" class="close-btn" onclick="resetAll()">❌</button>
    </div>

    <input type="hidden" name="employee_id" id="saveId">
</div>

<script>
function searchUser() {
    let input = document.getElementById('findInput').value.toLowerCase();
    let list = document.getElementById('dataList');
    let items = document.getElementsByClassName('item');
    
    list.style.display = input.length > 0 ? 'block' : 'none';

    for (let i = 0; i < items.length; i++) {
        let text = items[i].innerText.toLowerCase();
        items[i].style.display = text.includes(input) ? 'flex' : 'none';
    }
}

function pickUser(id, name, rank) {
    document.getElementById('saveId').value = id;
    document.getElementById('pickedName').innerText = name + " (ID: " + id + ")";
    
    let tag = document.getElementById('pickedRank');
    tag.innerText = rank.toUpperCase();
    tag.className = "rank-tag rank-" + rank;

    document.getElementById('showSelected').style.display = 'flex';
    document.getElementById('findInput').style.display = 'none';
    document.getElementById('dataList').style.display = 'none';
}

function resetAll() {
    document.getElementById('saveId').value = "";
    document.getElementById('showSelected').style.display = 'none';
    document.getElementById('findInput').style.display = 'block';
    document.getElementById('findInput').value = "";
    document.getElementById('findInput').focus();
}

document.addEventListener('click', function(e) {
    if (!document.querySelector('.search-area').contains(e.target)) {
        document.getElementById('dataList').style.display = 'none';
    }
});
</script>