<form method="POST" action="/product">
{{ csrf_field() }}
<div class="container-fluid">
    <div class="form-group row mt-2">
        <div class="col-sm-2 col-lg-1"><label for="product">Name:</label></div>
        <div class="col-xs-12 col-sm"><input type="text" class="form-control" name="product" id="product" placeholder="Book" required></div>
    </div>
    <div class="form-group row mt-2">
        <div class="col-sm-2 col-lg-1"><label for="product">URL:</label></div>
        <div class="col-xs-12 col-sm"><input type="text" class="form-control" name="url" id="url" placeholder="http://bookwebsite.com"></div>
    </div>
    <div class="form-group row mt-2">
        <div class="col-xs-0 col-sm-1 col-md-1 col-lg-1 col-xg-1"></div>
        <div class="col col-xs-12"><button type="submit" class="btn btn-primary">Insert</button></div>
        
    </div>
</div>
@include ('layouts.errors')
</form>