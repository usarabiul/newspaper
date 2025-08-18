<ul>
  @foreach($subcategories as $subctg)
  <li>
    <label>
        <input type="checkbox" class="form-check-input" name="categoryid[]" value="{{$subctg->id}}"

        @foreach($service->serviceCtgs as $postctg) 
        {{$postctg->reff_id==$subctg->id?'checked':''}}  
        @endforeach 
        
        >
        {{$subctg->name}}
    </label>
  </li>
  @if($subctg->subCtgs->count() >0)
  @include(adminTheme().'services.includes.servicesEditSubctg',['subcategories' => $subctg->subCtgs,'i'=>$i+1])
  @endif
  @endforeach
</ul>