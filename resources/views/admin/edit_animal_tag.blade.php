<div class="form-group col-md-3">
    <label for="name">Animal Tag <span class="t_r">*</span></label>
    <select name="animal_info_id" id="animalInfo" class="form-control @error('animal_info_id') is-invalid @enderror">
        <option value="">Select</option>
        @foreach ($animalInfos as $animalInfo)
        <option value="{{$animalInfo->id}}" {{$data->animal_info_id==$animalInfo->id?'selected':''}}>{{$animalInfo->animal_tag}}</option>
        @endforeach
    </select>
    @error('animal_info_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
