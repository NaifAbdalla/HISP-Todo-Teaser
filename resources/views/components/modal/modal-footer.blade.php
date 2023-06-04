@props([
    'buttonName'
])

<div class="modal-footer">
    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" >
        Close
    </button>
    <button type="submit" {{ $attributes->merge(['class'=>'btn ']) }}>{{ $buttonName }}</button>
</div>
