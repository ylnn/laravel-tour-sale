@extends('layout.admin')

@section('content')
    <h2>Tur oluştur</h2>
    
    <div class="row">
        <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.store') }}">
                {{csrf_field()}}
                <div class="form-group" style="width: 50%">
                  <label for="status">@lang('admin.durum')</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1">@lang('admin.yayinda')</option>
                    <option value="0">@lang('admin.yayinda-degil')</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">Kategori Adı</label>
                    <input type="text" class="form-control" id="name" name="name" autofocus required>
                </div>
                <div class="form-group">
                    <label for="slug">Kategori seo adı | Örnek: "gunluk-turlar" | boş bırakılabilir</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="form-group">
                    <label for="summernote">Tur açıklaması (kısa)</label>
                    <textarea id="summernote" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="summernote">Tur Açıklaması (tamamı)</label>
                    <textarea id="summernote" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kaydet</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">İptal</a>
                <input type="hidden" name="previous" value="{{ url()->previous() }}">
            </form>

        </div>
    </div>
@endsection