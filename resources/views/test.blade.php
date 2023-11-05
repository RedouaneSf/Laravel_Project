dropdown
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-mdb-toggle="dropdown" aria-expanded="false">
      Dropdown
    </button>
   <select name="" id="">
        @foreach ($data as $row)
        <option value=" {{$row->id}}">{{$row->name}}</option>
          
        @endforeach
      </ul>
    </select>