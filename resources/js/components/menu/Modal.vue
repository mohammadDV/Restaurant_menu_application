<template>
    <div class="backdrop" @click.self="closeModal">
        <div class="model">
            <div class="header text-center">
                <h2>Your orders</h2>
            </div>
            <div class="body">
                <div class="table-responsive table-order">
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Food</th>
                        <th scope="col">Count</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Addons</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(order,index) in orders">
                            <tr>
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ order.food.title }}</td>
                                <td>{{ order.count }}</td>
                                <td>{{ order.total }}</td>
                                <td>
                                    <template v-if="order.addons.length > 0" v-for="addon in order.addons">
                                        <span v-text="addon.title"></span><br/>
                                    </template>
                                </td>
                                <td>
                                    <i @click="deleteEvent(index)" class="fa-solid fa-trash"></i>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="footer text-center">
                <div class="table-id-row">
                    <input class="form-control table-id" type="number" v-model="table_id" placeholder="Add table id">
                </div>
                <button @click="saveData" class="btn btn-success m-1">Save</button>
                <button @click="closeModal"  class="btn btn-danger m-1">close</button>
            </div>

            <i @click="closeModal" class="fa-solid fa-xmark"></i>
        </div>
        <success-alert v-show="isSuccess">
            {{ message }}
        </success-alert>
    </div>
</template>

<style scoped>
    .table-id {
        margin: auto;
        max-width: 200px;
    }
    .table-order {
        min-height: 400px;
        height: 400px;
    }
    .model {
        width: 95%;
        padding: 20px;
        margin: 50px auto;
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
</style>

<script>

    export default {
        data () {
            return {
                table_id: undefined,
                orders: this.$root.orders,
                isSuccess: false,
                message: ''
            }
        },
        methods: {
            closeModal() {
                this.$emit('close');
            },
            deleteEvent(index) {
                if(confirm("Do you really want to delete?")){
                    this.orders.splice(index, 1);
                    this.$root.setOrder(this.orders);
                }
            },
            hideAlert() {
                setTimeout(() => {
                    this.isSuccess = !this.isSuccess
                    this.$emit('close');
                }, 1000);
            },
            saveData() {
                axios.post('/api/order/save',{data:this.orders,table_id:this.table_id})
                .then(res => {
                    if(res.data.status === 1){
                        this.isSuccess  = true;
                        this.message    = res.data.message;
                        this.order      = [];
                        this.$root.removeOrder({});
                        this.hideAlert();
                    }else{
                        console.log(message);
                    }
                })
                .catch( error => {
                    console.log(error);
                })
            }
        }
    }
</script>
