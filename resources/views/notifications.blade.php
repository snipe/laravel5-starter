@if ($errors->any())
<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Error:</strong> Please check the form below for errors
</div> <!-- alert -->
@endif

@if ($message = Session::get('success'))
<div class="col-md-12">
  <div class="alert alert-success alert-dismissable">
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 	 	<i class="fa fa-check"></i>
  	<strong>Success:</strong> {{ $message }}
  </div> <!-- alert -->
</div> <!-- col-md-12 -->
@endif

@if ($message = Session::get('error'))
<div class="col-md-12">
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <i class="fa fa-exclamation-circle"></i>
    <strong>Error: </strong>
    {{ $message }}
  </div> <!-- alert -->
</div> <!-- col-md-12 -->

@endif

@if ($message = Session::get('warning'))
<div class="col-md-12">
  <div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="fa fa-exclamation-triangle"></i>  {{ $message }}
  </div> <!-- alert -->
</div> <!-- col-md-12 -->
@endif

@if ($message = Session::get('info'))
<div class="col-md-12">
  <div class="alert alert-info alert-dismissable">
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  	<i class="fa fa-info-circle"></i> {{ $message }}
  </div> <!-- alert -->
</div> <!-- col-md-12 -->
@endif

@if ($message = Session::get('social-prompt'))

<script type="text/javascript">
    $(window).load(function(){
        $('#shareModal').modal('show');
    });
</script>


<!-- Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Awesome! {{{$message}}}. Now increase your reach!</h3>
      </div>  <!-- modal-header -->

      <div class="modal-body" style="height: 220px;">
        <h4>Sharing your tile on your social networks will help your friends learn about your wants and haves! </h4>

        <div class="col-md-12 col-xs-12" style="padding-bottom: 10px;">
          <a class="btn btn-block btn-social btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{{ Session::get('share_url') }}}" target="_new">
          <i class="fa fa-facebook"></i> Share on Facebook
          </a>
        </div> <!-- col-md-12 -->

        <div class="col-md-12 col-xs-12" style="padding-bottom: 10px;">
          <a class="btn btn-block btn-social btn-twitter" href="https://twitter.com/home?status={{{ Session::get('share_title') }}}" target="_new">
          <i class="fa fa-twitter"></i> Share on Twitter
          </a>
        </div> <!-- col-md-12 -->

        <div class="col-md-12 col-xs-12" style="padding-bottom: 10px;">
          <a class="btn btn-block btn-social btn-google-plus" href="https://plus.google.com/share?url={{{ Session::get('share_url') }}}" target="_new">
          <i class="fa fa-google-plus"></i> Share on Google+
          </a>
        </div> <!-- col-md-12 -->

      </div> <!-- modal-body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        @if (isset($hubgroup) )
          <a href="{{ route('addtile/hubgroup',$hubgroup->hubgroup_id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Another Tile</a>
        @else
         <a href="/tiles/quick" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Another Tile</a>
        @endif
      </div> <!-- modal-footer -->

    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div> <!-- modal -->

@endif


@if ($message = Session::get('alert-no-fade'))
<div class="col-md-12">
	<div class="alert-no-fade alert-warning" role="alert">
		<i class="fa fa-info-circle"></i> {{ $message }}
	</div>
</div> <!-- col-md-12 -->
@endif

@if ($message = Session::get('success-no-fade'))
<div class="col-md-12">
	<div class="alert-no-fade alert-success alert-dismissable" role="alert">
		<i class="fa fa-check"></i> {{ $message }}
	</div>
</div> <!-- col-md-12 -->
@endif

@if ($message = Session::get('error-no-fade'))
<div class="col-md-12">
	<div class="alert-no-fade alert-danger alert-dismissable" role="alert">
		 <i class="fa fa-exclamation-circle"></i> {{ $message }}
	</div>
</div> <!-- col-md-12 -->
@endif
