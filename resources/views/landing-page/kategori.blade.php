@php
namespace App\Http\Controllers;
use App\Models\Berita;
@endphp


<div class="sidebar-box" data-aos="fade-up" data-aos-delay="200">
	<div class="categories">
		<h3>Categories</h3>

		@if ($baru->count() != 0)

		<div class="d-flex justify-content-between align-items-center bg-abu py-3 px-4 cursor-pointer rounded-2 mb-2">
			<a href="{{ url('/berita') }}" class="text-hitam ">Semua</a>
			<p class="px-2 bg-yellow rounded-3 text-black"><small>{{ $berita->count() }}</small></p>
		</div>

		@foreach ($baru as $ktgs)

		<div class="d-flex justify-content-between align-items-center bg-abu py-3 px-4 cursor-pointer rounded-2 mb-2">
			<a href="{{ url('/berita/kategori', $ktgs->slug) }}" class="text-hitam ">{{ $ktgs->nama }}</a>
			<p class="px-2 bg-yellow rounded-3 text-black"><small>{{ $c = Berita::where('kategoriId', $ktgs->id)->count() }}</small></p>
		</div>

		@endforeach

		@else
        	<h4 class="text-center">Data tidak Ditemukan.</h4>
        @endif

	</div>
</div>