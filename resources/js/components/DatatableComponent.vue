<template>
    <div>
        <form id="uploadfile" class="form-inline">
            <div class="form-group">
                <label class="form-label" for="customFile">Upload Product</label>
                <input type="file" class="form-control" id="customFile" name="product_file" />
            </div>
            <button type="submit" class="btn btn-primary" @click.prevent="saveExcelProduct">Upload</button>
        </form>
    </div>
    <div>
        <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage"></bootstrap-4-datatable>
        <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                columns: [
                    {
                        label: 'No',
                        field: 'id'
                    },
                    {
                        label: 'Product ID',
                        field: 'product_id'
                    },
                    {
                        label: 'Types',
                        field: 'type'
                    },
                    {
                        label: 'Brand',
                        field: 'brand'
                    },
                    {
                        label: 'Model',
                        field: 'model'
                    },
                    {
                        label: 'Capacity',
                        field: 'capacity'
                    },
                    {
                        label: 'Quantity',
                        field: 'quantity'
                    }
                ],
                rows: [],
                page: 1,
                filter:  '',
                perPage: 12,
            }
        },
        methods: {
            showProducts: function () {
                axios.get('api/getproducts').then(function (res) {
                    this.rows = res.data;
                }.bind(this));
            },
            saveExcelProduct() {
                var $uploadfile = $(uploadfile)
                var data = new FormData(uploadfile)
                axios.post('api/products/import', data).then(function (res) {
                    this.showProducts()
                });
            }
        },
        created: function () {
            this.showProducts()
        }
    }
</script>