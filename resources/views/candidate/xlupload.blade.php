<div>
    <h1>Import candidate</h1>
    
    <form action="{{ route('candidate.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xlsx">
        <button type="submit">Import Candidate</button>
    </form>
</div>
