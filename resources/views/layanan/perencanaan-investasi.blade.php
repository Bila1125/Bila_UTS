@extends('layouts.app')

@section('title', 'Perencanaan Investasi')

@section('content')
<div class="container py-5" style="max-width: 1000px;">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="font-family: 'Poppins', sans-serif; color:#154c79;">
            💹 Perencanaan Investasi
        </h1>
        <p class="text-muted">
            Atur rencana investasi kamu, termasuk jenis, target, periode, dan status. 📈
        </p>
    </div>

    <div class="card shadow-lg border-0 rounded-4" style="background: #f9fbfd;">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-primary">📊 Daftar Rencana Investasi</h5>
                <div>
                    <button class="btn btn-primary rounded-pill me-2 shadow-sm" id="addRow">➕ Tambah</button>
                    <button class="btn btn-outline-danger rounded-pill shadow-sm" id="clearAll">🗑 Hapus Semua</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle table-hover table-bordered shadow-sm rounded-3" id="investTable">
                    <thead class="table-primary" style="color:#154c79;">
                        <tr>
                            <th>No</th>
                            <th>Jenis Investasi</th>
                            <th>Target Dana (Rp)</th>
                            <th>Jangka Waktu (Bulan)</th>
                            <th>Estimasi Keuntungan (%)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <p class="text-center text-secondary mt-4 mb-0" style="font-size: 0.9rem;">
                💡 Data rencana investasi disimpan otomatis di browser.
            </p>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tableBody = document.querySelector("#investTable tbody");
    const addRowBtn = document.getElementById("addRow");
    const clearAllBtn = document.getElementById("clearAll");
    const STORAGE_KEY = "investPlanData";
    let data = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];

    function renderTable() {
        tableBody.innerHTML = "";
        data.forEach((row, index) => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td class="fw-bold text-secondary">${index + 1}</td>
                <td contenteditable="true" class="editable-cell" oninput="updateData(${index}, 'jenis', this.innerText)">${row.jenis}</td>
                <td contenteditable="true" class="editable-cell" oninput="updateData(${index}, 'target', this.innerText)">${row.target}</td>
                <td contenteditable="true" class="editable-cell" oninput="updateData(${index}, 'waktu', this.innerText)">${row.waktu}</td>
                <td contenteditable="true" class="editable-cell" oninput="updateData(${index}, 'keuntungan', this.innerText)">${row.keuntungan}</td>
                <td contenteditable="true" class="editable-cell" oninput="updateData(${index}, 'status', this.innerText)">${row.status}</td>
                <td>
                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="deleteRow(${index})">❌</button>
                </td>
            `;
            tableBody.appendChild(tr);
        });
        localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
    }

    window.updateData = function(index, key, value) {
        data[index][key] = value;
        localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
    };

    window.deleteRow = function(index) {
        data.splice(index, 1);
        renderTable();
    };

    addRowBtn.addEventListener("click", () => {
        data.push({ jenis: "", target: "", waktu: "", keuntungan: "", status: "Belum Dimulai" });
        renderTable();
    });

    clearAllBtn.addEventListener("click", () => {
        if (confirm("Yakin ingin menghapus semua rencana investasi?")) {
            data = [];
            localStorage.removeItem(STORAGE_KEY);
            renderTable();
        }
    });

    renderTable();
});
</script>

<style>
/* Tabel profesional & elegan */
.editable-cell {
    background-color: #ffffff;
    border-radius: 6px;
    padding: 6px 8px;
    transition: background 0.3s ease;
    min-width: 100px;
}
.editable-cell:hover {
    background-color: #e8f2fb;
}
table {
    border-collapse: separate;
    border-spacing: 0 6px;
}
table thead th {
    border-top: none;
    border-bottom: 3px solid #c7ddf3;
}
table tbody tr {
    background-color: #ffffff;
    border-radius: 8px;
}
table tbody tr:hover {
    background-color: #f2f8fe;
    transform: scale(1.01);
    transition: 0.2s ease;
}
</style>
@endsection
