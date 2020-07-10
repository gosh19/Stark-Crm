
<div class="card">
    <div class="card-body bg-info">
        <form action="{{ url('import') }}" method="POST" name="importform"
            enctype="multipart/form-data">
            @csrf
            <h5 class="text-dark">Carga tu csv</h5>
            <input type="file" name="arch" class="form-control mb-3 p-2 border border-dark">
            <button class="btn btn-success btn-block border border-dark">Importar Csv</button>
        </form>
    </div>
</div>
