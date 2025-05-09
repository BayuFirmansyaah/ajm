<div>
    {{-- <div class="row">
        <div class="col-lg-4 col-md-4 col-12 mb-6">
            <div class="card h-100">
                <div class="card-body">
                    <p class="mb-1">Total Orderan Hari Ini</p>
                    <h4 class="card-title mb-3">12 Transaksi</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12 mb-6">
            <div class="card h-100">
                <div class="card-body">
                    <p class="mb-1">Total yang Harus Selesai Hari Ini</p>
                    <h4 class="card-title mb-3">0 Transaksi</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12 mb-6">
            <div class="card h-100">
                <div class="card-body">
                    <p class="mb-1">Total yang Harus Selesai Besok</p>
                    <h4 class="card-title mb-3">0 Transaksi</h4>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row mt-0">
        <div class="col-12">
            <div class="card card-body overflow-auto">
                <div class="col-12 mb-6">
                    <div class="row mb-3">
                        <div class="col-12">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Silahkan Masukan Kata Kunci Pencarian"
                                wire:input="doSearch"
                                wire:model="search"
                            >
                        </div>
                        {{-- <div class="col-2">
                            <button
                                class="btn btn-primary w-100"
                                wire:click="doSearch"
                            >
                                Cari Data
                            </button>
                        </div> --}}
                    </div>
                </div>

                <div wire:loading class="text-center my-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <table class="table table-bordered table-scroll">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nota</th>
                            <td>Bara</td>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Gol</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $trx)
                            <tr>
                                <td>
                                    {{ ($transactions->currentPage() - 1) * $transactions->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ $trx->nota }}</td>
                                <td>{{ $trx->bara }}</td>
                                <td>{{ $trx->qty }}</td>
                                <td>{{ $trx->harga }}</td>
                                <td>{{ $trx->gol }}</td>
                                <td>{{ $trx->satuan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center">
                                    Tidak ada data ditemukan.
                                </td>
                             </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="col-12 mt-5">
                    {{ $transactions->links('pagination::bootstrap-5') }}
                </div>
                <div class="col-12 mt-2">
                    <p class="small text-muted">
                        <i>Menampilkan Data Dalam Waktu {{ $executionTime }} Detik</i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
