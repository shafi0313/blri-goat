<div class="form-group col-md-6">
    <label for="community_cat_id">Research/Community Farm <span class="t_r">*</span></label>
        <select name="farmOrCommunityId" id="farm" class="form-control @error('community_cat_id') is-invalid @enderror">
            <option selected disabled value>Select</option>
            @foreach ($farms as $farm)
            <option value="{{$farm->id}}f">{{$farm->name}}</option>
            @endforeach
            @foreach ($communityCats as $communityCat)
            <option value="{{$communityCat->id}}c">{{$communityCat->name}}</option>
            @endforeach
        </select>
        @error('community_cat_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-3">
        <label for="">Individual Farm</label>
        <select name="community_id" id="subFarm" class="form-control"></select>
    </div>

@push('custom_scripts')
<script>
    $('#farm').on('change',function(e) {
        var farmOrComId = $(this).val()
        $.ajax({
            url:'{{ route("get.getCommunity") }}',
            type:"get",
            data: {
                farmOrComId: farmOrComId
                },
            success:function (res) {
                res = $.parseJSON(res);
                $('#subFarm').html(res.name);
            }
        })
    });
</script>
@endpush
