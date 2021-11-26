<template>
    <div class="ps-section__content">
        <div v-if="isLoading">
            <div class="half-circle-spinner">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
            </div>
        </div>
        <div v-if="!isLoading" v-carousel v-bind:id="id" class="owl-slider"
             data-owl-auto="false"
             data-owl-loop="true"
             data-owl-speed="10000"
             data-owl-gap="20"
             data-owl-nav="true"
             data-owl-dots="false"
             data-owl-item="4"
             data-owl-item-xs="1"
             data-owl-item-sm="2"
             data-owl-item-md="2"
             data-owl-item-lg="3"
             data-owl-item-xl="4"
             data-owl-duration="1000"
             data-owl-mousedrag="on"
        >
            <div class="item" v-for="item in data" :key="item.id" v-if="data.length" v-html="item"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                isLoading: true,
                data: []
            };
        },
        props: {
            url: {
                type: String,
                default: () => null,
                required: true
            },
            id: {
                type: String,
                default: () => null,
            },
            limit: {
                type: String,
                default: () => 0,
            },
        },
        mounted() {
          this.getProducts();
          console.log('mounted');
        },
        methods: {
            getProducts() {
                this.data = [];
                this.isLoading = true;

                if (this.limit) {
                    this.url += '?limit=' + this.limit;
                }

                axios.get(this.url)
                    .then(res => {
                        this.data = res.data.data ? res.data.data : [];
                        this.isLoading = false;
                    })
                    .catch(res => {
                        this.isLoading = false;
                        console.log(res);
                    });
            },
        },
    }
</script>
