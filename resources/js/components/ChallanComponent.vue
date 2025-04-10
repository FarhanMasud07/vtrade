<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5>{{ method === 'post' ? 'Create' : 'Update' }} Challan Form</h5>
            </div>
            <div class="card-body">
                <form @submit.prevent="submitHandler()" @keydown="form.onKeydown($event)">
                    <AlertError :form="form"/>


                    <div class="form-group">
                        <label>Challan Date</label> <br>
                        <date-picker :editable="false" v-model="form.challan_date" name="challan_date"
                                     id="challan_date" valueType="format"
                                     :class="{ 'is-invalid': form.errors.has('challan_date') }"></date-picker>
                        <div v-if="form.errors.has('challan_date')" class="w-100">
                            <small class="text-danger">{{ form.errors.get('challan_date') }}</small>
                        </div>

                    </div>


                    <div class="form-group">
                        <label>Challan Delivery Date</label> <br>
                        <date-picker :class="{ 'is-invalid': form.errors.has('delivery_date') }" :editable="false"
                                     v-model="form.delivery_date" name="delivery_date"
                                     id="delivery_date" valueType="format"></date-picker>
                        <div v-if="form.errors.has('delivery_date')" class="w-100">
                            <small class="text-danger"
                                   v-if="form.errors.has('delivery_date')">{{ form.errors.get('delivery_date') }}</small>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>select a customer</label>
                                <v-select label="name" @input="fillCustomerForm" :options="allCustomers"
                                          v-model="customer_selected_object"></v-select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="customer">Customer Name</label>
                                <input type="text" class="form-control" v-model="form.customer"
                                       :class="{ 'is-invalid': form.errors.has('customer') }" name="customer"
                                       id="customer"/>
                                <small class="text-danger"
                                       v-if="form.errors.has('customer')">{{ form.errors.get('customer') }}</small>

                            </div>
                            <div class="form-group">
                                <label for="phone">Customer Phone</label>
                                <input type="text" class="form-control" v-model="form.phone" name="phone"
                                       :class="{ 'is-invalid': form.errors.has('phone') }"
                                       id="phone"/>
                                <small class="text-danger"
                                       v-if="form.errors.has('phone')">{{ form.errors.get('phone') }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone">Customer Address</label>
                                <textarea v-model="form.address" class="form-control" name="address"
                                          id="address"
                                          :class="{ 'is-invalid': form.errors.has('address') }"
                                          cols="30" rows="5"></textarea>
                                <small class="text-danger"
                                       v-if="form.errors.has('address')">{{ form.errors.get('address') }}</small>
                            </div>
                        </div>

                    </div>

                    <h3 class="w-100 text-center text-uppercase">Challan Product</h3>
                    <p v-if="form.errors.has('items')" class="text-danger w-100 text-center">
                        {{ form.errors.get('items') }}</p>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Products</label>
                                <v-select @input="removeError('product_error')"
                                          :class="{'is-invalid':validationErrors.product_error}" label="product_name"
                                          :options="allProducts"
                                          v-model="product_selected_object"></v-select>
                                <small v-if="validationErrors.product_error"
                                       class="text-danger">{{ validationErrors.product_error }}</small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Qty</label>
                                <input @input="removeError('qty_error')" type="text" class="form-control" v-model="qty"
                                       :class="{'is-invalid': validationErrors.qty_error}">
                                <small v-if="validationErrors.qty_error"
                                       class="text-danger">{{ validationErrors.qty_error }}</small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Unit</label>
                                <v-select @input="removeError('unit_error')"
                                          :class="{'is-invalid':validationErrors.unit_error}" label="product_name"
                                          :options="units"
                                          v-model="unit"></v-select>
                                <small v-if="validationErrors.unit_error"
                                       class="text-danger">{{ validationErrors.unit_error }}</small>
                            </div>
                        </div>

                        <div class="col-lg-2 d-flex align-items-center">
                            <button @click="addToList()" type="button" class="btn btn-warning"><i
                                class="fas fa-plus"></i> ADD
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive mt-3" v-if="form.items.length">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Product Name</th>
                                        <th>Size</th>
                                        <th>QTY</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr v-for="(item,index) in form.items" :key="item.product_id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ item.product_name }}</td>
                                        <td>{{ item.size }}</td>
                                        <td>{{ item.qty }}</td>
                                        <td>{{ item.unit }}</td>
                                        <td>
                                            <button @click="removeItem(index)" type="button"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                            <p v-else class="alert alert-danger mt-3">No product added</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <button :disabled="form.busy" type="submit" class="btn btn-success"><i
                            class="fas fa-check-circle"></i> {{ method === 'post' ? 'Submit' : 'Update' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from 'vform';
import {AlertError} from 'vform/src/components/bootstrap4';
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import "vue-select/dist/vue-select.css";
import vSelect from "vue-select";

export default {
    name: "ChallanComponent",
    components: {DatePicker, vSelect, AlertError},
    props: ['base_url', 'todays_date', 'csrf', 'method', 'id'],
    created() {
        this.getAllCustomer();
        if (this.method == 'put') {
            this.initEdit();
        }
    },
    data() {
        return {
            allCustomers: [],
            allProducts: [],
            customer_selected_object: "",
            product_selected_object: "",
            qty: "",
            units: ['Pcs', 'Cartoon', 'Dz', 'Box', 'Bottle'],
            unit: "",
            validationErrors: "",
            form: new Form({
                challan_date: '',
                delivery_date: '',
                customer: '',
                phone: '',
                address: '',
                items: [],
            }),
        }
    },
    methods: {
        storeChallan() {
            this.$Progress.start()
            this.form.busy = true
            this.form.post(`${this.base_url}/admin/challan`)
                .then(response => {
                    this.$Progress.finish();
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'successfully stored',
                    });
                    window.location = this.base_url + '/admin/challan';

                })
                .catch(e => {
                    console.log(e)
                    iziToast.error({
                        title: 'Error',
                        position: 'topRight',
                        message: e.response.data.message,
                    });
                    this.$Progress.fail()
                })
        },
        updateChallan() {
            this.$Progress.start()
            this.form.busy = true
            this.form.put(`${this.base_url}/admin/challan/${this.id}`)
                .then(response => {
                    this.$Progress.finish();
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'successfully updated',
                    });
                    window.location = this.base_url + '/admin/challan';

                })
                .catch(e => {
                    console.log(e)
                    iziToast.error({
                        title: 'Error',
                        position: 'topRight',
                        message: e.response.data.message,
                    });
                    this.$Progress.fail()
                })
        },
        removeError(key) {
            if (this.validationErrors) {
                if (!!this.validationErrors[key]) {
                    delete this.validationErrors[key];
                }
            }
        },
        submitHandler() {
            this.method == 'post' ? this.storeChallan() : this.updateChallan();
        },
        initEdit() {
            this.$Progress.start()
            axios.get(`${this.base_url}/admin/challan/${this.id}`)
                .then(({data}) => {
                    this.form.challan_date = data.challan_date;
                    this.form.delivery_date = data.delivery_date;
                    this.form.customer = data.customer;
                    this.form.phone = data.phone;
                    this.form.address = data.address;
                    if (data.products.length > 0) {
                        let items = [];
                        data.products.forEach(ele => {
                            items.push({
                                qty: ele.pivot.qty,
                                product_id: ele.id,
                                product_name: ele.product_name,
                                size: ele.size.name,
                                unit: ele.pivot.unit,

                            })
                        })
                        this.form.items = items;
                    }
                    this.$Progress.finish()
                })
        },
        removeItem(index) {
            let confirmation = confirm('Are you sure?');
            if (confirmation) {
                this.form.items.splice(index, 1);
            }
        },
        getAllCustomer() {
            axios.get(`${this.base_url}/admin/get_customers_and_products`)
                .then(res => {
                    this.allCustomers = res.data.customers;
                    this.allProducts = res.data.products;
                })
                .catch(err => {
                    iziToast.error({
                        title: 'Error',
                        position: 'topRight',
                        message: err.response.data.message,
                    });
                })
        },
        Checkvalidations() {
            let err_count = 0;
            let err = {};
            if (!this.product_selected_object) {
                err.product_error = 'The product field is required';
                err_count++;
            } else {
                delete err['product_error']
            }
            if (!this.qty) {
                err.qty_error = 'The Qty field is required';
                err_count++;
            } else {
                delete err['qty_error']
            }
            if (!this.unit) {
                err.unit_error = 'The Unit field is required';
                err_count++;
            } else {
                delete err['unit_error']
            }
            this.validationErrors = err;
            return err_count;
        },
        fillCustomerForm(selected) {
            if (selected) {
                this.form.customer = selected.name;
                this.form.phone = selected.phone;
                this.form.address = selected.address;
            } else {
                this.form.customer = '';
                this.form.phone = '';
                this.form.address = '';
            }
            console.log(selected);
        },
        addToList() {
            let errCount = this.Checkvalidations();
            if (errCount < 1) {
                let index = this.form.items.length > 0 ? this.form.items.findIndex(ele => {
                    return ele.product_id == this.product_selected_object.id;
                }) : -1;
                if (index == -1) {
                    let listObject = {
                        qty: this.qty,
                        product_id: this.product_selected_object.id,
                        product_name: this.product_selected_object.product_name,
                        size: this.product_selected_object.size.name,
                        unit: this.unit,
                    }
                    this.form.items.push(listObject);
                    this.product_selected_object = "";
                    this.qty = "";
                    this.unit = "";
                } else {
                    iziToast.warning({
                        title: 'Warning',
                        position: 'topRight',
                        message: `${this.product_selected_object.product_name} already exist`,
                    });
                }

            }
        },
    }

}

</script>
<style scoped>
.v-select.is-invalid {
    border: 1px solid red;
    border-radius: 6px;
}

.mx-datepicker.is-invalid {
    border: 1px solid #e74c3c !important;
    border-radius: 6px;
}
</style>
