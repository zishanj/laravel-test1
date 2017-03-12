angular.module('productService', [])
.factory('Product', function($http) {

    return {
        // get all the products
        get : function() {
            return $http.get('/api/products');
        },

        // add a product (pass in product data)
        save : function(productData) {
            return $http({
                method: 'POST',
                url: '/api/products',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(productData)
            });
        },
        // update a product (pass in product data)
        update : function(productData) {
            return $http({
                method: 'POST',
                url: '/api/products',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(productData)
            });
        },
    }
});