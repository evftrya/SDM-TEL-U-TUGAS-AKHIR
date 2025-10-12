document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("printTableBtn")
        .addEventListener("click", function () {
            // Clone tabel agar tidak mengubah aslinya
            const table = document
                .getElementById("pegawaiTable")
                .cloneNode(true);

            // Hapus kolom terakhir (Action) di setiap baris <thead> dan <tbody>
            table.querySelectorAll("tr").forEach((tr) => {
                const lastCell = tr.lastElementChild;
                if (lastCell) lastCell.remove();
            });

            // Hapus elemen filter (input/select di header)
            table
                .querySelectorAll("thead input, thead select")
                .forEach((el) => el.remove());

            // Ambil tanggal & waktu saat ini
            const now = new Date();
            const options = {
                year: "numeric",
                month: "long",
                day: "numeric",
                hour: "2-digit",
                minute: "2-digit",
                timeZone: "Asia/Jakarta",
            };
            const formattedDate = now.toLocaleString("id-ID", options) + " WIB";

            // Nama halaman
            const pageTitle = "Daftar Pegawai";

            // Buat jendela print baru
            const newWin = window.open("");
            newWin.document.write(`
                <html>
                    <head>
                        <title>${pageTitle}</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                padding: 20px;
                                color: #000;
                            }
                            h1 {
                                text-align: center;
                                font-size: 18px;
                                margin-bottom: 5px;
                                color: #1c2762;
                            }
                            p.print-date {
                                text-align: center;
                                font-size: 12px;
                                margin-bottom: 20px;
                                color: #555;
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 10px;
                            }
                            th, td {
                                border: 1px solid #ccc;
                                padding: 8px;
                                text-align: center;
                                font-size: 12px;
                            }
                            th {
                                background-color: #f0f4ff;
                                color: #1c2762;
                            }
                            @media print {
                                body { -webkit-print-color-adjust: exact; }
                            }
                        </style>
                    </head>
                    <body>
                        <h1>${pageTitle}</h1>
                        <p class="print-date">Dicetak pada: ${formattedDate}</p>
                        ${table.outerHTML}
                    </body>
                </html>
            `);
            newWin.document.close();
            newWin.focus();
            newWin.print();
        });
});
