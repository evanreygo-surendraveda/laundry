@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Transaksi baru') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaksi.store') }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="nama">Nama Member</label>
                  <select name="id_member" class="form-control" @error('id_member') is-invalid @enderror name="id_member" id="id_member">
                    <option value=""> -Pilih- </option>
                    @foreach ($members as $item)
                    <option value="{{$item->id}}"{{old('id_member') == $item->id ? 'selected' : null}}>{{$item->nama}}</option>
                    @endforeach
                  </select>
                  @error('id_member')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <div class="form-group">
                  <label for="tgl">Tanggal</label>
                  <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" id="tgl" placeholder="Tanggal" autocomplete="off" value="{{ old('tgl') }}">
                  @error('tgl')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="lama_pengerjaan">Lama Pengerjaan</label>
                  <input type="number" class="form-control @error('lama_pengerjaan') is-invalid @enderror" name="lama_pengerjaan" id="lama_pengerjaan" placeholder="Hari" autocomplete="off" value="{{ old('lama_pengerjaan') }}">
                  @error('lama_pengerjaan')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>


                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" placeholder="Status" autocomplete="off" value="{{ old('status') }}">
                    <option value="">-Pilih-</option>
                    <option value="baru">Baru</option>
	                <option value="proses">Proses</option>
	                <option value="selesai">Selesai</option>
	                <option value="diambil">Diambil</option>
	          </select>
                  @error('status')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="status_bayar">Dibayar</label>
                    <select class="form-control @error('status_bayar') is-invalid @enderror" name="status_bayar" id="status_bayar" placeholder="Status pembayaran" autocomplete="off" value="{{ old('status_bayar') }}">
                      <option value="">-Pilih-</option>
                      <option value="dibayar">Dibayar</option>
                      <option value="belum_dibayar">Belum Dibayar</option>
                </select>
                    @error('dibayar')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>


                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-default">Back to list</a>


            </form>
        </div>
    </div>

    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush