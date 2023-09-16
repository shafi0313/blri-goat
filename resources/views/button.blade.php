@if ($type == 'ajax-edit')
    <button data-route="{{ $route }}" data-value="{{ $row->id }}" class='text-primary _btn' onclick="ajaxEdit(this)"
        title='@lang('app.edit')'><i class='fa fa-edit'></i></button>
@endif

@if ($type == 'edit')
    <a href="{{ route($route . '.edit', $row->id) }}" class='btn btn-link btn-primary btn-lg _btn' title='Edit'>
        <i class='fa fa-edit'></i> 
    </a>
@endif

@if ($type == 'delete')
    <button data-route="{{ route($route . '.destroy', $row->id) }}" class='_delete text-danger _btn' title='@lang('app.delete')'><i
            class='fa fa-trash'></i></button>
@endif
@if ($type == 'ajax-delete')
    <button data-route="{{ $route }}" data-value="{{ $row->id }}"
        onclick="ajaxDelete(this, '{{ $src }}')" class='btn btn-link btn-danger _btn' title='Delete'>
        <i class='fa fa-trash' style="vertical-align: middle;"></i>
    </button>
@endif
@if ($type == 'view')
    <a href="{{ route($route . '.show', $row->id) }}" class='text-secondary _btn' title="@lang('app.show-details')"><i
            class='fa fa-eye'></i></a>
@endif


@if ($type == 'status')
    <span data-route="{{ $route }}"
        style="font-size: 36px;line-height: 1;vertical-align: middle;cursor: pointer;" data-bs-placement="top"
        data-bs-toggle="tooltip" data-bs-original-title="@lang('app.status')" data-value="{{ $row }}"
        onclick="changeStatus(this)" title="@lang('app.status')">
        @if ($row == 1)
            <i class="fa fa-toggle-on text-success"></i>
        @else
            <i class="fa fa-toggle-off text-danger"></i>
        @endif
    </span>
@endif
