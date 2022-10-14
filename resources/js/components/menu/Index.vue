<template lang="">
    <div>
        <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="carousel_89fe" data-image-width="1620" data-image-height="1080">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">Menu</h2>
                <div class="u-expanded-width u-list u-list-1">
                    <div class="u-repeater u-repeater-1">
                        <template v-for="(category,index) in categories">
                            <router-link
                            :to="{
                                name: 'ManuCategory',
                                params: { id: category.id }
                            }">
                                <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white mb-5">
                                    <div class="u-container-layout u-similar-container u-container-layout-2">
                                        <h4 class="u-text u-text-default u-text-palette-3-base u-text-4" v-text="category.title"></h4>
                                        <!-- <h4 class="u-text u-text-default u-text-5" v-text="category.title"></h4> -->
                                        <img class="category-image" :src="'/images/' + category.image" :alt="category.title">
                                    </div>
                                </div>
                            </router-link>
                        </template>
                    </div>
                </div>
                <p class="u-text u-text-default u-text-18" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500"><a href="/" class="u-active-none u-border-1 u-border-active-palette-1-light-2 u-border-hover-palette-1-light-2 u-border-white u-btn u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" target="_blank">Main page</a></p>
            </div>
        </section>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        components: {

        },
        data() {
            return {
                categories: [],
            }
        },
        created() {
            this.getCategories();
        },
        methods: {
            getCategories() {
                axios.get('/api/categories')
                .then(res => {
                    this.categories = res.data.data
                })
                .catch( error => {
                    console.log(error);
                })
            }
        }
    }



</script>
