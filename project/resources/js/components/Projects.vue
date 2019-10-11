<template>
   <section class="section">
      <h1>Projects</h1>
      <div>
         <b-row>
            <b-col sm="5" md="6">
               <b-form-group
                     label="Filter"
                     label-cols-sm="3"
                     label-align-sm="right"
                     label-size="sm"
                     label-for="initialFilterSelect"
               >
                  <b-form-select
                        id="initialFilterSelect"
                        v-model="filter"
                        size="sm"
                        :options="filterOption"
                  ></b-form-select>
               </b-form-group>
            </b-col>

            <b-col sm="7" md="6">
               <b-pagination
                     v-model="currentPage"
                     :total-rows="totalRows"
                     :per-page="perPage"
                     align="fill"
                     size="sm"
               ></b-pagination>
            </b-col>
         </b-row>

         <b-table
               :fields="fields"
               :items="items"
               :current-page="currentPage"
               :per-page="perPage"
               :filter="filter"
               @filtered="onFiltered"
         >
         </b-table>

         <router-link class="btn btn-primary btn-lg" role="button" to="/projects/create">Create new project</router-link>
      </div>
   </section>
</template>
<script>

    export default {
        data() {
            return {
                fields: [
                    {key: 'name', label: 'Project Name'},
                    'status',
                    'members',
                ],
                items: [
                    {name: 'Program promotion', status: 'On Development', members: 4},
                    {name: 'Medical Portal', status: 'On Estimate', members: 4},
                    {name: 'Delivery System', status: 'On Hold', members: 1},
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 5,
                filter: null,
                filterOption: ['', 'On Development', 'On Estimate', 'On Hold'],
            }
        },
        mounted() {
            // Set the initial number of items
            this.totalRows = this.items.length
        },
        methods: {
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1
            },
        },
    }
</script>