(function () {
    "use strict";
    angular.module('productManage', ['productService'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[{');
        $interpolateProvider.endSymbol('}]');
    })
        .controller('CtrlProductManage', ['$http', Product, function ($http, Product) {
            var product = this;
            product.productData = {};
            
            product.add = function add() {
                Produt.save(product.productData)
                    .success(function(data) {

                        // if successful, we'll need to refresh the product list
                        /*Product.get()
                            .success(function(getData) {
                                $scope.comments = getData;
                                $scope.loading = false;
                            });*/

                    })
                    .error(function(data) {
                        console.log(data);
                    });
            };
            
        }]);
}());