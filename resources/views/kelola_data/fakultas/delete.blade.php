<!-- Delete Confirmation Modal (Tailwind) -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <div id="deleteModalBackdrop" class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden z-10">
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-red-600">
            <h3 class="text-lg font-semibold text-white">Konfirmasi Hapus</h3>
            <button id="closeDeleteModal" type="button" class="text-white hover:text-gray-200 transition">
                <i class="bi bi-x-lg text-xl"></i>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <!-- Message -->
            <div class="text-center mb-6">
                <p class="text-sm text-gray-600 mb-2">Apakah Anda yakin ingin menghapus:</p>
                <p id="delete_fakultas_name" class="text-lg font-semibold text-gray-900 mb-3">-</p>
                <p class="text-xs text-red-600">Data yang dihapus tidak dapat dikembalikan</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3">
                <button type="button" id="cancelDeleteModal"
                    class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-all duration-200">
                    Batal
                </button>
                <button type="button" id="confirmDeleteBtn"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition-all duration-200">
                    Hapus
                </button>
            </div>
        </div>

        <!-- Hidden Form -->
        <form id="deleteForm" method="POST" action="" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

<script>
    let deleteFormAction = '';

    // Delete Modal logic
    function openDeleteFakultasModal(id, namaFakultas, deleteUrl) {
        document.getElementById('delete_fakultas_name').textContent = namaFakultas;
        deleteFormAction = deleteUrl;

        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function hideDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Delete Modal event listeners
    (function() {
        const closeBtn = document.getElementById('closeDeleteModal');
        const cancelBtn = document.getElementById('cancelDeleteModal');
        const confirmBtn = document.getElementById('confirmDeleteBtn');
        const backdrop = document.getElementById('deleteModalBackdrop');
        const deleteForm = document.getElementById('deleteForm');

        if (closeBtn) closeBtn.addEventListener('click', hideDeleteModal);
        if (cancelBtn) cancelBtn.addEventListener('click', hideDeleteModal);
        if (backdrop) backdrop.addEventListener('click', hideDeleteModal);

        if (confirmBtn) {
            confirmBtn.addEventListener('click', function() {
                if (deleteFormAction) {
                    deleteForm.action = deleteFormAction;
                    deleteForm.submit();
                }
            });
        }

        // Close on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideDeleteModal();
            }
        });
    })();
</script>
