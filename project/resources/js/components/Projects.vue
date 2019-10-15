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
                        @change="filterTable"
                  ></b-form-select>
               </b-form-group>
            </b-col>

            <b-col sm="4" md="5">
               <b-pagination-nav
                     v-model="currentPage"
                     :number-of-pages="totalPages"
                     :link-gen="linkGen"
                     use-router
                     size="sm"
                     @change="paginateTable"
               ></b-pagination-nav>
            </b-col>

            <b-col sm="4" md="3">
               <router-link class="btn btn-primary btn-sm float-right" role="button" to="/projects/create">Create new project</router-link>
            </b-col>
         </b-row>

         <b-table
               show-empty
               :fields="fields"
               :items="items"
               :per-page="perPage"
               :filter="filter"
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
                totalRows: 0,
                currentPage: 1,
                perPage: 5,
                filter: null,
                filterOption: ['', 'On Development', 'On Estimate', 'On Hold'],
            }
        },
        computed: {
            totalPages() {
                return parseInt(this.totalRows / this.perPage, 10) || 1;
            },
        },
        mounted() {
            if (this.$route.query['page']) {
                this.currentPage = this.$route.query['page'];
            }
            if (this.$route.query['size']) {
                this.perPage = this.$route.query['size'];
            }
            if (this.$route.query['filter']) {
                this.filter = this.$route.query['filter'];
            }
            this.fetchItems();
        },
        methods: {
            fetchItems() {
                // Make server request for fetch new items.
                return Project.loadAll(this.currentPage, this.perPage, this.filter).then((response) => {
                    this.totalRows = parseInt(response.headers['x-total-count'], 10);
                    this.items = response.data;
                    return this.items;
                });
            },
            linkGen(pageNum) {
                // Generate pagination links by Page Number.
                return {
                    path: '/projects',
                    query: {
                        page: pageNum,
                        size: this.perPage,
                        filter: this.filter,
                    }
                }
            },
            paginateTable(value) {
                // Fires on pagination is changed to trigger event for fetch items.
                this.currentPage = value;
                this.fetchItems();
            },
            filterTable(value) {
                // Fires on filter is changed to trigger event for fetch items. Resets current page to 1. Update route.
                this.filter = value;
                this.currentPage = 1;
                this.$router.replace(this.linkGen(this.currentPage));
                this.fetchItems();
            }
        },
        watch: {
            $route(to) {
                // React to route changes.
                if (Object.keys(to.query).length === 0) {
                    // Reset properties for main page.
                    this.currentPage = 1;
                    this.filter = null;
                    this.fetchItems();
                }
            }
        },
    }
</script>