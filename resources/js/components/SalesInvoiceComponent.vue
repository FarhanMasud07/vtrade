<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5>{{ method === 'post' ? 'Create' : 'Update' }} Sales Invoice</h5>
            </div>
            <div class="card-body">
                <form @submit.prevent="submitHandler()" @keydown="form.onKeydown($event)">
                    <AlertError :form="form"/>


                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Sales Invoice Date</label> <br>
                                <date-picker :editable="false" v-model="form.sales_date" name="sales_date"
                                             id="sales_date" valueType="format"
                                             :class="{ 'is-invalid': form.errors.has('sales_date') }"></date-picker>
                                <div v-if="form.errors.has('sales_date')" class="w-100">
                                    <small class="text-danger">{{ form.errors.get('sales_date') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>select a customer</label>
                                <v-select

                                    @input="handleCusomerSelect($event)"
                                    :class="{'is-invalid':validationErrors.customer_error || form.errors.has('customer')}"
                                    label="name" :options="allCustomers"
                                    v-model="form.customer"></v-select>
                                <small class="text-danger"
                                       v-if="validationErrors.customer_error || form.errors.has('customer')">{{
                                        validationErrors.customer_error || form.errors.get('customer')
                                    }}</small>
                            </div>
                            <div class="form-group" v-if="!!form.customer">
                                <h5>{{ form.customer.name }}</h5>
                                <p>{{ form.customer.phone }} - <small>{{ form.customer.address }}</small></p>

                            </div>
                            <div class="row py-3 rounded m-1" style="background: #130f40">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-white">Products</label>
                                        <v-select @input="removeError('product_error');productSelectionEvent($event)"
                                                  :class="{'is-invalid':validationErrors.product_error}"
                                                  class="bg-white" label="product_name"
                                                  :options="allProducts"
                                                  placeholder="Select Product"
                                                  v-model="product_selected_object"></v-select>
                                        <small v-if="validationErrors.product_error"
                                               class="text-danger bg-white">{{ validationErrors.product_error }}</small>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="text-white">Qty</label>
                                        <input @input="removeError('qty_error')" type="number" class="form-control"
                                               v-model="qty"
                                               :class="{'is-invalid': validationErrors.qty_error}"
                                               placeholder="Enter Qty">
                                        <small v-if="validationErrors.qty_error"
                                               class="text-danger bg-white">{{ validationErrors.qty_error }}</small>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="text-white">Price</label>
                                        <input @input="removeError('price_error')" type="text" class="form-control"
                                               v-model="price" :class="{'is-invalid': validationErrors.price_error}"
                                               placeholder="Enter Price">

                                        <small v-if="validationErrors.price_error"
                                               class="bg-white text-danger">{{ validationErrors.price_error }}</small>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="text-white">Free</label>
                                        <input type="text" class="form-control" v-model="free" placeholder="Enter Free">

                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex align-items-center">
                                    <button @click="addToList(qty)" type="button" class="btn btn-warning btn-block"
                                            v-html="buttonText"></button>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-7">
                            <div v-if="loader" class="text-center p-5 m-5">
                                <div class="lds-ripple">
                                    <div></div>
                                    <div></div>
                                </div>
                                <h3>Please Wait.......</h3>
                            </div>
                            <div v-else>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" v-html="stockAlert">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search...."
                                                   v-model="searchQuery">
                                        </div>
                                    </div>
                                </div>
                                <div class="featured_pd_wrapper">
                                    <div @click="addToListUsingFeaturedProduct(product);"
                                         class="mb-3 pr-2 w-50 float-left single_featured_pd"
                                         v-for="(product,index) in featuredProducts" :key="index">
                                        <div class="card shadow-sm">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div>
                                                    <img :src="`//ui-avatars.com/api/?name=${product.product_name}`"
                                                         alt="">
                                                </div>
                                                <div class="ml-1">
                                                    <small class="m-0">
                                                        <b>{{ product.product_name }}</b></small><br>
                                                    <small class="m-0">{{ product.size.name }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p v-if="form.errors.has('items')" class="text-danger w-100 text-center">
                        {{ form.errors.get('items') }}</p>

                    <div v-if="form.customer != ''">
                        <h3 class="w-100 text-center text-uppercase mt-5">Products</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive mt-3" v-if="form.items.length">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Product Name</th>
                                            <th>Size</th>
                                            <th>QTY</th>
                                            <th>Price</th>
                                            <th>Free</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr v-for="(item,index) in form.items" :key="item.product_id">
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ item.product_name }}</td>
                                            <td>{{ item.size }}</td>
                                            <td>
                                                <div v-if="item.qty_edit_mode">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="w-75">
                                                            <input type="number" class="form-control"
                                                                   :value="item.qty" @input="updateQty($event)">
                                                        </div>
                                                        <div class="w-25 ml-3">
                                                            <a @click="submitQty(item,index,temp_data.qty)"
                                                               href="javascript:void(0)" class="btn btn-success btn-sm"><i
                                                                class="fas fa-check-circle"></i></a>

                                                            <a @click="item.qty_edit_mode = false"
                                                               href="javascript:void(0)"
                                                               class="btn btn-danger btn-sm"><i
                                                                class="fas fa-times"></i></a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div v-else>
                                                    <b>{{ item.qty }} </b>
                                                    <a href="javascript:void(0)" @click="item.qty_edit_mode = true"
                                                       class="btn btn-link btn-sm"><i class="fas fa-edit"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div v-if="item.price_edit_mode">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="w-75">
                                                            <input type="number" class="form-control"
                                                                   v-model="item.price">
                                                        </div>
                                                        <div class="w-25 ml-3">
                                                            <a @click="item.price_edit_mode = false"
                                                               href="javascript:void(0)" class="btn btn-success btn-sm"><i
                                                                class="fas fa-check-circle"></i> ok</a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div v-else>
                                                    <b>{{ item.price }} </b>
                                                    <a href="javascript:void(0)" @click="item.price_edit_mode = true"
                                                       class="btn btn-link btn-sm"><i class="fas fa-edit"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div v-if="item.free_edit_mode">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="w-75">
                                                            <input type="number" class="form-control"
                                                                   :value="item.free" @input="updateFree($event)">
                                                        </div>
                                                        <div class="w-25 ml-3">
                                                            <a @click="submitFree(item,index,temp_data.free)"
                                                               href="javascript:void(0)" class="btn btn-success btn-sm"><i
                                                                class="fas fa-check-circle"></i></a>

                                                            <a @click="item.free_edit_mode = false"
                                                               href="javascript:void(0)"
                                                               class="btn btn-danger btn-sm"><i
                                                                class="fas fa-times"></i></a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div v-else>
                                                    <b>{{ item.free }} </b>
                                                    <a href="javascript:void(0)" @click="item.free_edit_mode = true"
                                                       class="btn btn-link btn-sm"><i class="fas fa-edit"></i></a>
                                                </div>
                                            </td>
                                            <th>{{ item.qty * item.price }}</th>
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
                        <div class="row" v-if="form.items.length">
                            <div class="col-lg-7 mt-3">
                                <div style="border: 1px solid #ddd;padding: 30px;border-radius: 10px">
                                    <h5>Is Condition Booking</h5>
                                    <div class="onoffswitch">
                                        <input type="checkbox" class="onoffswitch-checkbox" id="is_condition"
                                               v-model="form.is_condition">
                                        <label class="onoffswitch-label" for="is_condition">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>

                                    <input v-if="form.is_condition" type="number" class="form-control mt-3"
                                           v-model="form.condition_amount"
                                           placeholder="Enter Condition Booking Amount">
                                </div>

                                <div class="form-group">
                                    <h5 class="mt-3 mb-3">References</h5>
                                    <textarea class="form-control" v-model="form.reference" cols="30" rows="5"
                                              placeholder="Enter Reference"></textarea>
                                </div>

                            </div>
                            <div class="col-lg-5" id="amount-info">

                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="total-cart">{{ subTotal }}</td>
                                    </tr>

                                    <tr>
                                        <td>Discount (%) <input @input="calculateDiscount($event)" min="0" max="100"
                                                                type="number" class="form-control tiny-input"
                                                                v-model="form.discount_percent"></td>
                                        <td>Discount Amount <input type="text" class="form-control"
                                                                   v-model="form.discount">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Carrying &amp; Loading <input @input="watchCarryingAndLoading($event)"
                                                                          type="number"
                                                                          v-model="form.carrying_and_loading"
                                                                          class="form-control tiny-input"></td>
                                        <td class="carrying_and_loading">{{ form.carrying_and_loading }}</td>
                                    </tr>


                                    <tr>
                                        <td>Grand Total</td>
                                        <td class="grand-total">{{ grandTotal }}</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="form-group">
                                    <button :disabled="form.busy" type="submit" class="btn btn-warning" v-html="submitButtonText"></button>
                                </div>

                            </div>
                        </div>


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
    name: "SalesInvoiceComponent",
    components: {DatePicker, vSelect, AlertError},
    props: ['base_url', 'todays_date', 'csrf', 'method', 'id', 'customers', 'products', 'store_url', 'update_url', 'list_url', 'featured_product_ids', 'sales_info'],
    created() {
        this.allCustomers = this.customers;
        this.allProducts = this.products;

        let featuredProductLists = this.products.filter(ele => {
            return this.featured_product_ids.includes(String(ele.id));
        })
        this.featuredProducts = featuredProductLists;
        this.featuredProductBackup = featuredProductLists;
        if (this.method == 'put') {
            this.initEdit();
        }
    },
    computed: {
        subTotal() {
            let total = 0;
            this.form.items.forEach(ele => {
                total += ele.qty * ele.price
            });
            return total;
        },
        grandTotal() {
            return parseFloat(this.subTotal - this.form.discount) + parseFloat(this.form.carrying_and_loading);
        }
    },
    watch: {
        searchQuery: function (newQ, oldQ) {
            if (newQ === "") {
                this.featuredProducts = this.featuredProductBackup;
            } else {
                this.featuredProducts = this.allProducts.filter(product =>
                    product.product_name.toLowerCase().startsWith(newQ.toLowerCase())
                );
            }
        }
    },
    data() {
        return {
            temp_data: {
                qty: "",
                free: "",
            },
            stockAlert: "",
            searchQuery: "",
            allCustomers: [],
            allProducts: [],
            featuredProductBackup: [],
            featuredProducts: [],
            product_selected_object: "",
            qty: "",
            units: ['Pcs', 'Cartoon', 'Dz', 'Box', 'Bottle'],
            price: "",
            free: 0,
            validationErrors: "",
            customer_not_selected_text: "",
            buttonText: `<i class="fas fa-plus"></i> ADD`,
            submitButtonText: `<i class="fas fa-check-circle"></i> ${this.method === 'post' ? 'Confirm' : 'Update'}`,
            loader: false,
            btnLoader: false,
            form: new Form({
                sales_date: '',
                user_id: '',
                customer: '',
                phone: '',
                address: '',
                items: [],
                discount: 0,
                discount_percent: 0,
                carrying_and_loading: 0,
                is_condition: false,
                condition_amount: 0,
                reference: ""
            }),
        }
    },
    methods: {
        updateQty(event) {
            this.temp_data.qty = event.target.value;
        },
        updateFree(event) {
            this.temp_data.free = event.target.value;
        },
        submitQty(item,index,qty) {
            this.checkStock(item,index,qty,'qty')
        },
        submitFree(item,index,qty) {
            this.checkStock(item,index,qty,'free')
        },

        checkStock(item,index,qty,type) {
            let product_id =  item.product_id;
            let product_name = item.product_name;
            this.$Progress.start();
            this.btnLoader = true;
            axios.post(`${this.base_url}/admin/get_stock_by_single_product/${product_id}`)
                .then(response => {
                    let actual_qty = type==='qty' ? parseInt(qty)+parseInt(item.free) : parseInt(qty)+parseInt(item.qty);
                    console.log('actual_qty',actual_qty);
                    if (response.data.stock < 1 || response.data.stock < actual_qty) {
                        this.stockAlert = `<div class="alert alert-danger alert-dismissible" role="alert">
          <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
          <strong>Warning!</strong> ${product_name} is out of stock current stock is <span class="badge badge-warning text-bold">${response.data.stock}</span>
        </div>`;
                        iziToast.error({
                            title: 'Error',
                            position: 'topRight',
                            message: `${product_name} is out of stock`,
                        });
                        this.temp_data[type] = qty;
                    }else{
                        this.form.items[index][type] = qty;
                        this.form.items[index][`${type}_edit_mode`] = false;
                    }
                    this.$Progress.finish();
                })

                .catch(e => {
                    this.$Progress.fail();
                    iziToast.error({
                        title: 'Error',
                        position: 'topRight',
                        message: e.response.data.message,
                    });
                })

                .finally(() => {
                    this.btnLoader = false;
                })
        },

        watchCarryingAndLoading(event) {
            let cl = event.target.value;
            if (cl == "") {
                this.form.carrying_and_loading = 0;
            }
        },
        handleCusomerSelect(event) {
            delete this.validationErrors.customer_error;
            this.form.user_id = !!event ? event.id : '';
        },
        calculateDiscount(event) {
            let discount_percent = event.target.value;
            if (discount_percent > 100 || discount_percent < 0) {
                iziToast.error({
                    title: 'Error',
                    position: 'topRight',
                    message: 'Discount percent must be between 0 to 100',
                });
                this.form.discount_percent = 0;
                this.form.discount = 0;
            } else {
                let discount_calc = (this.subTotal / 100) * discount_percent;
                this.form.discount = Math.round(discount_calc);
            }

        },
        productSelectionEvent(event) {
            if (!(!!this.form.customer)) {
                this.product_selected_object = "";
                if (this.validationErrors == "") {
                    this.validationErrors = {};
                }
                this.validationErrors.customer_error = "Please select customer first";
                iziToast.warning({
                    title: 'Warning',
                    position: 'topRight',
                    message: 'Please select customer first',
                });
                return "customer_not_selected";
            } else if (!!event) {
                if (this.form.customer.pricedata) {
                    let specialRate = 0;
                    let priceData = JSON.parse(JSON.parse(this.form.customer.pricedata));
                    let currentSelectedProductId = event.id;
                    priceData.every(function (item, index, arr) {
                        if (currentSelectedProductId == item.id) {
                            iziToast.success({
                                title: 'success',
                                position: 'topRight',
                                message: 'Special price applied',
                            });
                            specialRate = Math.round(item.price);
                            return false;
                        } else {
                            specialRate = Math.round(event.tp);
                        }
                    })

                    this.price = Math.round(specialRate);

                } else {
                    this.price = Math.round(event.tp);
                }
                return "success";
            }
        },
        storeSalesInvoice() {
            this.$Progress.start()
            this.form.busy = true;
            let backupSubmitButtonText = this.submitButtonText;
            this.submitButtonText = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading.....`;
            this.form.post(this.store_url)
                .then(response => {
                    this.$Progress.finish();
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'successfully stored',
                    });
                    this.form.clear();
                    window.location = response.data.redirect_url;

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
                .finally(() => {
                    this.submitButtonText = backupSubmitButtonText;
                })
        },
        updateSalesInvoice() {
            this.$Progress.start()
            this.form.busy = true;
            let backupSubmitButtonText = this.submitButtonText;
            this.submitButtonText = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading.....`;
            this.form.put(this.update_url)
                .then(response => {
                    this.$Progress.finish();
                    iziToast.success({
                        title: 'Success',
                        position: 'topRight',
                        message: 'successfully updated',
                    });
                    this.form.clear();
                    window.location = response.data.redirect_url;
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
                .finally(() => {
                    this.submitButtonText = backupSubmitButtonText;
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
            this.method == 'post' ? this.storeSalesInvoice() : this.updateSalesInvoice();
        },
        initEdit() {
            this.form.sales_date = this.sales_info.sales_at;
            this.form.user_id = this.sales_info.user_id;
            this.form.customer = this.sales_info.user;
            this.form.phone = this.sales_info.user.phone;
            this.form.address = this.sales_info.user.address;
            this.form.discount = Math.round(this.sales_info.discount);
            this.form.carrying_and_loading = Math.round(this.sales_info.carrying_and_loading);
            this.form.is_condition = parseInt(this.sales_info.is_condition);
            this.form.condition_amount = Math.round(this.sales_info.condition_amount);
            this.form.reference = this.sales_info.reference;
            if (this.sales_info.product.length > 0) {
                let items = [];
                this.sales_info.product.forEach(ele => {
                    items.push({
                        qty: ele.pivot.qty,
                        product_id: ele.id,
                        product_name: ele.product_name,
                        size: ele.size.name,
                        price: ele.pivot.price,
                        free: ele.pivot.free,
                        qty_edit_mode: false,
                        price_edit_mode: false,
                        free_edit_mode: false,
                    })
                })
                this.form.items = items;
            }
        },
        removeItem(index) {
            let confirmation = confirm('Are you sure?');
            if (confirmation) {
                this.form.items.splice(index, 1);
            }
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
            if (!this.price) {
                err.price_error = 'The Price field is required';
                err_count++;
            } else {
                delete err['price_error']
            }

            this.validationErrors = err;
            return err_count;
        },
        addToList(qty) {
            this.stockAlert = "";
            let errCount = this.Checkvalidations();
            if (errCount < 1) {
                let index = this.form.items.length > 0 ? this.form.items.findIndex(ele => {
                    return ele.product_id == this.product_selected_object.id;
                }) : -1;
                if (index == -1) {
                    this.$Progress.start();
                    let buttonTextBackup = this.buttonText;
                    this.buttonText = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading.....`;
                    axios.post(`${this.base_url}/admin/get_stock_by_single_product/${this.product_selected_object.id}`)
                        .then(response => {
                            if (response.data.stock < 1 || response.data.stock < qty) {
                                this.stockAlert = `<div class="alert alert-danger alert-dismissible" role="alert">
  <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
  <strong>Warning!</strong> ${this.product_selected_object.product_name} is out of stock current stock is <span class="badge badge-warning text-bold">${response.data.stock}</span>
</div>`;
                                iziToast.error({
                                    title: 'Error',
                                    position: 'topRight',
                                    message: `${this.product_selected_object.product_name} is out of stock`,
                                });
                            } else {
                                let listObject = {
                                    qty: this.qty,
                                    product_id: this.product_selected_object.id,
                                    product_name: this.product_selected_object.product_name,
                                    size: this.product_selected_object.size.name,
                                    price: this.price,
                                    free: this.free,
                                    qty_edit_mode: false,
                                    price_edit_mode: false,
                                    free_edit_mode: false,
                                }
                                this.form.items.push(listObject);
                                this.product_selected_object = "";
                                this.qty = "";
                                this.price = "";
                                this.free = 0;
                            }
                            this.$Progress.finish();
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
                        .finally(() => {
                            this.buttonText = buttonTextBackup;
                        })

                } else {
                    iziToast.warning({
                        title: 'Warning',
                        position: 'topRight',
                        message: `product already exist`,
                    });
                }

            }
        },
        addToListUsingFeaturedProduct(product) {
            this.stockAlert = "";
            let isCustomerSelected = this.productSelectionEvent(product);
            if (isCustomerSelected === 'success') {
                let index = this.form.items.length > 0 ? this.form.items.findIndex(ele => {
                    return ele.product_id == product.id;
                }) : -1;
                if (index == -1) {
                    this.$Progress.start();
                    this.loader = true;
                    axios.post(`${this.base_url}/admin/get_stock_by_single_product/${product.id}`)
                        .then(response => {
                            if (response.data.stock < 1) {
                                this.stockAlert = `<div class="alert alert-danger alert-dismissible" role="alert">
  <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
  <strong>Warning!</strong> ${product.product_name} is out of stock current stock is <span class="badge badge-warning text-bold">${response.data.stock}</span>
</div>`;
                                iziToast.error({
                                    title: 'Error',
                                    position: 'topRight',
                                    message: `${product.product_name} is out of stock`,
                                });
                            } else {
                                let listObject = {
                                    qty: 1,
                                    product_id: product.id,
                                    product_name: product.product_name,
                                    size: product.size.name,
                                    price: this.price,
                                    free: 0,
                                    qty_edit_mode: false,
                                    price_edit_mode: false,
                                    free_edit_mode: false,
                                }
                                this.form.items.push(listObject);
                                this.product_selected_object = "";
                                this.qty = "";
                                this.price = "";
                                this.free = 0;
                            }
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
                        .finally(() => {
                            this.loader = false;
                        })

                } else {
                    iziToast.warning({
                        title: 'Warning',
                        position: 'topRight',
                        message: `product already exist`,
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

.featured_pd_wrapper {
    height: 350px;
    overflow: scroll
}

.single_featured_pd {
    cursor: pointer;
}
</style>
