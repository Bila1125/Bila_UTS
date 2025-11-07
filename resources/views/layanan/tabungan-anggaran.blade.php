@extends('layouts.app')

@section('title', 'Tabungan & Anggaran')

@section('content')
<div class="container py-5" style="max-width: 950px;">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="font-family: 'Poppins', sans-serif; color:#136f63;">
            Tabungan & Anggaran
        </h1>
        <p class="text-muted">
            Kelola tabunganmu dan buat rencana anggaran keuangan dengan mudah 💰
        </p>
    </div>

    <div class="card shadow-lg border-0 rounded-4" style="background: #f9fdfc;">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold" style="color:#136f63;">📋 Daftar Tabungan & Anggaran</h5>
                <div>
                    <button class="btn btn-success rounded-pill me-2 shadow-sm" id="addRow">➕ Tambah</button>
                    <button class="btn btn-outline-danger rounded-pill shadow-sm" id="clearAll">🗑 Hapus Semua</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle shadow-sm rounded-3 overflow-hidden" id="budgetTable">
                    <thead style="background:#d0f0ec; color:#136f63;">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Tabungan</th>
                            <th>Target (Rp)</th>
                            <th>Jumlah Saat Ini (Rp)</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <p class="text-center text-secondary mt-4 mb-0" style="font-size: 0.9rem;">
                💡 Data ini disimpan otomatis di browser Anda.
            </p>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tableBody = document.querySelector("#budgetTable tbody");
    const addRowBtn = document.getElementById("addRow");
    const clearAllBtn = document.getElementById("clearAll");
    const STORAGE_KEY = "tabunganData";
    let data = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];

    function formatRupiah(value) {
        if (!value) return "";
        return parseInt(value.toString().replace(/\D/g, '') || 0).toLocaleString('id-ID');
    }

    function saveData() {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
    }

    function createRow(row, index) {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td class="fw-bold text-secondary">${index + 1}</td>
            <td contenteditable="true" class="editable-cell">${row.nama}</td>
            <td contenteditable="true" class="editable-cell">${row.target}</td>
            <td contenteditable="true" class="editable-cell">${row.jumlah}</td>
            <td contenteditable="true" class="editable-cell">${row.kategori}</td>
            <td>
                <button class="btn btn-sm btn-outline-danger rounded-pill">❌</button>
            </td>
        `;

        const cells = tr.querySelectorAll(".editable-cell");

        // Update data saat mengetik
        cells[0].addEventListener("input", e => { data[index].nama = e.target.innerText; saveData(); });
        cells[1].addEventListener("input", e => { data[index].target = e.target.innerText.replace(/\D/g,''); saveData(); });
        cells[2].addEventListener("input", e => { data[index].jumlah = e.target.innerText.replace(/\D/g,''); saveData(); });
        cells[3].addEventListener("input", e => { data[index].kategori = e.target.innerText; saveData(); });

        // Format Rupiah saat blur
        cells[1].addEventListener("blur", e => { e.target.innerText = formatRupiah(data[index].target); });
        cells[2].addEventListener("blur", e => { e.target.innerText = formatRupiah(data[index].jumlah); });

        // Tombol hapus
        tr.querySelector("button").addEventListener("click", () => {
            data.splice(index,1);
            renderTable();
            saveData();
        });

        return tr;
    }

    function renderTable() {
        tableBody.innerHTML = "";
        data.forEach((row,index) => {
            tableBody.appendChild(createRow(row,index));
        });
    }

    addRowBtn.addEventListener("click", () => {
        data.push({ nama: "", target: "", jumlah: "", kategori: "" });
        renderTable();
        saveData();
    });

    clearAllBtn.addEventListener("click", () => {
        if (confirm("Yakin ingin menghapus semua data tabungan?")) {
            data = [];
            renderTable();
            saveData();
        }
    });

    renderTable();
});
</script>

<style>
.editable-cell {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 5px 10px;
    min-width: 80px;
    transition: 0.3s ease;
    outline: none;
}
.editable-cell:hover {
    background-color: #e9f9f5;
    cursor: text;
}
table {
    border-collapse: separate;
    border-spacing: 0 10px;
}
table thead th {
    border-top: none;
    border-bottom: 2px solid #bde4dc;
    font-weight: 600;
    text-align: center;
}
table tbody tr {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}
table tbody tr:hover {
    background-color: #f1fcf8;
    transform: scale(1.01);
    transition: 0.2s ease;
}
table td, table th {
    vertical-align: middle;
    text-align: center;
}
</style>
@endsection
