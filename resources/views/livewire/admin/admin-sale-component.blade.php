<div>
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <form class="" wire:submit.prevent="updateSale">
        <select wire:model="status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <input wire:model="sale_date" id='sale-date' type="datetime"  placeholder="YYYY/MM/DD H:M:S">
        <button type="submit">Save</button>
    </form>
</div>


@push('scripts')
<script
src="https://code.jquery.com/jquery-3.6.3.min.js"
integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
crossorigin="anonymous"></script>
<script>
    $(function(){
        $('#sale-date').datetimepicker({
            format: 'Y-MM-DD h:m:s',
        })
        .on('dp.change', function(ev){
            var data=$('#sale-date').val();
            @this.set('sale_date',data);
        });
    });
</script>
@endpush
