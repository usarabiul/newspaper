<div class="card-header" style="padding: 8px 15px; border: 1px solid #00b5b8;margin-top: 3px;" data-bs-toggle="collapse" href="#accordion2" aria-expanded="false" aria-controls="accordion2">
    <a class="card-title lead collapsed" href="#" style="font-size: 14px;">Pages</a>
</div>
<div id="accordion2" style="border: 1px solid #00b5b8;border-top: none;" role="tabpanel" data-bs-parent="#accordionWrapa1" class="collapse" aria-expanded="false">
    <div class="card-content">
        <div class="card-body" style="padding:10px;">
            <form action="{{route('admin.menusItemsPost',$menu->id)}}" method="post">
                @csrf
                <input type="hidden" name="parent" value="{{$parent->id}}" />
                <div class="form-group" style="margin-bottom: 5px;">
                    <label for="pages">Select Pages</label>
                    <select name="pages[]" data-live-search="true" class="selectpicker form-control" multiple="multiple" required="">
                        @foreach($pages as $i=>$page)
                        <option value="{{$page->id}}">{{$page->name}}

                            @if($page->template)
                            ({{$page->template}})
                            @endif

                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('pages*'))
                    <div class="invalid-feedback">The Page Must Be a Number</div>
                    @endif
                </div>

                <button type="submit" class="badge btn-block badge-primary" ><i class="fa fa-plus"></i> Add</button>
            </form>
        </div>
    </div>
</div>
