<template>
    <ag-grid-vue
      class="ag-theme-alpine"
      style="height: 500px"
      :columnDefs="columnDefs.value"
      :rowData="rowData.value"
      :defaultColDef="defaultColDef"
      rowSelection="multiple"
      animateRows="true"
      @cell-clicked="cellWasClicked"
      @grid-ready="onGridReady"
    >
    </ag-grid-vue>
</template>
<script>
import { AgGridVue } from "ag-grid-vue3";  // the AG Grid Vue Component
import { reactive, onMounted, ref } from "vue";

import "ag-grid-community/styles/ag-grid.css"; // Core grid CSS, always needed
import "ag-grid-community/styles/ag-theme-alpine.css"; // Optional theme CSS

export default {
 name: "App",
 components: {
   AgGridVue,
 },
 setup() {

   const onGridReady = (params) => {
     gridApi.value = params.api;
   };

   const rowData = reactive({});

   const columnDefs = reactive({
     value: [
          { headerName:"Category", field: "category.name"},
          { headerName:"Product", field: "name" },
          { headerName:"Price", field: "price", valueFormatter: currencyFormatter}
     ],
   });

   const defaultColDef = {
     sortable: true,
     filter: true,
     flex: 1,
     resizable: true,
   };


   // Example load data from sever
   onMounted(() => {
     fetch("/api/fetchProducts")
       .then((result) => result.json())
       .then((remoteRowData) => (rowData.value = remoteRowData));
   });

   return {
     onGridReady,
     columnDefs,
     rowData,
     defaultColDef,
     cellWasClicked: (event) => { // Example of consuming Grid Event
       console.log("cell was clicked", event);
     },
     deselectRows: () =>{
       gridApi.value.deselectAll()
     }
   };
 },
};

window.currencyFormatter = function currencyFormatter(params) {
  return 'RM ' + formatNumber(params.value);
};

window.formatNumber = function formatNumber(number) {
  return Math.floor(number)
    .toString()
    .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
};
</script>

