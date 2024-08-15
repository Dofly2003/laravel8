<div>
    @foreach (  $kategori_produk as $item)
        <div>
           {{$item->id}} {{ $item->name }} 
        </div>
    @endforeach
</div>