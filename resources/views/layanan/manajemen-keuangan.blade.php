@extends('layouts.app')

@section('title', 'Manajemen Keuangan')

@section('content')
<div class="container py-5" style="max-width: 1000px;">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="font-family: 'Poppins', sans-serif; color:#116c66;">
            💼 Manajemen Keuangan
        </h1>
        <p class="text-muted">
            Catat pemasukan dan pengeluaran agar arus kas kamu tetap terkontrol 📊
        </p>
    </div>

    <div class="card shadow-lg border-0 rounded-4" style="background: #f8fdfc;">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold" style="color:#116c66;">🪙 Catatan Arus Kas</h5>
                <div>
                    <button class="btn btn-success rounded-pill me-2 shadow-sm" id="addRow">➕ Tambah</button>
                    <button class="btn btn-outline-danger rounded-pill shadow-sm" id="clearAll">🗑 Hapus Semua</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle table-hover text-center" id="cashFlowTable">
                    <thead class="text-white" style="background:#116c66;">
                        <tr>
                            <th style="width:40px;">No</th>
                            <th style="width:120px;">Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Pemasukan (Rp)</th>
                            <th>Pengeluaran (Rp)</th>
                            <th>Saldo (Rp)</th>
                            <th style="width:80px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <p class="text-center text-secondary mt-4 mb-0" style="font-size: 0.9rem;">
                💡 Semua catatan tersimpan otomatis di browser.
            </p>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tableBody = document.querySelector("#cashFlowTable tbody");
    const addRowBtn = document.getElementById("addRow");
    const clearAllBtn = document.getElementById("clearAll");
    const STORAGE_KEY = "cashFlowData";
    let data = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];

    function formatNumber(num) {
        return num ? parseFloat(num).toLocaleString('id-ID') : '';
    }

    function calculateSaldo(index) {
        let saldo = 0;
        for(let i = 0; i <= index; i++){
            const pemasukan = parseFloat(data[i].pemasukan) || 0;
            const pengeluaran = parseFloat(data[i].pengeluaran) || 0;
            saldo += pemasukan - pengeluaran;
        }
        return saldo;
    }

    function renderTable() {
        tableBody.innerHTML = "";
        data.forEach((row, index) => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td class="fw-bold text-secondary">${index + 1}</td>
                <td>
                    <input type="text" class="form-control form-control-sm" placeholder="YYYY-MM-DD" 
                           value="${row.tanggal || ''}" 
                           onchange="updateData(${index}, 'tanggal', this.value)">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" placeholder="Deskripsi" 
                           value="${row.deskripsi}" onchange="updateData(${index}, 'deskripsi', this.value)">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" placeholder="Kategori" 
                           value="${row.kategori}" onchange="updateData(${index}, 'kategori', this.value)">
                </td>
                <td>
                    <input type="number" min="0" class="form-control form-control-sm" placeholder="0" 
                           value="${row.pemasukan}" onchange="updateData(${index}, 'pemasukan', this.value)">
                </td>
                <td>
                    <input type="number" min="0" class="form-control form-control-sm" placeholder="0" 
                           value="${row.pengeluaran}" onchange="updateData(${index}, 'pengeluaran', this.value)">
                </td>
                <td>${formatNumber(calculateSaldo(index))}</td>
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
        renderTable();
    };

    window.deleteRow = function(index) {
        data.splice(index, 1);
        renderTable();
    };

    addRowBtn.addEventListener("click", () => {
        // Tanggal dikosongkan, user bisa isi tahun bebas (0004, 2025, dll)
        data.push({ 
            tanggal: "", 
            deskripsi: "", 
            kategori: "", 
            pemasukan: "", 
            pengeluaran: "" 
        });
        renderTable();
    });

    clearAllBtn.addEventListener("click", () => {
        if(confirm("Yakin ingin menghapus semua catatan keuangan?")) {
            data = [];
            localStorage.removeItem(STORAGE_KEY);
            renderTable();
        }
    });

    renderTable();
});
</script>

<style>
table {
    border-collapse: separate;
    border-spacing: 0 8px;
}
table thead th {
    border-top: none;
    border-bottom: none;
    border-radius: 8px;
}
table tbody tr {
    background-color: #ffffff;
    border-radius: 8px;
    transition: 0.2s ease;
}
table tbody tr:hover {
    background-color: #eafaf6;
    transform: scale(1.01);
}
input.form-control-sm {
    border-radius: 6px;
    font-size: 0.85rem;
    padding: 0.25rem 0.5rem;
}
</style>
@endsection
