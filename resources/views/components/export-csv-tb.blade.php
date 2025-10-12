@props(['target_id' => null])

<button id="exportCsvBtn" data-id-table="{{ $target_id }}" class="flex rounded-[5.874740123748779px] h-full">
    <div
        class="flex justify-center items-center gap-[5.874740123748779px] bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border border-[#d0d5dd] hover:bg-gray-50 transition">
        <i class="bi bi-filetype-csv text-sm text-[#344054]"></i>
        <span class="font-medium text-[10.28px] leading-[14.68px] text-[#344054]">Export CSV</span>
    </div>
</button>

<script>
    document.getElementById("exportCsvBtn").addEventListener("click", function() {
        // Ambil ID tabel dari atribut data-id-table
        const tableId = this.getAttribute("data-id-table");
        const table = document.getElementById(tableId);

        if (!table) {
            alert("Tabel dengan ID '" + tableId + "' tidak ditemukan.");
            return;
        }

        let csvContent = "";

        // Ambil semua baris tabel
        const rows = table.querySelectorAll("tr");

        rows.forEach((row) => {
            const cols = row.querySelectorAll("th, td");
            const rowData = [];

            // Loop kolom tapi skip kolom terakhir (biasanya 'Action')
            cols.forEach((col, colIndex) => {
                if (colIndex !== cols.length - 1) {
                    const text = col.innerText.replace(/"/g, '""');
                    rowData.push(`"${text}"`);
                }
            });

            csvContent += rowData.join(",") + "\n";
        });

        // Buat blob CSV dan trigger download
        const blob = new Blob([csvContent], {
            type: "text/csv;charset=utf-8;"
        });
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");
        link.href = url;

        // Tambahkan nama file dengan tanggal
        const now = new Date();
        const formattedDate = now.toLocaleDateString("id-ID").replace(/\//g, "-");
        link.download = `Daftar_Pegawai_${formattedDate}.csv`;

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
</script>
