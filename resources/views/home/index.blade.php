@extends('fontend.template')

@section('subheader')
<div id="ww">
  <div class="container">
    <div class="row">
      <div class="cta-mail">
        <div id="mc_embed_signup">
          {{ Form::open(['method'=>'get','url'=>array('search')])}}
            <div class="input-group input-group-lg">
              <!--nput type="text" placeholder="Search"  class="form-control" name="search">
              <span class="input-group-btn">
                 <a href="products.html" class="btn btn-default search_btn">Search</a>
              </span-->

             {{Form::text('searchKey', isset($input['searchKey']) ? $input['searchKey']:'',['placeholder'=>'Research over 50,000 Watch References','id'=>'searchKey','class'=>'form-control '])}}
               <span class="input-group-btn">
                <button type="submit" class="btn btn-default search_btn" onclick="">Search KronoDatabase</button>
              </span>   
            </div>
          
          {{ Form::close() }}
          <form method="post" action="productdetail.php" target="_blank" id="pidform" name="pidform">
            <input id="prodid" name="prodid" type="hidden">
          </form>

        </div></div>
    </div><!-- /row -->
  </div> <!-- /container -->
</div><!-- /ww -->   
@stop
@section('main')

<div class="text-center" id="textmorebrand" style="display: none"><h3>Click to research watch references from over 40 brands</h3></div>

<div class="grid">
  <!-- width of .grid-sizer used for columnWidth -->
  <div class="grid-sizer"></div>
  @foreach($grands as $grand)

  <div class="grid-item">
    <div class="box-logo-brand"><a href="{{action('Fontend\ProductController@brand',['brandSlug'=>$grand->slug])}}"><img src="{{$grand->getLogo()}}"></a></div>
  </div>
  @endforeach

</div>
@stop
@section('view.scripts')
<script>
    $('.grid').hide();
    $(document).ready(function () {
        
      $('.grid').imagesLoaded(function () {
       
      setTimeout(function () {
        $('#textmorebrand').show();
        $('.grid').show();
        $('.grid').masonry({

          itemSelector: '.grid-item',

          columnWidth: '.grid-sizer',
          percentPosition: true
        });
        }, 500);
      
    });
    });
</script>
@stop