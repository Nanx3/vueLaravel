<template>
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <h2>Add new product</h2>
                <form-component @add="newProduct"></form-component>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="offset-md-3"><h2>Products</h2></div>
            </div>
            <div class="row">
                <card-component v-for="(product,index) in products"
                    :product="product"
                    @delete="deleteProduct(index)"
                    :key="product.id">
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
    import CardComponent from  './CardComponent'
    import FormComponent from  './FormComponent'
    export default {
        components: {
            CardComponent,
            FormComponent
        },
        data() {
            return {
                products: [
 /*                    {
                        id: '1',
                        name: 'Product 1',
                        description: 'Dolorum quidem consequuntur sint atque alias. Voluptatem tenetur quis nihil suscipit. Natus esse molestias error qui in debitis et.',
                        image: 'https://via.placeholder.com/640x480.png/00ee22?text=repellendus',
                        price: 10.00
                    },
                    {
                        id: '2',
                        name: 'Product 2',
                        description: 'Dolorum quidem consequuntur sint atque alias. Voluptatem tenetur quis nihil suscipit. Natus esse molestias error qui in debitis et.',
                        image: 'https://via.placeholder.com/640x480.png/00ee22?text=repellendus',
                        price: 20.00
                    } */
                ]
            }
        },
        methods: {
            newProduct(product) {
                this.products.push(product);
            },
            deleteProduct(index) {
                this.products.splice(index,1);
            }
        },
        mounted() {
            axios.get('/api/products').then((response) => {
               this.products = response.data.products
            });
        }
	}
</script>