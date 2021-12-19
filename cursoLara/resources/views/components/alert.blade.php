<div  {{$attributes->merge(['class'=> "alert alert-dismissible alert-$color"])}}>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>{{$slot}}</strong> <a href="#" class="alert-link">{{$title}}</a> and try submitting again.
   
</div>