(function () {
    "use strict";
    angular.module('productManage', ['productService'])
        .controller('CtrlProductManage', ['$http', 'Product', function ($http, Product) {
            var product = this;
            product.productData = {};
            
            Product.get()
                .then(function(data) {
                product.data = data.data;
            });
            product.add = function add() {
                Product.save(product.productData)
                    .then(function(data) {
                        console.log("success");
                        Product.get()
                            .then(function(data) {
                            product.data = data.data;
                        });

                    }, function(data) {
                        console.log("error");
                    });
            };
            product.edit = function edit(data) {
                
            };
            product.save = function save(data) {
                var mydata = {};
                mydata.updatedData = angular.copy(product.data);
                Product.update(mydata)
                    .then(function(data){
                    console.log("success");
                });
            };
            
        }]);
}());