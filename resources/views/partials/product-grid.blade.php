<div class="product-grid">
    @foreach ($produks as $item)
        <div class="product-card-item fade-in" data-category="{{ $item->kategori_produk }}">
            <img src="{{ asset('storage/' . $item->gambar_produk) }}" alt="{{ $item->nama_produk }}">
            <div class="rating-wrapper">
                @for ($i = 0; $i < 5; $i++)
                    <ion-icon name="star" aria-hidden="true" class="{{ $i < ($item->rating ?? 0) ? 'filled' : '' }}"></ion-icon>
                @endfor
                <span class="span">({{ number_format($item->rating, 1) }})</span>
            </div>
            <h3>{{ $item->nama_produk }}</h3>
            <p>Rp. {{ number_format($item->harga_produk, 0, ',', '.') }}</p>
            <div class="product-icons-container">
                <div class="product-icons">
                    <a href="{{ route('shop.detail', $item->id_produk) }}" class="cart-icon">
                        <img src="/Kitter/assets/images/detail.png" alt="Detail Produk" class="icon-keranjang">
                    </a>
                </div>
                <div class="product-icons">
                    <form action="{{ route('keranjang.tambah', $item->id_produk) }}" method="POST">
                        @csrf
                        <input type="hidden" name="jumlah" value="1">
                        <button type="submit" class="cart-icon">
                            <img src="/Kitter/assets/images/keranjang.png" alt="Tambah Keranjang" class="icon-keranjang">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>