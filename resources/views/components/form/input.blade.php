@props(['name','type'=>'text','value'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
        
    <input 
    id="{{$name}}"
    name="{{$name}}" 
    type="{{$type}}" 
    class="form-control" 
    value="{{old($name,$value)}}">

    <x-error :name="$name" />
   
</x-form.input-wrapper>

