@extends('templates.address')

@section('content')
    <div class="row">
        <input type="hidden" id="token" value="{{ csrf_token() }}">
        <div class="col-6">
            <label for="form-penerima">Nama Penerima</label>
            <input type="text" name="penerima" id="form-penerima" class="form-control" @if($value != null) value="{{ $value->penerima }}" @endif>
            <small class="text-danger" id="error-penerima" style="display: none">Nama penerima tidak boleh kosong</small>
        </div>
        <div class="col-6">
            <label for="form-telp">Nomor Telepon</label>
            <input type="text" name="telp" id="form-telp" class="form-control" @if($value != null) value="{{ $value->telp }}" @endif>
            <small class="text-danger" id="error-telp" style="display: none">Nomor telepon tidak boleh kosong</small>
        </div>
        <div class="col-8 mt-2">
            <label for="form-telp">Alamat</label>
            <input type="text" name="alamat" id="form-alamat" class="form-control" @if($value != null) value="{{ $value->jalan }}" @endif>
            <small class="text-danger" id="error-alamat" style="display: none">Alamat tidak boleh kosong</small>
        </div>
        <div class="col-4 mt-2">
            <label for="form-telp">Kode Pos</label>
            <input type="text" name="kodepos" id="form-kodepos" class="form-control" @if($value != null) value="{{ $value->kodepos }}" @endif>
            <small class="text-danger" id="error-kodepos" style="display: none">Kode pos tidak boleh kosong</small>
        </div>
        <div class="col-12 mt-2">
            <label for="form-kota">Kota</label>
            <select name="kota" id="form-kota" class="form-control">
                <option value="">Pilih Kota</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id_kota }}" @if($value != null && $value->kota == $city->id_kota) selected @endif>{{ $city->nama }}</option>
                @endforeach
            </select>
            <small class="text-danger" id="error-kota" style="display: none">Pilih salah satu kota yang tersedia</small>
        </div>
        <div class="col-12 mt-2 text-right">
            <button class="btn btn-outline-secondary" target="{{ url('address') }}" onclick="cancelEdit(this)">Batal</button>
            <button class="btn btn-danger" target="{{ url('address/edit/'.$type) }}" move="{{ url('address') }}" onclick="approveEdit(this)">
                @if ($type == 'new')
                    Tambah
                @else
                    Ubah
                @endif
            </button>
        </div>
    </div>
@endsection
