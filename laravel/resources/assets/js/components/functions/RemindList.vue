<template>
    <div>
        <ag-grid-vue style="width: 1000px; height: 500px;"
             class="ag-theme-balham"
             :columnDefs="columnDefs"
             :rowData="rowData"
             :enableSorting="true"
             :enableFilter="true">
        </ag-grid-vue>
    </div>
</template>



<script>
    import {AgGridVue} from "ag-grid-vue";

    export default {
        name: 'App',
        data() {
            return {
                columnDefs: null,
                rowData: null
            }
        },
        components: {
            AgGridVue
        },
        beforeMount() {
            this.columnDefs = [
                {headerName: 'Make', field: 'make'},
                {headerName: 'Model', field: 'model'},
                {headerName: 'Price', field: 'price'}
            ];

            this.rowData = [
                {make: 'Toyota', model: 'Celica', price: 35000},
                {make: 'Ford', model: 'Mondeo', price: 32000},
                {make: 'Porsche', model: 'Boxter', price: 72000}
            ];
        }
    }
</script>
