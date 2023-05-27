@props(['name','value'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <input name="{{$name}}" type="text" class="form-control" value="{{old($name,$value)}}">
   
    <x-error :name="$name"></x-error>
</x-form.input-wrapper>