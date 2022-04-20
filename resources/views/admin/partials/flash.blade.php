@if (Session('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button class="close" type="button" data-dismiss="alert">×</button>
      {{ Session('message') }}
    </div>
 @endif

 @if (Session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button class="close" type="button" data-dismiss="alert">×</button>
      {{ Session('error') }}
    </div>
 @endif