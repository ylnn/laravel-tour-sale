@extends('layout.admin')

@section('content')
    <h2>Kategori oluştur</h2>
    
    <div class="row">
        <div class="col-6">
            <form>
                <div class="form-group" style="width: 50%">
                  <label for="status">Durum</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1">Yayında</option>
                    <option value="0">Yayında Değil</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">Kategori Adı</label>
                    <input type="email" class="form-control" id="name" autofocus required>
                </div>
                <div class="form-group">
                    <label for="slug">Kategori seo adı | Örnek: "gunluk-turlar" | boş bırakılabilir</label>
                    <input type="email" class="form-control" id="slug">
                </div>
                <div class="form-group">
                    <label for="summernote">Açıklama</label>
                    <textarea id="summernote" name="editordata"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kaydet</button>
                <button class="btn btn-secondary">İptal</button>
            </form>

        </div>
    </div>
@endsection