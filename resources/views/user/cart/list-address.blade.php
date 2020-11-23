@extends('templates.address')

@section('content')
    <button class="btn btn-outline-dark w-100 mb-1" target="{{ url('address/show-form/new') }}" type-data="new" onclick="showForm(this)">Tambah Alamat</button>
    @if (count($addresses) > 0)
        @foreach ($addresses as $item)
            <div class="card mb-1 @if($item->status == 1) active @endif">
                <div class="card-body">
                    <span style="font-weight: bold">{{ $item->penerima }}</span>
                    ({{ $item->telp }}) <br>
                    <span class="text-muted">{{ $item->jalan }}</span>,
                    <span class="text-muted">{{ $item->kodepos }}</span><br>
                    <span class="text-muted">{{ $item->City->nama }}</span><br><br>
                    @if ($item->status == 0)
                        <a class="text-danger btn-link" target="{{ url('address/set/'.$item->id) }}" move="{{ url('cart') }}" onclick="setAddress(this)">Pilih Alamat</a>
                    @endif
                    <a class="btn-link text-danger" target="{{ url('address/show-form/'.$item->id) }}" type-data="old" onclick="showForm(this)">Ubah Alamat</a>
                </div>
            </div>
        @endforeach
    @else
        <h4 class="text-center mt-1">Belum ada alamat yang terdaftar</h4>
    @endif
@endsection
