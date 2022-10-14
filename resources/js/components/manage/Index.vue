<template>
    <div class="container manage-layer" @click.self="closeModal">
        <div class="row">
            <div class="header-orders text-center">
                <h2>Orders</h2>
                <div class="timer flex">Timer : <span>{{ second }}</span></div>
                <div class="row-counter">
                    <select class="form-control" name="offset" v-model="offset" id="offset">
                        <option value="5" :selected="offset === 5">5</option>
                        <option value="10" :selected="offset === 10">10</option>
                        <option value="15" :selected="offset === 15">15</option>
                        <option value="25" :selected="offset === 25">25</option>
                        <option value="50" :selected="offset === 50">50</option>
                        <option value="100" :selected="offset === 100">100</option>
                    </select>
                </div>
            </div>
            <div class="body">
                <template v-for="order in orders">
                    <div class="row row-order" >
                        <div class="col-lg-3 col-md-12">
                            <div class="head-info">Main Information</div>
                            <div class="row body-info">
                                <div class="col-6 col-lg-12 mb-2 blue">Number : <span v-text="order.id"></span></div>
                                <div class="col-6 col-lg-12 mb-2 blue ">Total : <span v-text="order.amount + '$'"></span></div>
                                <div class="col-6 col-lg-12 mb-2 blue ">Count : <span v-text="order.count"></span></div>
                                <div class="col-6 col-lg-12 mb-2 blue ">table : <span v-text="order.table_id"></span></div>
                                <select class="form-control" @change="onChange($event,order.id)" name="status" id="status">
                                    <option :selected="order.status === 1" value="1">Pending</option>
                                    <option :selected="order.status === 2" value="2">Preparing</option>
                                    <option :selected="order.status === 3" value="3">Done</option>
                                    <option :selected="order.status === 4" value="4">canceled</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="table-responsive table-order ">
                                <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col" class="blue-text">Food</th>
                                    <th scope="col" class="blue-text">Count</th>
                                    <th scope="col" class="blue-text">Amount</th>
                                    <th scope="col" class="blue-text">Addons</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="details in order.details">
                                        <td>{{ details.food.title }}</td>
                                        <td>{{ details.count }}</td>
                                        <td>{{ details.amount }}</td>
                                        <td>{{ details.addons }}</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </template>

                <div class="pagination-body text-center">
                    <paginate
                    :page-count="count"
                    :click-handler="getData"
                    :prev-text="'Prev'"
                    :next-text="'Next'"
                    :container-class="'pagination'">
                    </paginate>
                </div>
            </div>
            <div class="footer text-center">
                <!-- <button @click="saveData" class="btn btn-success m-1">Save</button>
                <button @click="closeModal"  class="btn btn-danger m-1">close</button> -->
            </div>

        </div>
        <success-alert v-show="isSuccess">
            {{ message }}
        </success-alert>
    </div>
</template>

<style >
    .blue-text {
        color: #3da1e6;
    }
    .timer {
        position: absolute;
        right: 5px;
        bottom: 5px;
        width: 100px;
        background: #40bbac;
        border-radius: 5px;
        padding: 5px 0;
    }
    .row-counter {
        position: absolute;
        left: 5px;
        bottom: 5px;
        width: 50px;
    }
    .header-orders {
        background: linear-gradient(1deg, #3da1e6, #89C5EE);
        border-radius: 5px;
        margin: 10px auto;
        color: #fff;
        position: relative;
    }
    .body-info {
        padding: 5px 10px;
    }
    .body-info span {
        color: #18afb6;
    }
    .head-info {
        background: linear-gradient(1deg, #3da1e6, #89C5EE);
        padding: 5px 10px;
        border-radius: 5px;
        color: #fff;
    }
    .row-order {
        border-radius: 5px;
        box-shadow: 1px 1px 10px #999;
        margin: 0 auto 10px;
        padding: 10px 5px;

    }
    .model {
        width: 95%;
        padding: 20px;
        margin: 100px auto;
        background: white;
        border-radius: 10px;
        position: relative;
    }
    .model .fa-xmark {
        position: absolute;
        right: 5px;
        top: 6px;
        font-size: 18px;
        color: red;
        border-radius: 50%;
        padding: 5px;
        cursor: pointer;
    }
    .model .fa-trash {
        font-size: 20px;
        color: red;
        cursor: pointer;
    }
    .backdrop {
        top: 0;
        position: fixed;
        background: rgb(0,0,0,0.5);
        width: 100%;
        height: 100%;
    }
    .pagination-body {
        width: 100%;
        overflow-x: auto;
    }
    .pagination a {
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
        color: black;
    }

    .pagination  a.active {
        background-color: green;
    }

    .pagination  a:hover:not(.active) {background-color: #3da1e6; color: #fff}


    .pagination li {
        float: left;
        margin: 1px;
        text-decoration: none;
        color: rgb(5, 0, 0);
        background-color: white;
        font-size: 1em;
    }
    .pagination li.active {
        background: #3da1e6 !important;
        color: red;
    }


    .pagination li.active a {
        color: white !important;
        color: red;
    }

    .pagination  li:hover:not(.active) {background-color: #3da1e6;}

    .pagination {
        text-align: center;
    }

</style>

<script>

    export default {
        name: 'manageOrder',
        data () {
            return {
                orders:[],
                count:0,
                isSuccess: false,
                message: '',
                secondOrg: 10,
                second: 0,
                page: 1,
                offset: 10,
                interval: false,
                leaveType:0,
            }
        },
        created() {
            this.getData(this.page);
            this.second = this.secondOrg;
        },
        watch : {
            second() {
                if(this.second < 1) {
                    this.second = this.secondOrg;
                    this.getData(this.page);
                }
            },
            offset() {
                this.getData(1);
            }
        },
        methods: {

            hideAlert() {
                setTimeout(() => this.isSuccess = !this.isSuccess, 1000);
            },
            onChange(event,order_id) {
                axios.post('/api/order/change-status/' + order_id,{status: event.target.value})
                .then(res => {
                    if(res.data.status === 1){
                        this.isSuccess  = true;
                        this.message    = res.data.message;
                        this.order      = [];
                        this.$root.removeOrder({});
                        this.hideAlert();
                    }else{
                        alert(message);
                    }
                })
                .catch( error => {
                    alert(error);
                })
            },
            deleteEvent(index) {
                if(confirm("Do you really want to delete?")){
                    this.orders.splice(index, 1);
                    this.$root.setOrder(this.orders);
                }
            },
            countDown() {
                this.interval = setInterval(() => {
                    this.second--;
                }, 1000);
            },
            getData(page) {
                this.page = page;
                axios.post('/api/orders',{page:this.page,offset:this.offset})
                .then(res => {
                    this.orders = res.data.data
                    this.count  = res.data.count
                })
                .catch( error => {
                    alert(error)
                })

                this.second = this.secondOrg;
                clearInterval(this.interval);
                this.countDown();
            }
        }
    }
</script>
