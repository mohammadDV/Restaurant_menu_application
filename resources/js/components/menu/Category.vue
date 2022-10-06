<template lang="">
    <div>
        <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="carousel_89fe" data-image-width="1620" data-image-height="1080">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <router-link
                    :to="{
                        name: 'ManuIndex'
                    }">
                <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">Menu</h2>
            </router-link>
            <div class="u-expanded-width u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                <template v-for="(food,index) in foods">
                    <div class="food-template u-container-style u-list-item u-video-cover u-white">
                        <div class="food-body u-repeater-item">
                            <div class="food-row food-title" v-text="food.title"></div>
                            <div class="food-row food-addons">
                                <i class="fa-solid fa-circle-plus"></i>
                            </div>
                            <div class="food-row food-input" >
                                <span @click="minus('input_' + food.id)" class="minus">-</span>
                                <input type="text" value="1" :id="'input_' + food.id"/>
                                <span @click="plus('input_' + food.id)" class="plus">+</span>
                            </div>
                        </div>
                        <div class="add-button">
                            <button class="btn-add">Add to cart</button>
                        </div>
                    </div>
                </template>
            </div>
            </div>
            <p class="u-text u-text-default u-text-18" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">Image from <a href="https://www.freepik.com/photos/man" class="u-active-none u-border-1 u-border-active-palette-1-light-2 u-border-hover-palette-1-light-2 u-border-white u-btn u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" target="_blank">Freepik</a></p>
        </div>
        </section>
    </div>
</template>




<script>
    import axios from 'axios';
    import $ from 'jquery'
    export default {
        components: {

        },
        data() {
            return {
                foods: [],
            }
        },
        created() {
            this.getFoods();
        },
        methods: {
            getFoods() {
                axios.get('/api/foods/' + this.$route.params.id)
                .then(res => {
                    this.foods = res.data.data
                })
                .catch( error => {
                    console.log(error);
                })
            },
            plus(id) {
                var input = $('#' + id);
                var count = parseInt(input.val()) + 1;
                input.val(count);
                input.change();
                return false;
            },
            minus(id) {
                var input = $('#' + id);
                var count = parseInt(input.val()) - 1;
                count = count < 1 ? 1 : count;
                input.val(count);
                input.change();
                return false;
            }
        }
    }



	$(document).ready(function() {
        $('.minus').click(function () {
            var input = $(this).parent().find('input');
            var count = parseInt(input.val()) - 1;
            count = count < 1 ? 1 : count;
            input.val(count);
            input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            input.val(parseInt(input.val()) + 1);
            input.change();
            return false;
        });
    });
</script>
