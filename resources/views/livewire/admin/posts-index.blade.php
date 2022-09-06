<div class="card">
    <div class="card-header">
        <input wire:model="search" type="text" placeholder="Enter post name" class="form-control">
    </div>

    @if (count($posts))

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th colspan="2">
                            
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                {{ $post->name }}
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                            </td>
                            <td width="10px">
                                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}">
                                    @csrf

                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>

    @else
    
        <div class="card-body">
            <strong>There aren't posts</strong>
        </div>
        
    @endif
</div>