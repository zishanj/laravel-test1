angular.module('productService', [])
.factory('Product', function($http) {

    return {
        // get all the products
        get : function() {
            return $http.get('/api/products');
        },

        // save a product (pass in product data)
        save : function(productData) {
            return $http({
                method: 'POST',
                url: '/api/products',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(commentData)
            });
        },

        // destroy a comment
        destroy : function(id) {
            return $http.delete('/api/products/' + id);
        }
    }
});