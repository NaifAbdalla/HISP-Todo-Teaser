<button class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal"
        data-bs-target="#deleteTodo{{ $id }}">
    <i class="fa-solid fa-trash fa-lg text-danger me-2"></i>
</button>
<div class="modal fade" id="deleteTodo{{ $id }}" tabindex="-1" aria-labelledby="#deleteTodoLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <x-modal.modal-header title="Delete Todo" id="deleteTodoLabel"/>

            <form action="/todos/{{ $id }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body text-start">
                    <div class="py-3 text-center">
                        <i class="fa fa-trash fa-10x text-danger "></i>
                        <h4 class="text-danger mt-4">Attention</h4>
                        <h5>Are you sure you want to delete this todo</h5>
                    </div>
                </div>
                <x-modal.modal-footer buttonName="Delete" class="btn-danger"/>
            </form>
        </div>
    </div>
</div>
