@extends('index')
@section('content')
    <div class="container-fluid p-0">
        <!-- Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2>Cek Kesehatan</h2>
                <p>"Untuk mendapatkan resep jamu yang tepat, silakan masukkan keluhan sesuai dengan yang Anda rasakan. Kami
                    akan menyesuaikan racikan jamu berdasarkan kebutuhan Anda untuk membantu meningkatkan kesehatan secara
                    alami."</p>

                <form method="POST" action="{{ route('form') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            @php
                                $questions = [
                                    'Apakah sedang mengalami kurang nafsu makan?',
                                    'Tidak sedang mengalami gangguan apapun?',
                                    'Apakah Badan Terasa peglinu?',
                                    'Apakah punya permasalahan lambung dan sedang pemulihan lambung?',
                                    'Apakah sedang mengalami gangguan penceraan seperti diare dan Kembung?',
                                    'Apakah sedang mengalami masuk angin? Pusing, pegelinu, kembung dan keringat dingin?',
                                ];
                            @endphp

                            @foreach ($questions as $index => $question)
                                <div class="alert alert-light shadow-sm bg-body-tertiary py-3 rounded" role="alert">
                                    @if ($errors->has('p' . ($index + 1)))
                                        <span class="error text-danger p-2 mb-2">
                                            {{ $errors->first('p' . ($index + 1)) }}
                                        </span>
                                        <br>
                                    @endif
                                    <label>{{ $index + 1 }}. {{ $question }}</label>
                                    <br>
                                    <div class="d-flex flex-column flex-sm-row ms-4 justify-start">
                                        <div class="form-check form-check-inline">
                                            <span id="p{{ $index + 1 }}" class="text-danger"></span>
                                            <input class="form-check-input border border-primary" type="radio"
                                                name="p{{ $index + 1 }}" id="radio{{ $index + 1 }}.1" value="A"
                                                {{ old('p' . ($index + 1)) == 'A' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="radio{{ $index + 1 }}.1">A) Iya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input border border-primary" type="radio"
                                                name="p{{ $index + 1 }}" id="radio{{ $index + 1 }}.2" value="B"
                                                {{ old('p' . ($index + 1)) == 'B' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="radio{{ $index + 1 }}.2">B)
                                                Tidak</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="alert alert-light shadow-sm bg-body-tertiary py-3 rounded text-center"
                                role="alert">
                                <p>Apakah Semua data yang dimasukan sudah sesuai? <br>
                                    Jika semua sudah sesuai klik Tombol Proses di bawah ini</p>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success" type="submit">Proses</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <hr class="m-0" />
    </div>
@endsection
