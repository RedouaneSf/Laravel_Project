@include('layouts.nav')
@include('layouts.links')

<h1>Extra Page</h1>

 <div class="container">
       <div>
          <button class="bg-info"> <a href="{{route('extra.create')}} " style="text-decoration: none;color:white;">Ajouter des extras</a></button>
       </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">libellé</th>
            <th scope="col">Prix</th>
            <th scope="col"></th>
            
          </tr>
        </thead>
        <tbody>
     @foreach ($data as $item)
       
        @if ($item->prix>0)
            <tr>
            <th scope="row">{{ $item->id_extra}}</th>
            <td>{{ $item->lib}}</td>
            <td>{{ $item->prix}}</td>
            <td>
                <td style="width: 10;"> <form method="POST" action="/extra/{{$item->id_extra}}" style="margin-left: 20px;">
                    @csrf
                    @method('delete')

                    <button class="btn bg-danger" type="submit" style="color: aliceblue;" > Supprimer</button>  
                   </form>
                   
                </td>
              
            
                   <td>
                    <button class="btn bg-warning" style="margin-bottom: 15px;"> <a href="/extra/{{$item->id_extra}}/edit" style="text-decoration: none;color:white;">Modifier</a></button> 
                  </td>
            
        </td>
           
          </tr>
        @endif
          
         @endforeach  
         
        </tbody>
      </table>
 </div>