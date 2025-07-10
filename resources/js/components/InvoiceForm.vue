<template>
    <form @submit.prevent="submitForm">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Customer</label>
                    <select 
                        v-model="form.customer_id" 
                        class="form-select" 
                        id="customer_id" 
                        required>
                        <option value="">Select Customer</option>
                        <option 
                            v-for="customer in customers" 
                            :key="customer.id" 
                            :value="customer.id">
                            {{ customer.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="invoice_date" class="form-label">Invoice Date</label>
                    <input 
                        v-model="form.invoice_date" 
                        type="date" 
                        class="form-control" 
                        id="invoice_date" 
                        required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input 
                        v-model="form.due_date" 
                        type="date" 
                        class="form-control" 
                        id="due_date" 
                        required>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Invoice Items</h5>
                <button type="button" @click="addItem" class="btn btn-success btn-sm">
                    Add Item
                </button>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in form.items" :key="index">
                            <td>
                                <input 
                                    v-model="item.product_name" 
                                    type="text" 
                                    class="form-control" 
                                    required>
                            </td>
                            <td>
                                <input 
                                    v-model="item.description" 
                                    type="text" 
                                    class="form-control">
                            </td>
                            <td>
                                <input 
                                    v-model.number="item.quantity" 
                                    type="number" 
                                    class="form-control" 
                                    min="1" 
                                    required>
                            </td>
                            <td>
                                <input 
                                    v-model.number="item.price" 
                                    type="number" 
                                    class="form-control" 
                                    min="0" 
                                    step="0.01" 
                                    required>
                            </td>
                            <td>
                                <span class="form-control-plaintext">
                                    ${{ (item.quantity * item.price).toFixed(2) }}
                                </span>
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    @click="removeItem(index)" 
                                    class="btn btn-danger btn-sm">
                                    Remove
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea 
                        v-model="form.notes" 
                        class="form-control" 
                        id="notes" 
                        rows="3">
                    </textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">Subtotal:</div>
                            <div class="col-6 text-end">${{ subtotal.toFixed(2) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6">Tax (10%):</div>
                            <div class="col-6 text-end">${{ tax.toFixed(2) }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6"><strong>Total:</strong></div>
                            <div class="col-6 text-end"><strong>${{ total.toFixed(2) }}</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Create Invoice</button>
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</template>

<script>
export default {
    name: 'InvoiceForm',
    props: {
        customers: {
            type: Array,
            required: true
        },
        action: {
            type: String,
            required: true
        },
        method: {
            type: String,
            default: 'POST'
        }
    },
    data() {
        return {
            form: {
                customer_id: '',
                invoice_date: new Date().toISOString().split('T')[0],
                due_date: new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toISOString().split('T')[0],
                items: [
                    {
                        product_name: '',
                        description: '',
                        quantity: 1,
                        price: 0
                    }
                ],
                notes: ''
            }
        }
    },
    computed: {
        subtotal() {
            return this.form.items.reduce((sum, item) => {
                return sum + (item.quantity * item.price);
            }, 0);
        },
        tax() {
            return this.subtotal * 0.1;
        },
        total() {
            return this.subtotal + this.tax;
        }
    },
    methods: {
        addItem() {
            this.form.items.push({
                product_name: '',
                description: '',
                quantity: 1,
                price: 0
            });
        },
        removeItem(index) {
            if (this.form.items.length > 1) {
                this.form.items.splice(index, 1);
            }
        },
        submitForm() {
            // Create form data
            const formData = new FormData();
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            formData.append('customer_id', this.form.customer_id);
            formData.append('invoice_date', this.form.invoice_date);
            formData.append('due_date', this.form.due_date);
            formData.append('notes', this.form.notes);

            this.form.items.forEach((item, index) => {
                formData.append(`items[${index}][product_name]`, item.product_name);
                formData.append(`items[${index}][description]`, item.description);
                formData.append(`items[${index}][quantity]`, item.quantity);
                formData.append(`items[${index}][price]`, item.price);
            });

            // Submit form
            fetch(this.action, {
                method: this.method,
                body: formData
            }).then(response => {
                if (response.ok) {
                    window.location.href = '/invoices';
                } else {
                    alert('Error creating invoice');
                }
            });
        }
    }
}
</script>