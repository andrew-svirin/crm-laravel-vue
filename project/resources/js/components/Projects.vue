<template>
   <section class="section">
      <h1>Projects</h1>
      <div>
         <b-row>
            <b-col sm="4" md="4">
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

            <b-col sm="4" md="5">
               <b-pagination
                     v-model="currentPage"
                     :total-rows="totalRows"
                     :per-page="perPage"
                     size="sm"
               ></b-pagination>
            </b-col>

            <b-col sm="4" md="3">
               <router-link class="btn btn-primary btn-sm float-right" role="button" to="/projects/create">Create new project</router-link>
            </b-col>
         </b-row>

         <b-table
               :fields="fields"
               :items="loadItems"
               :current-page="currentPage"
               :per-page="perPage"
               :filter="filter"
               @filtered="onFiltered"
         >
         </b-table>
      </div>
   </section>
</template>
<script>
    import Project from '../services/Project.js';

    export default {
        data() {
            return {
                fields: [
                    {key: 'title', label: 'Project Name'},
                    'status',
                    'members',
                ],
                items: [],
                totalRows: null,
                currentPage: 1,
                perPage: 5,
                filter: null,
                filterOption: ['', 'On Development', 'On Estimate', 'On Hold'],
            }
        },
        mounted() {
            // Set the initial number of items
            this.totalRows = this.items.length;
            if (this.$route.query.page) {
                this.currentPage = this.$route.query.page;
            }
            if (this.$route.query.size) {
                this.perPage = this.$route.query.size;
            }
        },
        methods: {
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1
            },
            async loadItems(context) {
                const response = await Project.loadAll(context.currentPage, context.perPage);
                this.$router.push({path: '/projects', query: {page: context.currentPage, size: context.perPage}});
                return (response.data);
            },
        },
    }
</script>