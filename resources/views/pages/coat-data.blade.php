<select class="form-control form-select" name="dnaCoat"  id="dnaCoat" aria-label="Default select example">
    <option selected disabled>COAT Attributes </option>
    @foreach($coatValues as $key=>$coat)
        <option value="{{$coat->getValue()}}">{{$coat->getValue()}}</option>
    @endforeach
</select>
