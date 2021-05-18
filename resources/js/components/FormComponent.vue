<template>
    <form v-on:submit.prevent="newProduct()">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" v-model="product.name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" v-model="product.description"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" v-model="product.price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>

let defaultProduct = {
    name: '',
    description: '',
    price: '',
    image: 'https://via.placeholder.com/640x480.png/00ee22?text=repellendus'
};

export default {
    data() {
        return {
            product: Object.assign({}, defaultProduct)
        }
    },
    methods: {
        newProduct() {
            axios.post('/api/products', this.product).then((response) => {
                this.$emit('add', response.data.product);
            });          
           this.product = Object.assign({}, defaultProduct)
        }
    }
}
</script>
