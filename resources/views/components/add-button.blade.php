<button class="btn btn-primary rounded-pill float-end me-md-3" data-bs-toggle="modal"
        data-bs-target="#addTodo">
    <i class="fa-solid fa-plus"></i>
</button>
<div class="modal fade" id="addTodo" tabindex="-1" aria-labelledby="#addTodoLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <x-modal.modal-header title="Create Todo" id="addTodoLabel"/>
            <form action="/todos/{{ $id }}" method="post">
                @csrf
                @method('POST')
                <div class="modal-body text-start">
                    <div class="mb-2">
                        <label for="title" class="col-form-label">Title:</label>
                        <input type="text" name="title" id="title" class="form-control"
                               placeholder="Title">
                        @error('title')<p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-2">
                        <label for="description" class="col-form-label">Description:</label>
                        <textarea name="description" id="description" class="form-control"
                                  placeholder="Description" rows="4"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="completed"
                               class="col-form-label d-flex align-items-center"><span class="me-2">Completed:</span>
                            <input type="checkbox" id="completed" name="completed"
                                   class="mr-2">
                        </label>
                    </div>
                </div>
                <x-modal.modal-footer buttonName="Save" class="btn-primary"/>
            </form>
        </div>
    </div>
</div>
