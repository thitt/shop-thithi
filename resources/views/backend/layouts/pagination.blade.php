<div class="row mt-3 text-nowrap">
    <div class="col-4">
        <label>
            {{ __('layout.show') }}
            <select class="form-select d-inline-block select-number-record" name="number_record">
                @foreach(NUMBER_RECORD as $record)
                    <option value="{{ $record }}"
                            @if (request('number_record') == $record) selected @endif>
                        {{ $record }}
                    </option>
                @endforeach
            </select>
            {{ __('layout.entries') }}
        </label>
    </div>
    <div class="col-8 pagination-custom">
        {!! $list->withQueryString() !!}
    </div>
</div>
