@include('layouts.links')
<div class="dropdown">
    
   <Form method="GET" action="{{route('Lieu.selectdrop')}}">
    @csrf
   
        Subjects: <select name="id_ville">
            @foreach($v as $items)
            
            <option value="{{ $items->id_ville}}" selected="selected">{{ $items->nom}}</option>
            @endforeach
          </select>
          <br><br>
          Subjects: <select name="">
            @foreach($data as $items)
            
            <option value="" selected="selected">{{ $items->nom_lieu}}</option>
            @endforeach
          </select>
        
        
       
        
    <button  type="submit">submit</button>
  </Form>
  </div>