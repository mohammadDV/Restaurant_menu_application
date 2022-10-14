<template lang="">
    <div>
        <success-alert v-show="isSuccess">
            <p>Added</p>
        </success-alert>
        <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="carousel_89fe" data-image-width="1620" data-image-height="1080">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <router-link
                    :to="{
                        name: 'ManuIndex'
                    }">
                <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">Menu</h2>
            </router-link>
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Launch demo modal
                                    </button> -->
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <template v-for="(food,index) in foods">
                        <div class="main-layer-food">
                            <div class="food-template u-container-style u-list-item u-video-cover u-white">
                                <div class="first-layer">
                                    <div>
                                        <img class="category-image" :src="'/images/' + food.image" :alt="food.title"></img>
                                    </div>
                                    <div class="food-row food-title" v-text="food.title"></div>
                                </div>
                                <div class="food-body u-repeater-item">
                                    <div class="food-row food-addons">
                                        <!-- <i data-bs-toggle="collapse" :data-bs-target="'#myCollapse' +  + food.id" class="fa-solid fa-circle-plus"></i> -->
                                        <button data-bs-toggle="collapse" :data-bs-target="'#myCollapse' +  + food.id" class="btn-addons Addons">Addons</button>
                                    </div>
                                    <div class="food-row food-input" >
                                        <span @click="minus('input_' + food.id)" class="minus">-</span>
                                        <input type="text" value="1" :name="'count_' + food.id" :id="'input_' + food.id"/>
                                        <span @click="plus('input_' + food.id)" class="plus">+</span>
                                    </div>
                                </div>
                                <div class="collapse row addons-body" :id="'myCollapse' + food.id">
                                    <template v-for="addon in addons">
                                        <div class="col-6 addons-item">
                                            <input :data-title="addon.title" :data-amount="addon.amount" :id="'addone_' + food.id + addon.id" :name="'addons_' + food.id + '[]'" type="checkbox" class="checkbox-class" :value="addon.id">
                                            <label :for="'addone_' + food.id + addon.id">
                                                {{ addon.title }}
                                            </label>
                                        </div>
                                    </template>
                                </div>
                                <div class="add-button">
                                    <button type="button" class="btn-add" @click="addOrder(food)">Add to cart</button>
                                </div>
                            </div>
                        </div>
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
    import $ from 'jquery'
    export default {
        data() {
            return {
                food_id: 0,
                foods: [],
                addons: [],
                isSuccess: false,
                order : []
            }
        },
        created() {
            this.getFoods();
        },
        methods: {
            getFoods() {
                axios.get('/api/foods/' + this.$route.params.id)
                .then(res => {
                    this.foods  = res.data.foods
                    console.log(res.data.addons);
                    this.addons = res.data.addons;
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
                var input   = $('#' + id);
                var count   = parseInt(input.val()) - 1;
                count       = count < 1 ? 1 : count;
                input.val(count);
                input.change();
                return false;
            },
            hideAlert() {
                setTimeout(() => this.isSuccess = !this.isSuccess, 1000);
            },
            addOrder(food) {
                try {
                    var addons  = [];
                    var count   = $('#input_' + food.id).val();
                    var total   = food.amount * count;
                    $("input[name='addons_" + food.id + "[]']:checked").map(function (index, obj) {
                        var AddAmount   = parseFloat(obj.getAttribute("data-amount"));
                        console.log(obj);
                        var AddTitle    = obj.getAttribute("data-title");
                        total += AddAmount;
                        addons.push({
                            id: obj.value,
                            amount: AddAmount,
                            title: AddTitle,
                        });
                    });

                    var count   = $('#input_' + food.id).val();
                    var temp    = {
                        id : food.id,
                        food : food,
                        count: count,
                        addons: addons,
                        amount: food.amount,
                        total: total,
                    };
                    this.isSuccess = true;
                    this.$root.addOrder(temp);

                    $('#input_' + food.id).val(1);
                    $('[type=checkbox]').prop("checked", false);
                    this.hideAlert();

                }catch(err) {
                    alert(err);
                }
            }
        }
    }

</script>
