<div class="container-fluid">
    <div>
        @if (count($projects)>0)
            @foreach ($projects as $project)
                <ul>
                    <li>{{ $project->name }}</li>
                </ul>
            @endforeach 
        @else
            <div class="container">
                <div class="alert alert-warning">
                    <strong>Currently no Projects</strong>
                </div>
            </div>
        @endif
        
    </div> 
</div>