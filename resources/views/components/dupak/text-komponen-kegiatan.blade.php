{{-- resources/views/components/dupak/text-komponen-kegiatan.blade.php --}}

@props([
// Define props with default values (Key => Default Value)
'activityLabel' => 'Kegiatan Utama (Default)',

'inputName1' => 'item_description',
'inputPlaceholder1' => 'Deskripsi kegiatan/Mata Kuliah',

'inputName2' => 'item_quantity',
'inputPlaceholder2' => 'Jumlah/Jam',

'inputName3' => 'item_credit',
'inputPlaceholder3' => 'Angka Kredit',
])
<div class="mb-6">
	<div class="space-y-4">
		<div>
			{{-- Use the dynamic activityLabel prop --}}
			<label class="block text-sm font-medium text-gray-700">
				{{ $activityLabel }}
			</label>
			<div class="mt-2 space-y-2">
				<div class="flex items-center gap-4">
					{{-- Input 1 (Description/Subject) --}}
					<input type="text"
						name="{{ $inputName1 }}"
						placeholder="{{ $inputPlaceholder1 }}"
						class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

					{{-- Input 2 (Quantity/Hours) --}}
					<input type="number"
						name="{{ $inputName2 }}"
						placeholder="{{ $inputPlaceholder2 }}"
						class="w-32 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

					{{-- Input 3 (Credit Score) --}}
					<input type="number"
						name="{{ $inputName3 }}"
						placeholder="{{ $inputPlaceholder3 }}"
						class="w-32 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
				</div>
			</div>
		</div>
	</div>
</div>