<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/productservice.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/product.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
        
        <title>Product Add/View</title>

    </head>
    <body class="container" ng-app="productManage" ng-controller="CtrlProductManage as product">
        <div class="page-header">
            <h2>Product Add/View</h2>
        </div>
        <div>
            <form ng-submit="product.add()">
              <div class="form-group">
                <label for="productname">Product Name</label>
                <input type="text" class="form-control" id="productname" placeholder="Enter product name" ng-model="product.productData.name">
              </div>
              <div class="form-group">
                <label for="quantity">Quantity in Stock</label>
                <input type="text" class="form-control" id="quantity" placeholder="Enter stock quantity" ng-model="product.productData.quantity">
              </div>
              <div class="form-group">
                <label for="price">Price per item</label>
                <input type="text" class="form-control" id="price" placeholder="Enter price" ng-model="product.productData.price">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <br/>
        <table class="table table-bordered" ng-if="product.data != ''">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price per item</th>
                    <th>Date/Time Submitted</th>
                    <th>Total value number</th>
                </tr>
            </thead>
            <tbody>              
            <tr ng-repeat="data in product.data">
                <td><span ng-hide="editMode">@{{data.name}}</span><span ng-show="editMode" ng-model="data.name"><input type="text" ng-model="data.name"></span></td>
                <td><span ng-hide="editMode">@{{data.quantity}}</span><span ng-show="editMode" ng-model="data.quantity"><input type="text" ng-model="data.quantity"></span></td>
                <td><span ng-hide="editMode">@{{data.price}}</span><span ng-show="editMode" ng-model="data.price"><input type="text" ng-model="data.price"></span></td>
                <td>@{{data.date}}</td>
                <td>@{{data.quantity * data.price}}</td>
                <td>
                    <a href="" ng-hide="editMode" ng-click="editMode=true; product.edit(data);">Edit</a>
                    <a href="" ng-show="editMode" ng-click="editMode=false; product.save(data);">Save</a>
                    <a href="" ng-show="editMode" ng-click="editMode=false;">Cancel</a>
                </td>
            </tr>
            </tbody>
        </table>
    </body>
</html>